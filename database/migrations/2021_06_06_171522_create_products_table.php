<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_category_id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('order')->nullable();
            $table->string('extra')->nullable();
            $table->tinyInteger('outstanding')->default(0);
            $table->string('material')->nullable();
            $table->string('capacity')->nullable();
            $table->string('amount')->nullable();
            $table->string('cover')->nullable();
            $table->string('color')->nullable();
            $table->string('weight')->nullable(); 
            $table->string('offers')->nullable();  
            $table->timestamps();
            $table->foreign('sub_category_id')
                ->references('id')->on('sub_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
