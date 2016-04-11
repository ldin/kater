<?php

class PropertyTableSeeder extends Seeder {

  public function run()
  {
      DB::table('properties')->delete();

      DB::table('properties')->insert(array(
          array( 'name' => 'Длина', 'slug'=>'length', ),
          array( 'name' => 'Ширина', 'slug'=>'width', ),
          array( 'name' => 'Гости', 'slug'=>'guests', ),
          array( 'name' => 'Скорость', 'slug'=>'speed', ),
          array( 'name' => 'Интерьер', 'slug'=>'interior', ),
      ));
  }

}


//заполнить базу:
//php artisan db:seed --class=PropertyTableSeeder
