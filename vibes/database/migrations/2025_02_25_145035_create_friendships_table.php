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
    Schema::create('friendships', function (Blueprint $table) {
        $table->id();
        $table->foreignId('sender_id')->constrained('users')->onDelete('cascade'); // Utilisateur qui envoie la demande
        $table->foreignId('receiver_id')->constrained('users')->onDelete('cascade'); // Utilisateur qui reçoit la demande
        $table->enum('status', ['pending', 'accepted', 'declined'])->default('pending'); // État de la demande
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
        Schema::dropIfExists('friendships');
    }
};
