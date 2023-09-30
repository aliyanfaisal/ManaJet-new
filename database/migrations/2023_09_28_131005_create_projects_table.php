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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string("project_name", 150);
            
            $table->text("project_description")->nullable();

            $table->string("budget",20);

            $table->foreignId("project_category")->references("id")->on("project_categories")->onDelete("cascade")->nullable();

            $table->foreignId("team_id")->references("id")->on("teams")->onDelete("cascade")->nullable();

            $table->foreignId("profile_image_id")->references("id")->on("files")->onDelete("cascade")->nullable();

            $table->string("project_status",20)->nullable()->default("draft");
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
