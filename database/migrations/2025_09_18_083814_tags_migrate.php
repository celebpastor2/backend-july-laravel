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
        //bugs
        Schema::create("tags", function(Blueprint $table){
            $table->id();//this will a clumn named id, primary key, makes it auto increment
            $table->string("name")->unique();
            $table->timestamps();//this two columns in your database names created_at and updated_at
        });

        Schema::create("product_tag", function(Blueprint $table){
            $table->id();
            $table->foreignId("product_id")->constrained()->onDelete("cascade");
            $table->foreignId("tag_id")->constrained()->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //rolling back
        Schema::dropIfExists("tags");
        Schema::dropIfExists("product_tag");
    }
};
