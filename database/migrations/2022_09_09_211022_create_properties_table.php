<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('property_status_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('property_type_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('country_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('main_photo')->nullable();
            $table->integer('stars');
            $table->string('email');
            $table->string('phone_num');
            $table->string('address');
            $table->string('city');
            $table->integer('zip_code');
            $table->boolean('pets_allowed');
            $table->time('check-in');
            $table->time('check-out');
            $table->text('description');
            $table->text('rules');
            $table->text('cancellation_policy');
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
        Schema::dropIfExists('properties');
    }
};
