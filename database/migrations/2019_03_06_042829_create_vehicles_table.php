<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('version')->nullable();
            $table->string('plat_number')->nullable();
            $table->date('registration_date')->nullable();
            $table->string('engine_number')->nullable();
            $table->string('color')->nullable();
            $table->string("vehicle_type")->nullable();
            $table->bigInteger('location_id')->unsigned();
            $table->foreign('location_id')
                  ->references('id')
                  ->on('locations')
                  ->onDelete('cascade');
            $table->string('department')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->text('description')->nullable();
            $table->boolean('active')->default(True);
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
        Schema::dropIfExists('vehicles');
    }
}
