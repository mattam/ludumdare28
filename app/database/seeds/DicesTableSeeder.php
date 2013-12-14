<?php

class DicesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('dices')->truncate();

		$dices = array(
			['rolled' => 5],
			['rolled' => 2],
			['rolled' => 6]
		);

		// Uncomment the below to run the seeder
		 DB::table('dices')->insert($dices);
	}

}
