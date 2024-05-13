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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default(0);
            $table->text('state_id')->default(0);
            $table->text('port_type')->default(0);
            $table->text('state_board')->default(0);
            $table->text('port_id')->default(0);
            $table->text('report_to')->default(0);
            $table->text('extra_module')->default(0);
            $table->string('email')->unique();
            $table->string('username')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            /* Users: 1=>SuperAdmin, 2=>Admin, 3=>Manager */
            $table->tinyInteger('role_id')->default(4);
            $table->string('dep_id')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->text('created_by')->default(0)->comment('Create User ID');
            $table->text('updated_by')->default(0)->comment('Admin ID');
            $table->tinyInteger('is_deleted')->default(0)->comment('Soft Deleted');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
