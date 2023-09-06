<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::insert(
            [
                [
                    'name' => 'Free Plan',
                    'price' => 0,
                    'featured' => 0
                ],
                [
                    'name' => 'Basic Plan',
                    'price' => 2000,
                    'featured' => 1
                ],
                [
                    'name' => 'Pro Plan',
                    'price' => 8000,
                    'featured' => 1
                ]
            ]
        );

        Feature::insert([
            [
                'name' => 'Classrooms #',
                'code' => 'classrooms-count',
            ],
            [
                'name' => 'Students Per Classrooms',
                'code' => 'Classroom-student',
            ]
        ]);

        DB::table('plan_feature')->insert([
            ['plan_id' => 1, 'feature_id' => 1, 'feature_value' => 1],
            ['plan_id' => 1, 'feature_id' => 2, 'feature_value' => 10],
            ['plan_id' => 2, 'feature_id' => 1, 'feature_value' => 5],
            ['plan_id' => 2, 'feature_id' => 2, 'feature_value' => 30],
            ['plan_id' => 3, 'feature_id' => 1, 'feature_value' => 100],
            ['plan_id' => 3, 'feature_id' => 2, 'feature_value' => 1000],
        ]);
    }
}
