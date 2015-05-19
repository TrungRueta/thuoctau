<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class CreateBlendsTable extends Migration {
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
        Capsule::schema()->create('blends', function(Blueprint $table)
		{
			$table->increments('id');

            $table->string('name');
            $table->string('slug')->unique();
            $table->string('avatar')->nullable();
            $table->text('description')->nullable();

            $table->integer('brand_id')->unsigned();

			$table->timestamps();

            $table->softDeletes();

            //$table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Capsule::schema()->drop('blends');
	}

}
