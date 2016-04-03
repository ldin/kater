<?php

class SettingTableSeeder extends Seeder {

  public function run()
  {
    DB::table('settings')->delete();

    DB::table('settings')->insert(array(
      array( 'name' => 'title', 'title'=>'title', 'value'=>'', ),
      array( 'name' => 'phone', 'title'=>'Телефон', 'value'=>'', ),
      array( 'name' => 'email_head', 'title'=>'email на сайте', 'value'=>'', ),
      array( 'name' => 'email', 'title'=>'email для отправки формы', 'value'=>'', ),
    ));
  }

}


//заполнить базу:
//php artisan db:seed --class=SettingTableSeeder
