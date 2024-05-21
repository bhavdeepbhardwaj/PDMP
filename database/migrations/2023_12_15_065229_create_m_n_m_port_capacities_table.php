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
        Schema::create('m_n_m_port_capacities', function (Blueprint $table) {
            $table->id();
            $table->text('select_year')->default(0);
            $table->text('select_month')->default(0);
            $table->text('port_type')->default(0);
            $table->text('state_board')->default(0);
            $table->text('port_name')->default(0);
            $table->text('operational')->default(0);
            $table->text('capacity')->default(0);
            $table->text('status')->default(0);
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
        Schema::dropIfExists('m_n_m_port_capacities');
    }
};
