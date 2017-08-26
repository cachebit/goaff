<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membership_logs', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->string('membership');
            $table->timestamp('membership_started_at');
            $table->timestamp('membership_expired_at');
            $table->integer('membership_cost')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('membership_logs');
    }
}
