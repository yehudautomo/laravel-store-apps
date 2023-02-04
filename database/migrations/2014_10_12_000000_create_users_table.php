<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('role_id')->unsigned();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('gender');
            $table->string('address');
            $table->string('id_card_image');

            $table->rememberToken();
            $table->timestamps();

        });

        Schema::table('users', function($table) {
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });


        DB::table('users')->insert(
            [
                [
                    'name' => 'Super Admin',
                    'role_id' => 1,
                    'email' => 'yehuda@example.com',
                    'password' => 'test1234',
                ]
            ]
        );

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
};
