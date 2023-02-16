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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->string('message',100);
            $table->enum('type',['Complaint','Suggestion']);
            $table->string('student_id',20);
            $table->string('name',45);
            $table->string('email',45)->unique();
            $table->enum('status',['Open','Close']);
            // $table->string('status',12)->nullable();
            $table->string('image',150)->nullable();
            $table->string('urgent',2);
            $table->timestamp('closed_date')->nullable();
            $table->string('response')->nullable();
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
        Schema::dropIfExists('complaints');
    }
};
