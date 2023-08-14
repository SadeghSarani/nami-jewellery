<?php

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use SoftDeletes;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_category_id');
            $table->bigInteger('product_group_id');
            $table->string('fa_name');
            $table->string('warranty')->nullable();
            $table->json('images');
            $table->longText('description')->nullable();
            $table->longText('general_specifications')->nullable();
            $table->enum('special_offers',  ['true', 'false'])->default('false');
            $table->enum('most_sold_products',  ['true', 'false'])->default('false');
            $table->enum('active',  ['true', 'false'])->default('true');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
