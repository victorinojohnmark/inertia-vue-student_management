<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Section;

class ClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classes::factory()
        ->count(10)
        ->sequence(fn($sequence) => ['name' => 'Class ' . $sequence->index + 1])
        ->has(
            Section::factory()
            ->count(2)
            ->state(
                new Sequence(
                    ['name' => 'Section A'],
                    ['name' => 'Section B']
                )
            )
            ->has(
                Student::factory()
                ->count(5)
                ->state(
                    function (array $attributes, Section $section) {
                        return ['class_id' => $section->class_id];
                    }
                )
            )
        )
        ->create();
    }
}
