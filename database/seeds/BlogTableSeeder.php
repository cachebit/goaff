<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class BlogTableSeeder extends Seeder {

    public function run()
    {
        \DB::table('blogs')->delete();

        \DB::table('blogs')->insert(array (
        ));

    }

}
