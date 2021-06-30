<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id')->nullable();
            $table->timestamp('last_sync_modify');
            $table->string('con_type',191)->nullable();
            $table->string('last_name',191)->nullable();
            $table->string('first_name',191)->nullable();
            $table->string('con_email',191)->nullable();
            $table->string('con_phone',191)->nullable();
            $table->string('con_street_no',191)->nullable();
            $table->string('con_house_no',191)->nullable();
            $table->string('province',191)->nullable();
            $table->string('district',191)->nullable();
            $table->string('commune',191)->nullable();
            $table->string('village',191)->nullable();
            $table->string('con_address',191)->nullable();
            $table->string('con_zip_postalcode',191)->nullable();
            $table->string('con_latitude',191)->nullable();
            $table->string('con_longitude',191)->nullable();
            $table->unsignedBigInteger('con_created_by')->nullable();
            $table->unsignedBigInteger('con_updated_by')->nullable();
            $table->string('identify_card',191)->nullable();
            $table->longText('profile')->nullable();
            $table->string('salutation',191)->nullable();
            $table->string('occupation',191)->nullable();
            $table->timestamps();
            
            // $table->foreign('account_id')
            // ->references('id')
            // ->on('accounts')
            // ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
