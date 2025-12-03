<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dogs', function (Blueprint $table) {
            $table->id();

            $table->string('name');              
            $table->string('breed');             
            $table->integer('age')->nullable();  
            $table->integer('weight')->nullable(); 
            $table->text('personality')->nullable(); 
            $table->string('favorite_food')->nullable();
            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dogs');
    }
};
