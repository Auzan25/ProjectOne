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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('civility');
            $table->string('firstname');
            $table->string('lastname');
            $table->enum('sexe', ['masculin', 'feminin'])->nullable();
            $table->string('mobile_phone')->unique();
            $table->string('fixed_phone')->nullable();
            $table->string('email')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('birthplace')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();    // ville
            $table->string('magasin_reception')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_active')->nullable();
            $table->unsignedBigInteger('user_id');//->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
