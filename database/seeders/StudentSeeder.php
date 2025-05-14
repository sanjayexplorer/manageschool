<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\ClassModel;
use App\Models\Section;
use Faker\Factory as Faker;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $MAX_STUDENTS_PER_SECTION = 50;

        $classes = ClassModel::all();

        foreach ($classes as $class) {
            $totalStudents = 100;

            $totalSections = ceil($totalStudents / $MAX_STUDENTS_PER_SECTION);

            $sections = [];
            for ($i = 0; $i < $totalSections; $i++) {
                $sectionName = chr(65 + $i);
                $sections[] = Section::firstOrCreate([
                    'class_id' => $class->id,
                    'name' => $sectionName
                ]);
            }

            $lastRollNumber = Student::where('class_id', $class->id)->max('roll_number') ?? 0;
            $studentCounter = 1;

            foreach ($sections as $section) {
                $sectionStudents = min($MAX_STUDENTS_PER_SECTION, $totalStudents - ($studentCounter - 1));

                for ($i = 0; $i < $sectionStudents; $i++) {
                    Student::create([
                        'first_name' => $faker->firstName,
                        'last_name' => $faker->lastName,
                        'email' => $faker->email,
                        'phone' => $faker->phoneNumber,
                        'dob' => $faker->date('Y-m-d', '-10 years'),
                        'gender' => $faker->randomElement(['male', 'female']),
                        'address_line_1' => $faker->address,

                        'class_id' => $class->id,
                        'section_id' => $section->id,
                        'roll_number' => $lastRollNumber + $studentCounter++,

                        'admission_date' => $faker->date(),
                        'guardian_name' => $faker->name,
                        'guardian_relation' => $faker->randomElement(['father', 'mother', 'guardian']),
                        'guardian_email' => $faker->email,
                        'guardian_phone' => $faker->phoneNumber,
                        'status' => 'active',
                    ]);
                }
            }
        }
    }
}

