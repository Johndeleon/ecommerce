<?php
use App\ProductCategory;
use Illuminate\Database\Seeder;

class insert_into_product_categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      ProductCategory::insert(
        [
      	["name" => "furniture"],
      	["name" => "gadget"],
      	["name" => "decor"],
      	["name" => "kitchen"],
      	["name" => "lights"]
      	]
        );
    }
}
