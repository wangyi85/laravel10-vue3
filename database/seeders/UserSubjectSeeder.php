<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\Subject::create([
            'name' => 'Mathematics'
        ]);

        \App\Models\Subject::create([
            'name' => 'Signals and Systems'
        ]);

        \App\Models\UserSubject::create([
            'user_id' => 1,
            'subject_id' => 1
        ]);

        \App\Models\UserSubject::create([
            'user_id' => 1,
            'subject_id' => 2
        ]);

        \App\Models\UserSubject::create([
            'user_id' => 2,
            'subject_id' => 1
        ]);

        \App\Models\UserSubject::create([
            'user_id' => 2,
            'subject_id' => 2
        ]);
    }
}
