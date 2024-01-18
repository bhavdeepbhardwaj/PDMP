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
        Schema::create('icon_with_panels', function (Blueprint $table) {
            $table->id();
            $table->integer('parent_id')->default(0);
            $table->text('module')->default(0);
            $table->text('module_name')->default(0);
            $table->text('mod_list_name')->default(0);
            $table->text('icon')->default(0);
            $table->text('url')->default(0);
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
        Schema::dropIfExists('icon_with_panels');
    }
};
