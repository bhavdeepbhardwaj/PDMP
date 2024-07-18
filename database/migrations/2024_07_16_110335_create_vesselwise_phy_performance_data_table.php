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
        Schema::create('vesselwise_phy_performance_data', function (Blueprint $table) {
            $table->id();
            $table->text('vessel_item_id')->default(0);
            $table->text('month_select')->default(0);
            $table->text('year_select')->default(0);
            $table->text('state_board_id')->default(0);
            $table->text('port_id')->default(0);
            $table->text('dry_mech')->default(0);
            $table->text('dry_conv')->default(0);
            $table->text('liquid_bulk')->default(0);
            $table->text('break_bulk')->default(0);
            $table->text('container')->default(0);
            $table->text('all')->default(0);
            $table->text('status')->default(0);
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
        Schema::dropIfExists('vesselwise_phy_performance_data');
    }
};
