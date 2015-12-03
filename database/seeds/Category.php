<?php

use Illuminate\Database\Seeder;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     	factory(CodeDelivery\models\Category::class, 10)->create()->each(function($c){

     		for($i=0;$i<=5;$i++){
     			$c->products()->save(factory(CodeDelivery\models\Product::class)->make());
     		}

     	});   
    }
}
