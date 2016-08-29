<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		$user = new User;
		$user->username = "Anheru88";
		$user->email = "ajimenez@digitalcaribe.com.co";
		$user->password = Hash::make('12345');
		$user->save();
	}

}