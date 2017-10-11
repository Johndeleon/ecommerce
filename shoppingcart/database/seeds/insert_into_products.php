<?php
use App\Product;
use Illuminate\Database\Seeder;

class insert_into_products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::insert(
        	[
        	["name" => "rattan chair",
        	 "description" => "lorem ipsum dolor",
        	 "category_id" => 1,
        	 "barcode" => 123
        	 ],
        	 ["name" => "Iphone9",
        	 "description" => "lorem ipsum dolor",
        	 "category_id" => 2,
        	 "barcode" => 234
        	 ],
        	 ["name" => "caligraphy scroll decor",
        	 "description" => "lorem ipsum dolor",
        	 "category_id" => 3,
        	 "barcode" => 345
        	 ],
        	 ["name" => "salamander stove",
        	 "description" => "lorem ipsum dolor",
        	 "category_id" => 4,
        	 "barcode" => 456
        	 ],
        	 ["name" => "Firefly 10W lightbulb",
        	 "description" => "lorem ipsum dolor",
        	 "category_id" => 5,
        	 "barcode" => 567
        	 ]
        	]
        				);
    }
}
