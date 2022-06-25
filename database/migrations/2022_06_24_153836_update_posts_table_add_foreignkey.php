<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTableAddForeignkey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {

            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')
            //       ->references('id')
            //       ->on('user_id');

            $table->foreignId('category_id')->nullable()->constrained()->OnDelete('set null');
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['categoey_id']);
            $table->dropColumn('categoey_id');
            $table->dropColumn('Image');
        });
    }
}
