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
        Schema::create('employment_major_ports', function (Blueprint $table) {
            $table->id();
            $table->text('select_year')->default(0);
            $table->text('select_month')->default(0);
            $table->text('port_type')->default(0);
            $table->text('state_board')->default(0);
            $table->text('port_id')->default(0);
            $table->text('class_1')->default('0');
            $table->text('class_2')->default('0');
            $table->text('class_3')->default('0');
            $table->text('class_4')->default('0');
            $table->text('class_5')->default('0');
            $table->text('class_6')->default('0');
            $table->text('class_7')->default('0');
            $table->text('shore_wrk')->default('0');
            $table->text('casual_work')->default('0');
            $table->text('total')->default('0');
            $table->text('status')->default(0);
            $table->text('created_by')->default(0)->comment('Users ID');
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
        Schema::dropIfExists('employment_major_ports');
    }
};
