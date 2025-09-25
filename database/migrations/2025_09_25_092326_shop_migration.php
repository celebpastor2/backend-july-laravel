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
        //
        Schema::table("categories", function(Blueprint $table){
            $table->foreignId("product_id")->constrained()->onDelete("cascade");#users id
            $table->string("name")->unique();
            $table->string("image");
            $table->index("name");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
         Schema::table("categories", function(Blueprint $table){
            $table->dropColumn("product_id");
            $table->dropColumn("name");
            $table->dropColumn("image");
        });
    }
};
