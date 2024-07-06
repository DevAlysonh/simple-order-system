<?php namespace DevAlysonh\OrderSystem\Updates;

use Illuminate\Support\Facades\DB;
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
		DB::raw("DROP TABLE devalysonh_ordersystem_products;");
		DB::raw("DROP TABLE devalysonh_ordersystem_clients;");
		DB::raw("DROP TABLE devalysonh_ordersystem_orders;");
    }
};
