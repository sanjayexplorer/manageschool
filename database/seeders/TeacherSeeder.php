<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $specializations = ['English', 'Math', 'Science', 'Social Studies', 'Language'];

        foreach ($specializations as $index => $subject) {
            DB::table('teachers')->insert([
                'first_name'     => 'Teacher' . ($index + 1),
                'last_name'      => 'Lastname' . ($index + 1),
                'email'          => 'teacher' . ($index + 1) . '@school.com',
                'phone'          => '123456789' . $index,
                'gender'         => $index % 2 == 0 ? 'male' : 'female',
                'date_of_birth'  => now()->subYears(30 + $index)->toDateString(),
                'qualification'  => 'B.Ed',
                'specialization' => $subject,
                'status'         => 'active',
                'created_at'     => now(),
                'updated_at'     => now(),
            ]);
        }
    }
}
