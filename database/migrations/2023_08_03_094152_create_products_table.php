<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Menutab;
use App\Models\Section;
use App\Models\Subsection;

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
            $table->string('description',4096)->nullable();
            $table->string('properties',4096)->nullable();
            $table->decimal('priceUSD',8,2)->nullable();
            $table->decimal('discountedPriceUSD',8,2)->nullable();
            $table->integer('available')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
