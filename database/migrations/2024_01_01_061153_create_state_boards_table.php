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
        Schema::create('state_boards', function (Blueprint $table) {
            $table->id();
            $table->text('state_id')->default(0);
            $table->text('name')->default(0);
            $table->text('created_by')->default(0)->comment('Users ID');
            $table->text('updated_by')->default(0)->comment('Admin ID');
            // $table->text('modify_id')->default(0)->comment('User ID');
            $table->tinyInteger('is_deleted')->default(0)->comment('Soft Deleted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('state_boards');
    }
};
