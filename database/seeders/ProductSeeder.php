<?php
namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = url("/data/products.xml");

		// Read entire file into string
		$xmlfile = file_get_contents($path);
		  
		// Convert xml string into an object
		$new = simplexml_load_string($xmlfile);
		  
		// Convert into json
		$con = json_encode($new);
		  
		// Convert into associative array
		$productArr = json_decode($con, true);

		foreach ($productArr as $key => $valueOneTwo) {
			$product = [];
			$product['description'] = $product['product_image'] = "";

			$product['description'] = $valueOneTwo['@attributes']["description"];
			$product['product_image'] = $valueOneTwo['@attributes']["product_image"];
			
			foreach ($valueOneTwo['catalog_item'] as $key2 => $catalog) {
				$product['gender'] = $product['item_number']  = $product['description2'] = $product['color'] = "";
				$product['price'] = 0;

				$product['gender'] = $catalog["@attributes"]["gender"];

				foreach ($catalog["item_number"] as $key => $product['item_number']) {  
					Product::updateOrCreate($product);	
				}

				$product['item_number'] = "";

				foreach ($catalog["price"] as $key => $product['price']) {
					Product::updateOrCreate($product);	
				}

				$product['price'] = 0;

				foreach ($catalog["size"] as $key => $size) {
					$product['description2'] = $size["@attributes"]["description"];

					foreach ($size["color"] as $key => $product['color']) {
						Product::updateOrCreate($product);	
					}	 	
				}
			}
		}
    }
}
