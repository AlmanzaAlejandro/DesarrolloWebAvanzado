<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('stripe_id')->nullable();
            $table->string('stripe_subscription')->nullable();
            $table->text('stripe_plan')->nullable();
            $table->timestamp('trial_ends_at')->nullable();
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('price');
        });
    }

};
