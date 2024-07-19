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
        Schema::create('matching_apps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('app_logo')->nullable();
            $table->string('main_images')->nullable();
            $table->text('description')->nullable();
            $table->string('company_name')->nullable();
            $table->integer('target_ratio')->nullable();
            $table->string('target')->nullable();
            $table->string('age')->nullable();
            $table->string('membership_view')->nullable();
            $table->string('membership')->nullable();
            $table->string('gender_ratio')->nullable();
            $table->string('requirements')->nullable();
            $table->string('feature')->nullable();
            $table->integer('rating_membership')->nullable();
            $table->integer('rating_trust')->nullable();
            $table->integer('rating_cost')->nullable();
            $table->integer('rating_dating')->nullable();
            $table->integer('rating_total')->nullable();
            $table->string('app_store_rating')->nullable();
            $table->string('app_store_review')->nullable();
            $table->text('content')->nullable();
            $table->string('url')->nullable();
            $table->string('affiliate_url')->nullable();
            $table->text('affiliate_code')->nullable();
            $table->integer('order')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matching_apps');
    }
};
