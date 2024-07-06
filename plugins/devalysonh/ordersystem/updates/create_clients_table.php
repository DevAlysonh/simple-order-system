<?php namespace DevAlysonh\OrderSystem\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateClientsTable Migration
 *
 * @link https://docs.octobercms.com/3.x/extend/database/structure.html
 */
return new class extends Migration
{
    /**
     * up builds the migration
     */
    public function up()
    {
        Schema::create('devalysonh_ordersystem_clients', function(Blueprint $table) {
            $table->id();
			$table->string('name', 150)->nullable(false);
			$table->string('gender', 100)->nullable(false)->default('nao_informado');
            $table->timestamps();
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('devalysonh_ordersystem_clients');
    }
};
