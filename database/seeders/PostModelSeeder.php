<?php

namespace Database\Seeders;

use App\Models\PostModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// php artisan make:seeder PostModelSeeder
// php artisan db:seed (Launch database seed)
class PostModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostModel::factory()->count(15)->create();
    }
}
