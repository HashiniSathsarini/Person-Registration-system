<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('NIC')->unique();
            $table->string('fullname');

            $table->unsignedBigInteger('gender_id');
            $table->foreign('gender_id')
                  ->references('gender_id')->on('gender')
                  ->onDelete('cascade');

            $table->date('dob');
            $table->string('address');
            $table->string('contactnumber');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
