<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Database\Eloquent\Collection;
//use Illuminate\Support\Collection as Collection;

class Course extends Model
{
    protected $fillable = [
        'name', 'url', 'description', 'image', 'link_buy', 'price', 'price_old',
        'total_hours', 'free', 'published', 'price_plots', 'total_plots', 'status', 'user_id', 'category_id'
    ];

    public function getPriceAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function setPriceAttribute($value)
    {
        $value = str_replace('.', '', $value);
        $this->attributes['price'] = str_replace(',', '.', $value);
    }

    public function getPriceOldAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function setPriceOldAttribute($value)
    {
        $value = str_replace('.', '', $value);
        $this->attributes['price_old'] = str_replace(',', '.', $value);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function classrooms()
    {
        return $this->hasManyThrough(Classroom::class, Module::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function inscriptions()
    {
        return $this->belongsToMany(Inscription::class)
            ->withPivot('course', 'amount', 'price', 'subtotal', 'status', 'code')
            ->withTimestamps();
    }

    public function scopeOfUrl($query, $url)
    {
        return $query->where('url', $url);
    }

    public function scopeStatus($query)
    {
        return $query->where('status', 1);
    }

    public function getResults(array $data, int $total): object
    {

        if (!isset($data['filter'])
            && !isset($data['name'])
            && !isset($data['description'])
            && !isset($data['category_id'])
            && !isset($data['id'])) {
            return $this->with('category')->paginate($total);
        }
        
        return $this->with('category')->where(function ($query) use ($data) {

            if (isset($data['filter'])) {
                $filter = $data['filter'];
                $query->where('name', $filter);
                $query->orWhere('description', 'LIKE', '%{$filter}%');
            }

            if (isset($data['id'])) {
                $query->where('id', $data['id']);
            }

            if (isset($data['name'])) {
                $query->where('name', $data['name']);
            }

            if (isset($data['category_id'])) {
                $query->where('category_id', $data['category_id']);
            }

            if (isset($data['description'])) {
                $description = $data['description'];
                $query->where('description', 'LIKE', '%{$description}%');
            }
        })->paginate($total);
    }

    public function getMyCourse(array $data)
    {
        return $this->with(array('modules' => function ($query) use ($data) {
            $query->with('classrooms');
        }))->whereHas('sales', function ($query) use ($data) {
            $query->where('user_id', $data['user_id']);
        })->where('url', $data['url'])->first();
    }

    public function getCoursesByUser(array $data)
    {
        $courseId = $data['course_id'];
        $userId = $data['user_id'];

        $assignmentsByUser = Assignment::where('user_id', $userId)->count();

        if ($assignmentsByUser > 0) {
            $modules = Module::with(['classrooms' => function ($query) use ($userId) {
                $query->with(['assignments' => function ($q) use ($userId) {
                    $q->where('user_id', $userId)->count();
                }]);
            }])->where('course_id', $courseId)->get();

            return $modules;
        } else {
            return array();
        }
    }

    public function checkPayment(array $data)
    {
        $url = $data['url'];
        $id = $data['course_id'];

        $course = $this->whereHas('inscriptions', function ($q) {
            $q->where('user_id', Auth::id());
        })->where('url', $url)->where('id', $id)->first();

        $inscription = $course->inscriptions->where('user_id', Auth::id())->first();

        $status = $inscription->pivot->where('course_id', $course->id)
                                    ->where('inscription_id', $inscription->id)
                                    ->where('status', 5)->first(['id', 'status', 'code']);
        return $status;
    }

    public function checkCourse(array $data)
    {
        $url = $data['url'];
        $id = $data['course_id'];

        $course = $this->whereHas('inscriptions', function ($q) {
            $q->where('user_id', Auth::id());
        })->where('url', $url)->where('id', $id)->first();

        if ($course) {
            $inscription = $course->inscriptions->where('user_id', Auth::id())->first();

            $status = $inscription->pivot->where('course_id', $course->id)
                ->where('inscription_id', $inscription->id)
                ->first(['id', 'status', 'code']);
            return $status;
        } else {
            return null;
        }
    }

    public function getMyCourses()
    {
        return  DB::table('courses')
                    ->join('modules', 'modules.course_id', 'courses.id')
                    ->join('classrooms', 'classrooms.module_id', 'modules.id')
                    ->join('assignments', 'assignments.classroom_id', 'classrooms.id')
                    ->where('assignments.user_id', Auth()->user()->id)
                    ->select('courses.*')
                    ->groupBy('courses.url')
                    ->get();
    }

    public function studentsAverageScore() {
        //https://dev.to/edmilsonrobson/3-simple-tips-to-improve-your-laravel-code-today-4fdp
        $participants = Module::get();

        /*$sum = 0;
        $totalStudents = 0;
        foreach($participants as $participant) {
            if ($participant->status== 1) {
                $totalStudents++;
                $sum += $participant->course_id;
            }
        }

        return $sum / $totalStudents;*/
        
        /*return $participants->filter(function ($participant) {
            return $participant->status == 1;
        })->average(function ($participant) {
            return $participant->course_id;
        });*/

        /*$bronze = collect(['Seya', 'Shiryu', 'Ikki', 'Hyoga', 'Shun', 'Aldebaran']);

        return $bronzeDeFato = $bronze->reject(function ($cavaleiro) {
            return $cavaleiro === 'Aldebaran';
        })->map(function($cavaleiro) {
            return strtoupper($cavaleiro);
        });*/

        //each
        /*$bronze = collect([
           [
               'name' => 'Seya',
               'constellation' => 'Pegasu',
           ],
           [
               'name' => 'Shiryu',
               'constellation' => 'Dragão',
           ],
           [
               'name' => 'Ikki',
               'constellation' => 'Fênix',
           ],
           [
               'name' => 'Hyoga',
               'constellation' => 'Cisne',
           ],
           [
               'name' => 'Shun',
               'constellation' => 'Ândromeda',
           ],
        ]);

        $bronze->each(function ($cavaleiro){
            echo 'Eu sou o ' 
                . $cavaleiro['name']
                . ' de ' 
                . $cavaleiro['constellation'] 
                . '!!!!' 
                . PHP_EOL;
        });*/

        // Filter
        /*$news = collect([
            [ 
                'name' => 'Fake 1', 
                'type' => 'fake_new' 
            ],
            [ 
                'name' => 'Fake 2', 
                'type' => 'fake_new' 
            ],
            [ 
                'name' => 'Fake 3', 
                'type' => 'fake_new' 
            ],
            [ 
                'name' => 'Fake 4', 
                'type' => 'fake_new' 
            ],
            [ 
                'name' => 'True new', 
                'type' => 'true_new' 
            ],
        ]);
        $news->filter(function ($new) {
            return $new['type'] !== 'fake_new';
        })->each(function ($new) {
            echo 'Temos uma notícia verdadeira:'
                . PHP_EOL
                . '    '
                . $new['name']
                . PHP_EOL;
        });*/

        // First
        /*$collection = collect(['Último', 'Segundo', 'Primeiro']);
            echo 'O '
            . $collection->first() . ' é o primeiro!!!'
            . PHP_EOL; */

        // Has
        
        /*$chaves = collect([
            'chave0' => 'valor bacana',
            'chave1' => 'valor mais bacana isso',
            'para o sucesso' => 'é isso que queremos buscar!',
        ]);
        if ($chaves->has('para o sucesso')) {
            echo 'A CHAVE PARA O SUCESSO FOI ENCONTRADA! ' . $chaves['para o sucesso'] . PHP_EOL;
        }*/

        // keyBy
        /*$byFoot = collect([ 
            'pé direito' => [
                'pé' => 'pé direito', 
                'mão' => 'mão direita',
            ],
            
            'pé esquerdo' => [
                'pé' => 'pé esquerdo', 
                'mão' => 'mão esquerda',
            ],
        ]);

        return $handByFoot = $byFoot->keyBy('mão'); */

        // map
        $elements = collect([
            'Cobre', 
            'Chumbo', 
            'Âmbar', 
            'ELEMENTO X',
        ]);
        $ouro = $elements->map(function ($element) {
            return [ 
                'to' => 'ouro',
                'from' => $element,
            ];
        })->each(function ($newElement) {
            echo 'Criamos ' 
                . $newElement['to'] 
                . ' a partir do ' 
                . $newElement['from'] 
                . PHP_EOL;
        })->dump();

        // pluck
        $bronze = collect([
            [ 
                'name' => 'Fake 1', 
                'type' => 'fake_new' 
            ],
            [ 
                'name' => 'Fake 2', 
                'type' => 'fake_new' 
            ],
            [ 
                'name' => 'Fake 3', 
                'type' => 'fake_new' 
            ],
            [ 
                'name' => 'Fake 4', 
                'type' => 'fake_new' 
            ],
            [ 
                'name' => 'True new', 
                'type' => 'true_new' 
            ],
        ]);

        //$bronze->pluck('name')->dump();

        $nameByConstellation = $bronze->pluck('name', 'constellation')->dump();

        // reduce
        $numbers = collect([690, 132, 155, 1024, 2028]);

        $total = $numbers->reduce(function ($carry, $number) {
            return $carry + $number;
        });
        echo 'total: ' . $total . PHP_EOL;

        // Somar o quadrado
        $total = $numbers->map(function ($item) {
           return $item * $item;
        })->reduce(function ($carry, $number) {
           return $carry + $number;
        });
        echo 'total: ' . $total . PHP_EOL;

        // reject
        $modules = Module::all();

        $names = $modules->reject(function ($module) {
            return $module->status === 1;
        })
        ->map(function ($module) {
            return $module->name . '-' . $module->description;
        })->dump();


    }
}
