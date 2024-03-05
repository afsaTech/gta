<?php

use App\Traits\CommonMigrationColumns;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use CommonMigrationColumns;

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        // Create categories table
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();

            $this->reservedColumns($table);
            $this->auditInfoColumns($table);
            $table->timestamps();
            $table->softDeletes();
            $this->auditInfoColumnsForeignKeys($table);
        });

        // Create packages table
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->longText('description');
            $table->integer('size');
            $table->integer('days');
            $table->integer('nights');
            $table->decimal('regular_price', 10, 2);
            $table->decimal('sales_price', 10, 2)->nullable();
            $table->integer('discount')->nullable();
            $table->string('region');
            $table->string('destination');
            $table->date('date');
            $table->string('keyword')->nullable();
            $table->enum('is_popular', ['yes', 'no'])->default('no');
            $table->enum('status', ['available', 'booked', 'sold out'])->default('available');
            $table->boolean('is_published')->default(false);
            
            $this->reservedColumns($table);
            $this->auditInfoColumns($table);
            $table->timestamps();
            $table->softDeletes();
            $this->auditInfoColumnsForeignKeys($table);
        });

        // Create package_images table
        Schema::create('package_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained()->onDelete('cascade');
            $table->string('url');

            $this->reservedColumns($table);
            $this->auditInfoColumns($table);
            $table->timestamps();
            $table->softDeletes();
            $this->auditInfoColumnsForeignKeys($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        // Drop tables in reverse order
        Schema::dropIfExists('package_images');
        Schema::dropIfExists('packages');
        Schema::dropIfExists('categories');
    }
};
