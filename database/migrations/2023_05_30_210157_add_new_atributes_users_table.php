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
        //
        Schema::table('users', function (Blueprint $table) {
            $table->string('website')->nullable();
            $table->text('presentation')->nullable();
            $table->string('nick_name')->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('address', 255)->nullable();
            $table->text('description')->nullable();

            $table->boolean('status')->default(0);
            $table->boolean('is_paid')->default(false);

            $table->enum('group', ['admin', 'superusers', 'hombres', 'mujeres', 'externos'])->default('hombres');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('website');
            $table->dropColumn('presentation');
            $table->dropColumn('status')->default(0);
            $table->dropColumn('nick_name');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('description');
            $table->dropColumn('group');
            $table->dropColumn('is_paid');
        });
    }
};
