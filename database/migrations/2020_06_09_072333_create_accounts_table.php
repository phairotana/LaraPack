<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->timestamp('last_sync_modify');
            $table->string('account_number',191)->nullable();
            $table->string('bank_branch',191)->nullable();
            $table->string('billing_address',191)->nullable();
            $table->date('valid_until',191)->nullable();
            $table->string('acc_name',191)->nullable();
            $table->string('acc_email',191)->nullable();
            $table->string('acc_phone',191)->nullable();
            $table->string('industry',191)->nullable();
            $table->string('rating',191)->nullable();
            $table->string('website',191)->nullable();
            $table->text('acc_description',255)->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
