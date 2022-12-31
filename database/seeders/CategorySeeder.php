<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::create([
            'name'              => "formal",
            'description'       =>'xxxxxxxxxx',
            'create_user_id'    => null,
        ]);

        $category = Category::create([ //ID = 2
            'name'             => "Casual",
            'description'      => 'xxxxxxxxxx',
            'create_user_id'   => null,
        ]);

        $category = Category::create([ //ID = 3
            'name'             => "Sports Wear",
            'description'      => 'xxxxxxxxxx',
            'create_user_id'   => null,
        ]);

    }
}
