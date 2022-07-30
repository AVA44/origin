<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'バラ', 'ゆらゆらBOX', '六角BOX', 'コンテナBOX', 'バーレル', 'パイプBOX', 'ポッド', 'ミドルBOX'
            ];
            
        foreach($categories as $category) {
            Category::create([
                'category' => $category
                ]);
        }
    }
}
