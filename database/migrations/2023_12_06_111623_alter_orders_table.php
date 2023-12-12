<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->enum('payment_status', ['paid', 'unpaid'])->default('unpaid')->constrained()
                ->onDelete('cascade')->after('grand_total');
            $table->enum('status', ['pending', 'shipped', 'delivered', 'cancelled'])->default('pending')->
                constrained()->onDelete('cascade')->after('payment_status');
                $table->timestamp('shipped_date')->nullable()->constrained()->onDelete('cascade')->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('payment_status');
            $table->dropColumn('status');
            $table->dropColumn('shipped_date');
        });
    }
};
