<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('short_name');
            $table->text('short_des');
            $table->string('slug');
            $table->boolean('is_menu');
            $table->string('cover_photo')->nullable();
            $table->string('home_photo_new')->nullable();
            $table->string('home_photo_highlight')->nullable();
            $table->string('logo')->nullable();
            $table->string('investor')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->integer('status')->nullable()->default(1);
            $table->boolean('is_show_homepage')->nullable();
            $table->boolean('is_new')->nullable();
            $table->integer('page_view')->default(rand(100, 1000));
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
