<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('service_id');
            $table->string('req_no');
            $table->string('account_no');
            $table->string('status')->default('Pending');
            $table->integer('techinician_id')->nullable();
            $table->longtext('concern')->nullable();
            $table->string('date_assigned')->nullable();
            $table->string('date_accomp')->nullable();
            $table->string('causes_of_request')->nullable();
            $table->string('findings')->nullable();
            $table->string('action_taking')->nullable();
            $table->string('priority')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
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
        Schema::dropIfExists('service_requests');
    }
};
