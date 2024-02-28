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
        Schema::create('packages', function (Blueprint $table) {
            $table->id(); // Package ID: A unique identifier for each package
            $table->foreignId('category_id');
            $table->string('title'); // Package Name: A descriptive name for the package
            $table->string('image'); //Package featured photograph
            $table->text('description'); // Description: A detailed description of the package, including the destinations, activities, and highlights
            $table->integer('size'); // Maximum Group Size: The maximum number of participants allowed in the package
            $table->integer('days'); // Duration:  Start date)
            $table->integer('nights'); // Duration: End date)
            $table->decimal('regular_price', 10, 2); // Regular Price: The cost of the package per person
            $table->decimal('sales_price', 10, 2)->nullable();
            $table->decimal('discount', 10, 2)->nullable();
            $table->string('region');
            $table->string('destination'); //Location: The location where the package ends
            $table->date('date');
            $table->string('keyword')->nullable();
            $table->string('is_popular')->nullable();
            $table->string('status')->default('active'); // Booking Status: The current status of the package, such as available, booked, or sold out
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
