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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->foreignId("breed_id")->constrained("breeds")->cascadeOnDelete();
            $table->foreignId("age_id")->constrained("ages")->cascadeOnDelete();
            $table->integer("live_weight");
            $table->integer("maintenance_fee")->nullable()->default(0);
            $table->boolean("gender")->default(0); // 0 Male, 1 Female
            $table->boolean("availability")->default(0);
            $table->string("slug");
            $table->float("price");
            $table->float("displayed_price")->nullable();
            $table->string("cow_id")->default("000-000-000");
            $table->string("front_image")->nullable();
            $table->string("back_image")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
