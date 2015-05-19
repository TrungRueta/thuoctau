<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class createBlendsMediaTable extends Migration {
    function __construct($connection)
    {
        $this->connection = $connection;
    }


    /**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Capsule::schema()->create('blends_media', function(Blueprint $table)
		{
            $table->integer('id')->unsigned();
            $table->integer('id_media')->unsigned();
            $table->tinyInteger('online')->unsigned()->default(1);
            $table->integer('ordering')->unsigned()->default(9999)->nullable();
            $table->string('url')->nullable();
            $table->string('lang_display')->nullable();

            $table->primary(array('id', 'id_media'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Capsule::schema()->drop('blends_media');
	}

}
