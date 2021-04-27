<?php

use Illuminate\Database\Seeder;

use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Usuario com o rol editor
        $editor = User::create([
        	'name' => 'editor',
        	'email' => 'editor@gmail.com',
        	'password' => bcrypt('secret'),
        ]);

        $editor->assignRole('editor');

        //Usuario com o rol moderador
        $editor = User::create([
        	'name' => 'moderador',
        	'email' => 'moderador@gmail.com',
        	'password' => bcrypt('secret'),
        ]);

        $editor->assignRole('moderador');

        //Usuario com o rol super-admin
        $editor = User::create([
        	'name' => 'admin',
        	'email' => 'admin@gmail.com',
        	'password' => 'password', //bcrypt('secret'),
        ]);

        $editor->assignRole('super-admin');
    }
}
