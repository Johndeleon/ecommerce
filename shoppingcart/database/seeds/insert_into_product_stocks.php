<?php
use App\ProductStock;
use Illuminate\Database\Seeder;

class insert_into_product_stocks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductStock::insert(
        	[
        	["product_id" => 1,
        	 "serial_number" => "098"
        	],
        	["product_id" => 1,
        	 "serial_number" => "097"
        	],
        	["product_id" => 1,
        	 "serial_number" => "096"
        	],
        	["product_id" => 1,
        	 "serial_number" => "095"
        	],
        	["product_id" => 2,
        	 "serial_number" => "198"
        	],
        	["product_id" => 2,
        	 "serial_number" => "197"
        	],
        	["product_id" => 2,
        	 "serial_number" => "196"
        	],
        	["product_id" => 2,
        	 "serial_number" => "195"
        	],
        	["product_id" => 3,
        	 "serial_number" => "298"
        	],
        	["product_id" => 3,
        	 "serial_number" => "297"
        	],
        	["product_id" => 3,
        	 "serial_number" => "296"
        	],
        	["product_id" => 3,
        	 "serial_number" => "295"
        	],
        	["product_id" => 4,
        	 "serial_number" => "398"
        	],
        	["product_id" => 4,
        	 "serial_number" => "397"
        	],
        	["product_id" => 4,
        	 "serial_number" => "396"
        	],
        	["product_id" => 4,
        	 "serial_number" => "395"
        	],
        	["product_id" => 5,
        	 "serial_number" => "498"
        	],
        	["product_id" => 5,
        	 "serial_number" => "497"
        	],
        	["product_id" => 5,
        	 "serial_number" => "496"
        	],
        	["product_id" => 5,
        	 "serial_number" => "495"
        	]
        	]
        	);
    }
}
