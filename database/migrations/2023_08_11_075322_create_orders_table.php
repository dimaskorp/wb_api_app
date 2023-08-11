<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("g_number");
            $table->string("date");
            $table->string("last_change_date");
            $table->string("supplier_article");
            $table->string("tech_size");
            $table->string("barcode");
            $table->float("total_price");
            $table->integer("discount_percent");
            $table->string("warehouse_name");
            $table->string("oblast");
            $table->integer("income_id");
            $table->bigInteger("odid");
            $table->bigInteger("nm_id");
            $table->string("subject");
            $table->string("category");
            $table->string("brand");
            $table->integer("is_cancel");
            $table->integer("cancel_dt")->nullable()->default(0);
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
