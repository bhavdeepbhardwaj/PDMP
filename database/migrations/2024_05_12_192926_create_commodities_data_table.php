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
        Schema::create('commodities_data', function (Blueprint $table) {
            $table->id();
            $table->text('select_year')->default(0);
            $table->text('select_month')->default(0);
            $table->text('state_id')->default(0);
            $table->text('port_type')->default(0);
            $table->text('state_board')->default(0);
            $table->text('port_id')->default(0);
            $table->text('commodity_id')->default(0);
            $table->text('ov_ul_if')->default(0);
            $table->text('ov_ul_ff')->default(0);
            $table->text('ov_l_if')->default(0);
            $table->text('ov_l_ff')->default(0);
            $table->text('ov_total')->default(0);
            $table->text('co_ul_if')->default(0);
            $table->text('co_ul_ff')->default(0);
            $table->text('co_l_if')->default(0);
            $table->text('co_l_ff')->default(0);
            $table->text('co_total')->default(0);
            $table->text('grand_total')->default(0);
            $table->text('status')->default(0);
            $table->text('comm_remarks')->default(0);
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
        Schema::dropIfExists('commodities_data');
    }
};
