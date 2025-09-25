<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * boolean
     * tinyInteger
     * dateTime
     * date
     */
    public function up(): void
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->text("description");
            $table->boolean("is_verified")->default(0);
            $table->tinyInteger("shop_rank")->default(0);
            $table->decimal("balance", 12, 2)->default(0.00);
            $table->enum("status", ["live", "pending", "rejected"])->default("pending");                         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
