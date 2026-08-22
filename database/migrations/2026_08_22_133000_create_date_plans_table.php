<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('date_plans', function (Blueprint $table) {
            $table->id();
            $table->string('planner_name')->nullable();
            $table->string('category_slug');
            $table->string('category_name');
            $table->string('place_slug');
            $table->string('place_name');
            $table->string('place_area');
            $table->date('planned_on');
            $table->time('planned_at');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('date_plans');
    }
};
