<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            //$table->integer('id');
            $table->integer('version_id')->default(1);
            //$table->unique(["id", "version_id"]);
            $table->string('project_title');
            $table->string('author');
            $table->string('organisation')->nullable();
            $table->string('abstract');
            $table->string('category');
            $table->string('energy_strategy')->nullable();
            $table->string('bulding_scale')->nullable();
            $table->string('climate_zone')->nullable();
            $table->string('material')->nullable();
            $table->string('parameters')->nullable();
            $table->string('type_of_doc')->nullable();
            $table->string('mode_of_info')->nullable();
            $table->string('topic')->nullable();
            $table->string('world_region')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('project_file');
            $table->string('img_file')->nullable();
            $table->boolean('accessible');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('users');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
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
