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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('sector');
            $table->string('subject');
            $table->string('cep');
            $table->string('street');
            $table->integer('number');
            $table->string('complement');
            $table->string('neighborhood');
            $table->foreignId('city_id')->constrained(
                table: 'cities', indexName: 'ticket_city_id'
            );
            $table->string('situation');
            $table->foreignId('user_id')->constrained(
                table: 'users', indexName: 'ticket_user_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
