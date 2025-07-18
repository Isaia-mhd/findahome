<?php

use App\Models\User;
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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId("owner_id")->constrained("users", "id")->cascadeOnDelete();
            $table->string("name");
            $table->text("description");
            $table->string("type")->default("sale");
            $table->boolean("offered")->default(false);
            $table->unsignedDecimal("offeredPrice", 10, 2)->nullable();
            $table->unsignedDecimal("regularPrice", 10,2);
            $table->string("status")->default("published");
            $table->unsignedTinyInteger("bedrooms")->default(0);
            $table->unsignedTinyInteger("bathrooms")->default(0);
            $table->boolean("parking")->default(false);
            $table->boolean("furnished")->default(false);
            $table->text("address");
            $table->decimal("longitude", 10, 7)->default(0)->nullable();
            $table->decimal("latitude", 10, 7)->default(0)->nullable();
            $table->json("images");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listings');
    }
};
