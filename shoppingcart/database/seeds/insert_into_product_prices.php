<?php
use App\ProductPrice;
use Illuminate\Database\Seeder;

class insert_into_product_prices extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductPrice::insert(
        	[
        	["product_id" => 1,
        	 "description" => "economical",
        	 "price" => 10000
        	],
        	["product_id" => 1,
        	 "description" => "default",
        	 "price" => 100000
        	],
        	["product_id" => 1,
        	 "description" => "plus",
        	 "price" => 1000000
        	],
        	["product_id" => 2,
        	 "description" => "economical",
        	 "price" => 10000
        	],
        	["product_id" => 2,
        	 "description" => "default",
        	 "price" => 100000
        	],
        	["product_id" => 2,
        	 "description" => "plus",
        	 "price" => 1000000
        	],
        	["product_id" => 3,
        	 "description" => "economical",
        	 "price" => 10000
        	],
        	["product_id" => 3,
        	 "description" => "default",
        	 "price" => 100000
        	],
        	["product_id" => 3,
        	 "description" => "plus",
        	 "price" => 1000000
        	],
        	["product_id" => 4,
        	 "description" => "economical",
        	 "price" => 10000
        	],
        	["product_id" => 4,
        	 "description" => "default",
        	 "price" => 100000
        	],
        	["product_id" => 4,
        	 "description" => "plus",
        	 "price" => 1000000
        	],
        	["product_id" => 5,
        	 "description" => "economical",
        	 "price" => 10000
        	],
        	["product_id" => 5,
        	 "description" => "default",
        	 "price" => 100000
        	],
        	["product_id" => 5,
        	 "description" => "plus",
        	 "price" => 1000000
        	]
        	]);
    }
}
