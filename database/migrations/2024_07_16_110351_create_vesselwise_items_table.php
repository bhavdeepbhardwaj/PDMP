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
        Schema::create('vesselwise_items', function (Blueprint $table) {
            $table->id();
            $table->text('port_id')->default(0);
            $table->text('name')->default(0);
            $table->text('parent_id')->default(0);
            $table->text('data_entry_req')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->text('created_by')->default(0)->comment('Create User ID');
            $table->text('updated_by')->default(0)->comment('Admin ID');
            $table->tinyInteger('is_deleted')->default(0)->comment('Soft Deleted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vesselwise_items');
    }
};
