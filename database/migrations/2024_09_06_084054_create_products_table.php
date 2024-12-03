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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->decimal('price', 8, 2);
            $table->decimal('total', 8, 2);
            $table->integer('quantity')->unsigned();
            $table->enum('status',['accepted','not_accepted'])->default('not_accepted');
            $table->foreignId('vendor_id')->constrained('vendors');
            $table->foreignId('color_id')->constrained('colors');
            $table->foreignId('tag_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('size_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
