<?php namespace DevAlysonh\OrderSystem\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateOrdersTable Migration
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
        Schema::create('devalysonh_ordersystem_orders', function(Blueprint $table) {
            $table->id();
			$table->foreignId('client_id')->constrained()->cascadeOnDelete();
			$table->string('status')->default('pendente');
			$table->date('paid_at')->nullable();
            $table->timestamps();
        });

		// Tabela pivot para ligar N produtos a N pedidos e virse versa.
		Schema::create('order_product', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigInteger('order_id');
			$table->unsignedBigInteger('product_id');
			$table->timestamps();
		
			$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
		});
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('devalysonh_ordersystem_orders');
        Schema::dropIfExists('order_product');
    }
};
