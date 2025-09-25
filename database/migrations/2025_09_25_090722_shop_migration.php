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
        Schema::table("shops", function(Blueprint $table){
            $table->foreignId("user_id")->constrained()->onDelete("cascade");#users id
            $table->string("shop_name")->unique();
            $table->string("shop_image")->default("https://cdn.shopify.com/s/files/1/0533/2089/files/placeholder-images.jpg?v=1603109892");
            $table->index("shop_name");
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table("shops", function(Blueprint $table){
            $table->dropColumn("user_id");
            $table->dropColumn("shop_image");
            $table->dropColumn("shop_name");
        });
    }
};
