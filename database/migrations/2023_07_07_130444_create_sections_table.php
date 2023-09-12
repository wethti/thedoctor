<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Page;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignIdFor(Page::class)->nullable();
            $table->integer('position')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->unsignedBigInteger('menutab_id')->nullable();

            $table->index('menutab_id', 'section_menutab_idx');

            $table->foreign('menutab_id', 'section_menutab_fk')->on('menutabs')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
