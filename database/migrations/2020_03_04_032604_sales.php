<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->string('address');
            $table->string('name');
            $table->string('spouse_name')->nullable();
            $table->date('birthday')->nullable();
            $table->string('telephone')->nullable();
            $table->string('celphone')->nullable();
            $table->string('email');
            $table->string('insurance')->nullable();
            $table->string('policy_number')->nullable();
            $table->date('loss_date')->nullable();
            $table->string('loss_type');
            $table->string('languaje')->default('English');
            $table->boolean('mortage')->default(false);
            $table->string('mortage_name')->nullable();
            $table->integer('floors')->default(1);
            $table->boolean('separated_structures')->default(false);
            $table->boolean('interior_damage')->default(false);
            $table->string('interior_damage_detail')->nullable();
            $table->boolean('previous_claim')->default(false);
            $table->string('previous_claim_status')->nullable();
            $table->string('previous_claim_date')->nullable();
            $table->string('claim_number')->nullable();
            $table->string('adjuster')->nullable();
            $table->text('aditional')->nullable();
            $table->longText('images')->nullable();
            $table->longText('coords')->nullable();
            $table->string('status')->default('waiting');
            $table->string('agreement');
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
        Schema::dropIfExists('sales');
    }
}
