<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$user = User::where('email', 'tanvirnstu@gmail.com')->first();
		if (is_null($user)) {
			$user = new User;
			$user->name = "Tanvir Hasan";
			$user->email = "tanvirnstu@gmail.com";
			$user->password = Hash::make('12345678');
			$user->save();

		}

	}
}
