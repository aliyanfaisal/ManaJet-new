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
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->string("chat_name", 50)->nullable();
            $table->boolean("isGroup");

            $table->foreignId("sender_id")->references("id")->on("users")->onDelete("cascade")->nullable();
            $table->foreignId("receiver_id")->references("id")->on("users")->onDelete("cascade")->nullable();
            $table->foreignId("team_id")->references("id")->on("teams")->onDelete("cascade")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
