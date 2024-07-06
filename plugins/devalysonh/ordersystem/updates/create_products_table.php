<?php namespace DevAlysonh\OrderSystem\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateProductsTable Migration
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
        Schema::create('devalysonh_ordersystem_products', function(Blueprint $table) {
            $table->id();
			$table->string('name', 150)->nullable(false);
			$table->integer('price')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('devalysonh_ordersystem_products');
    }
};
