<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->string('type');
            $table->string('method');
            $table->boolean('verified')->default(false);
            $table->foreignId('user_id')->constrained();
            $table->string('receipt')->nullable();
            $table->string('reference')->nullable();
            $table->string('transaction_id')->nullable();
            $table->json('transaction_data')->nullable();
            $table->string('status')->nullable();
            $table->foreignId('user_course_id')->constrained();
            $table->dateTime('date');
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
        Schema::dropIfExists('payments');
    }
}
