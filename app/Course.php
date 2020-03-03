<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    protected $fillable = [
        'name', 'url', 'description', 'image', 'link_buy', 'price', 'price_old',
        'total_hours', 'free', 'published', 'price_plots', 'total_plots', 'status', 'user_id', 'category_id'
    ];

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

    public function scopeOfUrl($query, $url)
    {
        return $query->where('url', $url);
    }

    public function scopeStatus($query)
    {
        return $query->where('status', 1);
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

        $course->inscriptions->where('user_id', Auth::id())->first();
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
            ->withPivot('course', 'amount', 'price', 'subtotal')
            ->withTimestamps();
    }
}