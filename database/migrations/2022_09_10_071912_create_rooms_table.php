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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('room_status_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('room_type_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('room_view_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('number_of_rooms');
            $table->integer('number_of_persons');
            $table->integer('size');
            $table->float('price');
            $table->integer('large_beds')->nullable();
            $table->integer('double_beds')->nullable();
            $table->integer('single_beds')->nullable();
            $table->integer('sofa_beds')->nullable();
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
        Schema::dropIfExists('rooms');
    }
};
