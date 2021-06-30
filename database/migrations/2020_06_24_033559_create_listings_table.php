<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id')->nullable();
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->unsignedBigInteger('contact_id')->nullable();
            $table->double('sale_list_price',18,2)->nullable();
            $table->double('rent_list_price',18,2)->nullable();
            $table->double('sale_commission',18,2)->nullable();
            $table->double('rental_commission',18,2)->nullable();
            $table->double('show_price_per_spm',18,2)->nullable();
            $table->boolean('show_on_map',1)->nullable();
            $table->boolean('display_on_first_page',1)->nullable();
            $table->boolean('status',1)->nullable();
            $table->boolean('show_agent_on_website',1)->nullable();
            $table->boolean('show_price_per_square_meter',1)->nullable();
            $table->boolean('is_sale',1)->nullable();
            $table->boolean('is_rent',1)->nullable();
            $table->boolean('is_close',1)->nullable();
            $table->date('excusive_date')->nullable();
            $table->date('exclusive_expires_date')->nullable();
            $table->string('exclusive_listing',191)->nullable();
            $table->string('close_reason',191)->nullable();
            $table->string('code',191)->nullable();
            $table->bigInteger('total_rates')->nullable();
            $table->bigInteger('total_user_rates')->nullable();
            $table->longText('additional_items')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->unsignedBigInteger('publsihed_by')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();            
            $table->timestamps();

            // $table->foreign('property_id')
            //     ->references('id')
            //     ->on('properties');

            // $table->foreign('owner_id')
            //     ->references('id')
            //     ->on('contacts');
            
            // $table->foreign('contact_id')
            //     ->references('id')
            //     ->on('contacts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listings');
    }
}
