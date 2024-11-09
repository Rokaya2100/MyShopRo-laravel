<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product1 = Product::create([
            'name'       => 'hp2500',
            'description'=> 'Disk:512',
            'image'=>'public/assets/uploads/products/hp.jpg',
            'price'=>'1200$',
            'stock'=>'12',
        ]);

        $product2 = Product::create([
            'name'       => 'iphone12pro',
            'description'=> 'Camera:48',
            'image'=>'public/assets/uploads/products/iphone.jpg',
            'price'=>'900$',
            'stock'=>'24',
        ]);

        $product3 = Product::create([
            'name'       => 'samsung Tab',
            'description'=> 'screen:22 Inch',
            'image'=>'public/assets/uploads/products/tab2.jpg',
            'price'=>'650$',
            'stock'=>'36',
        ]);

        $product4 = Product::create([
            'name'       => 'samsung S24',
            'description'=> 'camera:112 Inch',
            'image'=>'public/assets/uploads/products/samsung.jpg',
            'price'=>'1100$',
            'stock'=>'29',
        ]);

        $category1 = Category::where('name','Phones')->first();
        $category2 = Category::where('name','Tabs')->first();
        $category3 = Category::where('name','Labtobs')->first();

        $product1->categories()->sync([$category2->id,$category3->id]);
        $product2->categories()->sync([$category1->id]);
        $product3->categories()->sync([$category1->id,$category2->id]);
        $product4->categories()->sync([$category1->id,$category2->id,$category3->id]);
    }
}
