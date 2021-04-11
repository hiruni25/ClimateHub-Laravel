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
            $table->integer('version_id');
            //$table->unique(["id", "version_id"]);
            $table->string('category')->nullable();
            $table->string('project_title')->nullable();
            $table->string('energy_strategy')->nullable();
            $table->string('bulding_scale')->nullable();
            $table->string('climate_zone')->nullable();
            $table->string('material')->nullable();
            $table->string('parameters')->nullable();
            $table->string('type_of_doc')->nullable();
            $table->string('mode_of_info')->nullable();
            $table->string('world_region')->nullable();
            $table->string('topic')->nullable();
            $table->boolean('accessible')->nullable();
            $table->string('project_file')->nullable();
            $table->string('img_file')->nullable();
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
