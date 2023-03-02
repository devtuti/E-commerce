<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->unsignedBigInteger('cat_id');
            $table->integer('product_code');
            $table->string('product_name',100);
            $table->enum('product_type', ['number','gr', 'l']);
            $table->integer('product_howmanyNumber')->nullable();
            $table->integer('product_howmanyGr')->nullable();
            $table->integer('product_howmanyL')->nullable();
            $table->decimal('price', 6, 2);
            $table->string('p_color',50)->nullable();
            $table->string('p_size',30)->nullable();
            $table->string('p_photo',100)->nullable();

            $table->foreign('cat_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
