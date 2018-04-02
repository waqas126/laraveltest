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
        DB::table('users')->insert([
            'name' => 'Muhammad Waqas',
            'email' => 'waqasa161@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        DB::table('products')->insert([
            'product_title' => 'Test Product',
            'product_description' => 'Test Description',
            'product_price' => '199',
            'product_image' => 'test.jpg',
            'added_by' => '1',
            'created_at' => '2018-04-02 00:00:00',
            'updated_at' => '2018-04-02 00:00:00',
        ]);

        DB::table('ads')->insert([
            'ad_title' => 'Test Ad',
            'ad_description' => 'Test Description',
            'City' => 'Dubai',
            'company_name' => 'Test Company',
            'posted_by' => '1',
            'created_at' => '2018-04-02 00:00:00',
            'updated_at' => '2018-04-02 00:00:00',
        ]);

        DB::table('cars')->insert([
            'car_model' => '488 GTB',
            'car_maker' => 'Ferrari',
            'color' => 'red',
            'car_description' => 'Test Description',
            'car_image' => 'ferrari-488-gtb.jpg',
            'car_price' => '20000',
            'posted_by' => '1',
            'created_at' => '2018-04-02 00:00:00',
            'updated_at' => '2018-04-02 00:00:00',
        ]);
    }
}
