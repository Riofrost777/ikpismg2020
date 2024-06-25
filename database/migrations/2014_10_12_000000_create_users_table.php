<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('work_phonenumber')->nullable();
            $table->string('work_address')->nullable();
            $table->string('home_phonenumber')->nullable();
            $table->string('home_address')->nullable();
            $table->string('no_ijin_praktek')->nullable();
            $table->date('birthdate')->nullable();
            $table->integer('year')->nullable();
            $table->string('NPWP')->nullable();
            $table->string('NRA')->unique()->nullable();
            $table->string('username')->unique()->nullable();
            $table->enum('brevet',['A','B','C'])->nullable();
            $table->enum('status',['TETAP', 'TERBATAS'])->default('TERBATAS');
            $table->string('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('position')->default('MEMBER');
            $table->string('avatar')->nullable();
            $table->rememberToken();
            $table->bigInteger('role_id')->unsigned()->default(0);
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
        Schema::dropIfExists('users');
    }
}
