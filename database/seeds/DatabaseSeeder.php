<?php

use Illuminate\Database\Seeder;
use App\site_settings;

class DatabaseSeeder extends Seeder
{
  /**
  * Seed the application's database.
  *
  * @return void
  */
  public function run()
  {
    site_settings::create([
      'for' => "site_maintanace",
      'content' => "false",
    ]);
  }
}
