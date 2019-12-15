<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenyesuaianuserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar');
            $table->string('lulusan')->nullable();
            $table->string('alamat');
            $table->string('nomorHP');
            $table->enum('bank', ['BRI', 'BNI', 'Mandiri', 'BCA', 'Bank Jatim']);
            $table->string('nomorRekening');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar');
            $table->dropColumn('lulusan')->nullable();
            $table->dropColumn('alamat');
            $table->dropColumn('nomorHP');
            $table->dropColumn('bank');
            $table->dropColumn('nomorRekening');
        });
    }
}
