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
        Schema::create('tbl_account', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true)->autoIncrement();
            $table->string('username', 50);
            $table->string('password');
            $table->string('email', 50)->unique();
            $table->string('phone', 50)->unique();
            $table->string('fullname', 50);
            $table->string('address', 255);
            $table->date('birthday');
            $table->string('first_identity_card');
            $table->string('second_identity_card');
            $table->boolean('is_actived')->default(0);
            $table->boolean('is_verified')->default(0);
            $table->boolean('is_abnormal')->default(0);
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
        Schema::dropIfExists('tbl_account');
    }
};
