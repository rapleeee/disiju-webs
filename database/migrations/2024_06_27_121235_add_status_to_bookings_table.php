<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            if (!Schema::hasColumn('bookings', 'status')) {
                $table->string('status')->default('pending');
            }
            $table->string('bukti_transfer')->nullable();
            $table->string('status_bukti_transfer')->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('bukti_transfer');
            $table->dropColumn('status_bukti_transfer');
        });
    }
}
