<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert([
            [
                'name' => 'Pew Pew Milk Tea',
                'description' => 'Veli Nice',
                'category_id' => 1,
                'price' => 8.00,
                'quantity' => 30,
                'images' => '1681220183_1.jpg'
            ],
            [
                'name' => 'Pew Pew Fresh Milk',
                'description' => 'Veli Nice',
                'category_id' => 1,
                'price' => 8.00,
                'quantity' => 20,
                'images' => '1681220206_2.jpg'
            ],
            [
                'name' => 'Pew Pew Chocolate',
                'description' => 'Veli Nice',
                'category_id' => 1,
                'price' => 9.00,
                'quantity' => 40,
                'images' => '1681220212_3.jpg'
            ],
            [
                'name' => 'Pew Pew Coffee',
                'description' => 'Veli Nice',
                'category_id' => 1,
                'price' => 10.00,
                'quantity' => 35,
                'images' => '1681220217_4.jpg'
            ],
            [
                'name' => 'Signature Coco',
                'description' => 'Superior indeed, thick fresh cream is added to rich cocoa, making this concoction one of the most de',
                'category_id' => 2,
                'price' => 7.17,
                'quantity' => 35,
                'images' => '1681220223_5.jpg'
            ],
            [
                'name' => 'Hazelnut Coco',
                'description' => 'Nothing quite as heart-warming as thick cocoa mixed with the flavors of roasted hazelnuts. Definitel',
                'category_id' => 2,
                'price' => 7.26,
                'quantity' => 35,
                'images' => '1681220231_6.jpg'
            ],
            [
                'name' => 'Coco Latte',
                'description' => 'find your balance with this Yin & Yang concoction that will get you shaking and stirring.',
                'category_id' => 2,
                'price' => 7.64,
                'quantity' => 35,
                'images' => '1681220239_7.jpg'
            ],
            [
                'name' => 'Malty Coco (Horlicks)',
                'description' => 'Energize the active being in you with the perfect match of Horlicks and delicious cocoa.',
                'category_id' => 1,
                'price' => 10.00,
                'quantity' => 35,
                'images' => '1681220245_9.jpg'
            ],
            [
                'name' => 'Signature Brown Sugar Pearl Milk Tea',
                'description' => 'A locally-upgraded version of the Originla Milk Tes, now with brown sugar! Combined with the irresis',
                'category_id' => 3,
                'price' => 10.00,
                'quantity' => 35,
                'images' => '1681220252_10.jpg'
            ],
            [
                'name' => 'Original Pearl Milk Tea',
                'description' => 'The Original Pearl Milk Tea tops the chart as teh most famous type of milk tea in the world. A must-',
                'category_id' => 3,
                'price' => 10.00,
                'quantity' => 35,
                'images' => '1681220278_11.jpg'
            ],
            [
                'name' => 'Roasted Milk Tea with Grass Jelly',
                'description' => 'Soft and silky smooth, from the taste of the tea to the toppings themselves. We recommend this mild',
                'category_id' => 3,
                'price' => 10.00,
                'quantity' => 35,
                'images' => '1681220293_12.jpg'
            ],
            [
                'name' => 'Black Diamond Roasted Milk Tea',
                'description' => 'This is the drink that make you feel like you are shining with the black diamond on top of the drink',
                'category_id' => 3,
                'price' => 10.00,
                'quantity' => 35,
                'images' => '1681220300_13.jpg'
            ],
            [
                'name' => 'Nishio Matcha with Signature Warm Pearls',
                'description' => 'Nishio Matcha with Signature Warm Pearls',
                'category_id' => 4,
                'price' => 10.00,
                'quantity' => 35,
                'images' => '1681220308_14.jpg'
            ],
            [
                'name' => 'Nishio Matcha Milk Tea with Red Bean',
                'description' => 'Nishio Matcha Milk Tea with Red Bean',
                'category_id' => 4,
                'price' => 10.00,
                'quantity' => 35,
                'images' => '1681220316_15.jpg'
            ],
            [
                'name' => 'Nishio Matcha Smoothie with Red Bean',
                'description' => 'Nishio Matcha Smoothie with Red Bean',
                'category_id' => 4,
                'price' => 10.00,
                'quantity' => 35,
                'images' => '1681220324_16.jpg'
            ],
            [
                'name' => 'Nishio Matcha Latte',
                'description' => 'Nishio Matcha Latte',
                'category_id' => 4,
                'price' => 10.00,
                'quantity' => 35,
                'images' => '1681220333_17.jpg'
            ],
            [
                'name' => 'Mango Passion Smoothie',
                'description' => 'This drink has finely-shaved ice mixed with passionfruit pulp and mango to make up one of the fruiti',
                'category_id' => 5,
                'price' => 10.00,
                'quantity' => 35,
                'images' => '1681220340_18.jpg'
            ],
            [
                'name' => 'Lychee Sago Tea Smoothie',
                'description' => 'This light and refreshing drink counters the hot weather outside with its lychee and tea combination',
                'category_id' => 5,
                'price' => 10.00,
                'quantity' => 35,
                'images' => '1681220348_19.jpg'
            ],
            [
                'name' => 'Malty Smoothie (Horlicks)',
                'description' => 'Cool off with our one-and-only malt based smoothie, packed with milky and nitritious goodness. Great',
                'category_id' => 5,
                'price' => 10.00,
                'quantity' => 35,
                'images' => '1681220356_20.jpg'
            ]
        ]);
    }
}
