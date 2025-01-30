<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
			$category = Category::query()->create([
				'name' => 'Category ' . $i,
			]);
			for ($j = 0; $j < 2; $j++) {
				Product::query()->create([
					'name' => 'Product ' . $j . $i,
					'category_id' => $category->id,
				]);
			}
        }
    }
}
