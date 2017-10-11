<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(insert_into_product_categories::class);
         $this->call(insert_into_products::class);
         $this->call(insert_into_product_stocks::class);
         $this->call(insert_into_product_prices::class);
    }
}
