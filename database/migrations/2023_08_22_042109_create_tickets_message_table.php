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
        Schema::create('tickets_message', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->foreignId('user_id')->constrained(
                table: 'users', indexName: 'ticket_message_user_id'
            );
            $table->foreignId('ticket_id')->constrained(
                table: 'tickets', indexName: 'ticket_id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets_message');
    }
};
