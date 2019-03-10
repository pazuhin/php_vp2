<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;

require_once "config.php";

Capsule::schema()->dropIfExists('users');
Capsule::schema()->create('users', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name'); //varchar 255
    $table->integer('age')->default(18);
    $table->text('info')->nullable();
    $table->string('password'); //varchar 255
    $table->string('avatar'); //varchar 255
    $table->timestamps(); //created_at&updated_at тип datetime
});

Capsule::schema()->dropIfExists('photos');
Capsule::schema()->create('photos', function (Blueprint $table) {
    $table->increments('id');
    $table->integer('user_id')->unsigned();
    $table->string('image', 255);
    $table->timestamps(); //created_at&updated_at тип datetime
});

