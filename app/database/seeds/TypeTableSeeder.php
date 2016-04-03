<?php

class TypeTableSeeder extends Seeder {

  public function run()
  {
    DB::table('types')->delete();
    DB::table('types')->insert(array(
      array( 'type' => 'page', 'name'=>'Главная', 'status'=>'1', 'template'=>'page' ),
      array( 'type' => 'about', 'name'=>'О нас', 'status'=>'1', 'template'=>'page'),
      array( 'type' => 'rent', 'name'=>'Аренда', 'status'=>'1', 'template'=>'page'),
      array( 'type' => 'photo', 'name'=>'Фото', 'status'=>'1', 'template'=>'page'),
      array( 'type' => 'service', 'name'=>'Услуги', 'status'=>'1', 'template'=>'page'),
      array( 'type' => 'news', 'name'=>'Новости', 'status'=>'1', 'template'=>'page'),
      array( 'type' => 'contacts', 'name'=>'Контакты', 'status'=>'1', 'template'=>'page'),
      array( 'type' => 'pages', 'name'=>'Страницы', 'status'=>'0', 'template'=>'page'),

    ));

  }

}

//заполнить базу:
//php artisan db:seed --class=TypeTableSeeder

