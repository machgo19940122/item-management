<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index();
            $table->string('name', 100)->index();
            $table->string('status', 100)->default('active');
            $table->smallInteger('type')->nullable()->comment('1=Mens,2=Womens,3=unisex');
            $table->smallInteger('season')->nullable()->comment('1=SS,2=FW');
            $table->smallInteger('category')->nullable()->comment('1=Outer,2=Bottoms,3=Shirt,4=others');

            $table->string('detail', 500)->nullable();
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
        Schema::dropIfExists('items');
    }
}
