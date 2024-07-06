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
        Schema::create('orders', function(Blueprint $table) {
            $table->id();
			$table->foreignId('client_id')->constrained()->cascadeOnDelete();
			$table->integer('status')->default(3);
			$table->date('paid_at')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * down reverses the migration
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
