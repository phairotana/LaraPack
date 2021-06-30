<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
			$table->unsignedBigInteger('property_id')->nullable();
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->string('unit_project_building',191)->nullable();
            $table->string('unit_project_name',191)->nullable();
            $table->string('unit_name',191)->nullable();
            $table->string('unit_current_use',191)->nullable();
            $table->double('unit_width',18,2)->nullable();
            $table->double('unit_length',18,2)->nullable();
            $table->double('unit_area',18,2)->nullable();
            $table->integer('completion_year')->nullable();
            $table->integer('useful_life')->nullable();
            $table->integer('effective_age')->nullable();
            $table->integer('cost_estimate')->nullable();
            $table->integer('unit_stories')->nullable();
            $table->integer('unit_bedroom')->nullable();
            $table->integer('unit_bathroom')->nullable();
            $table->integer('unit_livingroom')->nullable();
            $table->integer('unit_diningroom')->nullable();
            // $table->integer('unit_door')->nullable();
            $table->integer('unit_floor')->nullable();
            // $table->integer('unit_parking')->nullable();
            $table->integer('unit_car_parking')->nullable();
            $table->integer('unit_motor_parking')->nullable();
            $table->unsignedBigInteger('contact_id')->nullable();
            // $table->string('design_appeal_type',191)->nullable();
            // $table->string('quality_type',191)->nullable();
            // $table->string('roofing_type',191)->nullable();
            $table->string('created_by',191)->nullable();
            $table->string('updated_by',191)->nullable();
            $table->string('unit_code',191)->nullable();
            // $table->string('building_type',191)->nullable();
            $table->boolean('status',1)->nullable();
            $table->text('unit_gallery')->nullable();
            $table->string('unit_style',191)->nullable();
            $table->double('gross_floor_area',18,2)->nullable();
            $table->double('net_floor_area',18,2)->nullable();
            // $table->string('main_walls',191)->nullable();
            // $table->string('ceiling',191)->nullable();
            // $table->string('flooring_materials',191)->nullable();
            // $table->string('window_frames',191)->nullable();
            $table->boolean('balcony',1)->nullable();
            $table->boolean('kitchen',1)->nullable();
            $table->boolean('swimming_pool',1)->nullable();
            $table->boolean('security',1)->nullable();
            $table->boolean('fitness_gym',1)->nullable();
            $table->boolean('lift',1)->nullable();
            // $table->string('neighborhood',191)->nullable();
            // $table->string('other_facilities',191)->nullable();
            // $table->text('floor_plan')->nullable();
            // $table->double('rent_income_per_month_if_any',18,2)->nullable();
            // $table->double('price_per_sqm',18,2)->nullable();
            $table->timestamps();

            // $table->foreign('property_id')
            //     ->references('id')
            //     ->on('properties')
            //     ->onDelete('cascade');

            // $table->foreign('owner_id')
            //     ->references('id')
            //     ->on('contacts')
            //     ->onDelete('cascade');
            
            // $table->foreign('contact_id')
            //     ->references('id')
            //     ->on('contacts')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
