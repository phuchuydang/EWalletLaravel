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
        Schema::create('tbl_phone_card', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('card_type')->comment('Vina, Mobifone, Viettel, ...');
            $table->string('card_serial');
            $table->string('card_number');
            $table->string('card_denomination');
            $table->boolean('is_valid')->default(0);
            $table->date('created_date');
            $table->date('updated_date')->nullable();
            $table->date('deleted_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_phone_card');
    }
};
