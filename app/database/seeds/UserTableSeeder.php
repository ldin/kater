<?php

class UserTableSeeder extends Seeder {

  public function run()
  {
      DB::table('users')->delete();

      User::create(array('email' => 'super@admin.my', 'name'=>'SuperAdmin', 'password'=>Hash::make('gfhjkm'), 'isActive'=>1));
  }

}


//заполнить базу:
//php artisan db:seed --class=UserTableSeeder
