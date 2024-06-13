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
        Schema::table('history', function (Blueprint $table) {
            $table->string('email');
            $table->string('phone');
            $table->string('name');
            $table->string('id_user'); // Thay đổi kiểu dữ liệu nếu cần

            $table->string('price'); // Thay đổi kiểu dữ liệu nếu cần
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('history', function (Blueprint $table) {
            $table->dropColumn(['email', 'phone', 'name', 'id_user', 'price']);
        });
    }
};
