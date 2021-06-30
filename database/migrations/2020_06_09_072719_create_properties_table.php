<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->unsignedBigInteger('contact_id')->nullable();
            $table->unsignedBigInteger('listing_id')->nullable();
            $table->string('project_building',191)->nullable();
            $table->text('name',255)->nullable();
            $table->double('sale_price_asking',18,2)->nullable();
            $table->double('sale_asking_price_per_sqm',18,2)->nullable();
            $table->timestamp('sale_price_asking_date')->nullable();
            $table->string('sale_price_asking_date_by',191)->nullable();
            $table->double('sale_price',18,2)->nullable();
            $table->double('sale_price_per_sqm',18,2)->nullable();
            $table->timestamp('sale_price_date')->nullable();
            $table->string('sale_price_updated_by',191)->nullable();
            $table->double('sale_list_price',18,2)->nullable();
            $table->double('sale_listing_price_per_sqm',18,2)->nullable();
            $table->timestamp('sale_list_price_date')->nullable();
            $table->string('sale_list_price_updated_by',191)->nullable();
            $table->double('sold_price',18,2)->nullable();
            $table->double('sold_price_per_sqm',18,2)->nullable();
            $table->timestamp('sold_price_date')->nullable();
            $table->string('sold_price_updated_by',191)->nullable();
            $table->double('rent_price_asking',18,2)->nullable();
            $table->timestamp('rent_price_asking_date')->nullable();
            $table->double('rent_asking_price_per_sqm',18,2)->nullable();
            $table->string('rent_price_asking_updated_by',191)->nullable();
            $table->double('rent_price',18,2)->nullable();
            $table->double('rent_price_per_sqm',18,2)->nullable();
            $table->timestamp('rent_price_date')->nullable();
            $table->string('rent_price_updated_by',191)->nullable();
            $table->double('rent_list_price',18,2)->nullable();
            $table->double('rent_listing_price_per_sqm',18,2)->nullable();
            $table->timestamp('rent_list_date')->nullable();
            $table->string('rent_list_price_updated_by',191)->nullable();
            $table->double('rented_price',18,2)->nullable();
            $table->double('rented_price_per_sqm',18,2)->nullable();
            $table->timestamp('rented_price_date')->nullable();
            $table->string('rented_price_update_by',191)->nullable();
            $table->double('sale_commission',18,2)->nullable();
            $table->double('rental_commission',18,2)->nullable();
            $table->string('street_no',191)->nullable();
            $table->string('house_no',191)->nullable();
            $table->string('province',191)->nullable();
            $table->string('district',191)->nullable();
            $table->string('commune',191)->nullable();
            $table->string('village',191)->nullable();
            $table->string('address',191)->nullable();
            $table->string('zip_postalcode',191)->nullable();
            $table->string('latitude',191)->nullable();
            $table->string('longitude',191)->nullable();
            $table->date('published_at')->nullable();
            $table->string('published_by',191)->nullable();
            $table->integer('unit_total_bathroom')->nullable();
            $table->integer('unit_total_bedroom')->nullable();
            $table->integer('unit_total_livingroom')->nullable();
            $table->integer('unit_total_floor')->nullable();
            $table->integer('unit_total_parking')->nullable();
            $table->integer('unit_total_car_parking')->nullable();
            $table->integer('unit_total_motor_parking')->nullable();
            $table->integer('unit_total_diningroom')->nullable();
            $table->integer('unit_total_doors')->nullable();
            $table->double('land_width',18,2)->nullable();
            $table->double('land_length',18,2)->nullable();
            $table->double('land_area',18,2)->nullable();
            $table->double('land_area_by_title_deed',18,2)->nullable();
            $table->string('title_deed_no',191)->nullable();
            $table->string('issued_year',191)->nullable();
            $table->string('parcel_no',191)->nullable();
            $table->text('title_deed_photos')->nullable();
            $table->longText('description')->nullable();
            $table->text('note')->nullable();
            $table->string('location_grade',191)->nullable();
            $table->string('title_deed_type',191)->nullable();
            $table->string('record_type',191)->nullable();
            $table->string('data_source',191)->nullable();
            $table->string('zone_type',191)->nullable();
            $table->string('land_shape_type',191)->nullable();
            $table->string('view',191)->nullable();
            $table->string('tenure_type',191)->nullable();
            $table->string('label_type',191)->nullable();
            $table->string('type',191)->nullable();
            $table->double('building_width',18,2)->nullable();
            $table->double('building_length',18,2)->nullable();
            $table->double('building_height',18,2)->nullable();
            $table->double('building_area',18,2)->nullable();
            $table->longText('photo_front_side')->nullable();
            $table->longText('photo_left_side')->nullable();
            $table->longText('photo_right_side')->nullable();
            $table->longText('photo_back_side')->nullable();
            $table->longText('photo_opposite')->nullable();
            $table->text('images')->nullable();
            $table->integer('stories')->nullable();
            $table->boolean('is_rent')->nullable();
            $table->boolean('is_sale')->nullable();
            $table->boolean('transaction_type')->nullable();
            $table->string('shape',191)->nullable();
            $table->string('current_use',191)->nullable();
            $table->string('topography',191)->nullable();
            $table->string('functional_utilities',191)->nullable();
            $table->string('main_street',191)->nullable();
            $table->double('price_per_sqm',18,2)->nullable();
            $table->string('agreement_type',191)->nullable();
            $table->date('agreement_sign_date')->nullable();
            $table->date('agreement_expired_date')->nullable();
            $table->string('agreement_file',191)->nullable();
            $table->string('property_code',191)->nullable();
            $table->string('code')->nullable();
            $table->string('created_by',191)->nullable();
            $table->string('updated_by',191)->nullable();
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('contact_id')
            //     ->references('id')
            //     ->on('contacts');

            // $table->foreign('owner_id')
            //     ->references('id')
            //     ->on('contacts');

            // $table->foreign('listing_id')
            //     ->references('id')
            //     ->on('listings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
