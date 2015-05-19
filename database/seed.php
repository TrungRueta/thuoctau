<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Created by PhpStorm.
 * User: rueta
 * Date: 4/28/15
 * Time: 7:08 AM
 * @property array Classes
 */

class Seed extends Seeder {


    public function run()
    {
        Model::unguard();

        Capsule::table('brands')->delete();
        Capsule::table('blends')->delete();

        //disable foreign key check for this connection before running seeders
        Capsule::connection()->statement('SET FOREIGN_KEY_CHECKS=0;');
        
        $this->call(BrandTableSeeder::class);
        $this->call(ExtendFieldTableSeeder::class);

        // supposed to only apply to a single connection and reset it's self
        // but I like to explicitly undo what I've done for clarity
        Capsule::connection()->statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}