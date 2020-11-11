<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_images', function (Blueprint $table) {
            $table->id();
            //the two entries below are the best way to reference a foreign key n set up reference constraints
            //you must first of all create the fk field before declaring it as a fk
            $table->integer('shop_id')->unsigned();
            $table->foreign('shop_id')->references('id')->on('feeds')->onDelete('cascade');
            $table->string('image_name');
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
        Schema::table('shop_images', function(Blueprint $table)
        {
            //need to drop the fk field first, and the index, before dropping the column
            $table->dropForeign('shop_images_shop_id_foreign');
            //$table->dropIndex('shop_images_shop_id_index');
            //$table->dropColumn('shop_id');
        });

        Schema::dropIfExists('shop_images');

    }
}
