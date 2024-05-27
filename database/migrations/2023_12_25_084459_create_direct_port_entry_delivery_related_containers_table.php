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
        Schema::create('direct_port_entry_delivery_related_containers', function (Blueprint $table) {
            $table->id();
            $table->text('select_year')->default(0);
            $table->text('select_month')->default(0);
            $table->text('port_type')->default(0);
            $table->text('state_board')->default(0);
            $table->text('port_id')->default(0);
            $table->text('containers')->default(0);
            $table->text('direct_port_entry_of_teu')->default(0);
            $table->text('direct_port_delivery')->default(0);
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
        Schema::dropIfExists('direct_port_entry_delivery_related_containers');
    }
};
