<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // Admin


        \App\Models\Admin::create([
            'name'=>'Admin',
            'Email' => 'admin@admin.com',
            'password'=>bcrypt('password')
        ]);

       // User


        \App\Models\User::create([
            'name'=>'ahmad',
            'age'=>'25',
            'phone'=>'0940784561',
            'gender'=>'male',
            'image'=>'1661948969.jpg',
            'country'=>'syria',
            'Email' => 'user@user.com',
            'password'=>bcrypt('password')
        ]);
         \App\Models\User::create([
            'name'=>'anas',
            'age'=>'12',
            'phone'=>'094078453361',
            'gender'=>'male',
            'image'=>'1661948969.jpg',
            'country'=>'syria',
            'Email' => 'user@user1.com',
            'password'=>bcrypt('password')
        ]);



        //  Academy

        \App\Models\Academy::create([
            'name'=>'جامعة حلب',
            'Email' => 'aleppo@academy.com',
            'password'=>bcrypt('password'),
            'photo'=>'1661948969.jpg',

        ]);
        \App\Models\Academy::create([
            'name'=>'جامعة الشام',
            'Email' => 'damascus@academy.com',
            'photo'=>'1661948969.jpg',
            'password'=>bcrypt('password'),
        ]);
        \App\Models\Academy::create([
            'name'=>'مهعد التعليم العالي',
            'Email' => 'High@academy.com',
            'photo'=>'1661948969.jpg',
            'password'=>bcrypt('password')
        ]);



        //AcademyUser
        
        \App\Models\Academy\AcademyUser::create([
            'academy_id'=>'1',
            'user_id' => '1',
            'status'=>'1',
        ]);
        \App\Models\Academy\AcademyUser::create([
            'academy_id'=>'2',
            'user_id' => '1',
            'status'=>'1',
        ]);
        \App\Models\Academy\AcademyUser::create([
            'academy_id'=>'2',
            'user_id' => '2',
            'status'=>'1',
        ]);
        \App\Models\Academy\AcademyUser::create([
            'academy_id'=>'1',
            'user_id' => '2',
            'status'=>'1',
        ]);



        // Specialization

        \App\Models\Academy\Specialization::create([
            'name'=>'الهندسة المعلوماتية',
            'academy_id' => '1',
            'photo'=>'1661948969.jpg',
        ]);

        \App\Models\Academy\Specialization::create([
            'name'=>'الهندسة المعمارية',
            'academy_id' => '1',
            'photo'=>'1661948969.jpg',
        ]);
        
        \App\Models\Academy\Specialization::create([
            'name'=>'كلية التربية',
            'academy_id' => '2',
            'photo'=>'1661948969.jpg',
        ]);




        //Path


        \App\Models\Academy\Path::create([
            'name'=>'الشبكات',
            'specialization_id' => '1',
            'academy_id' => '1',
            'photo'=>'1661948969.jpg',

        ]);

        \App\Models\Academy\Path::create([
            'name'=>'البرمجيات',
            'specialization_id' => '1',
            'academy_id' => '1',
            'photo'=>'1661948969.jpg',
        ]);

        \App\Models\Academy\Path::create([
            'name'=>'3d max',
            'specialization_id' => '2',
            'academy_id' => '1',
            'photo'=>'1661948969.jpg',
        ]);

    

    }
}
