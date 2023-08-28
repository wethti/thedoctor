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
        Schema::create('subsections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignIdFor(Page::class)->nullable();
            $table->text('template')->nullable();
            $table->integer('position')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('section_id')->nullable();

            $table->index('section_id', 'subsection_section_idx');

            $table->foreign('section_id', 'subsection_section_fk')->on('sections')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subsections');
    }
};
