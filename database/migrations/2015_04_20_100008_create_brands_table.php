<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class CreateBrandsTable extends Migration {

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
		Capsule::schema()->create('brands', function(Blueprint $table)
		{
			$table->increments('id');

            $table->string('name');
            $table->string('slug')->unique();
            $table->string('avatar')->nullable();
            $table->text('description')->nullable();

			$table->timestamps();

            $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Capsule::schema()->drop('brands');
	}

}
