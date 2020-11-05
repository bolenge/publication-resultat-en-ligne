<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->string('volume');
            $table->string('id_promotion');
            $table->foreign('id_promotion')
                  ->references('id')
                  ->on(('promotions'))
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
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
        Schema::table('promo_etudiants', function(Blueprint $table) {
			$table->dropForeign('cours_id_promotion_foreign');
        });
        
        Schema::dropIfExists('cours');
    }
}
