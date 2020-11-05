<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_etudiants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_etudiant')->unsigned();
            $table->bigInteger('id_promotion')->unsigned();
            $table->bigInteger('id_annee_accademique')->unsigned();
            $table->foreign('id_etudiant')
                  ->references('id')
                  ->on(('etudiants'))
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->foreign('id_promotion')
                  ->references('id')
                  ->on(('promotions'))
                  ->onDelete('restrict')
                  ->onUpdate('restrict');
            $table->foreign('id_annee_accademique')
                  ->references('id')
                  ->on(('annee_accademiques'))
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
			$table->dropForeign('promos_etudiants_id_etudiant_foreign');
			$table->dropForeign('promos_etudiants_id_promotion_foreign');
			$table->dropForeign('promos_etudiants_id_annee_accademique_foreign');
        });
        
        Schema::dropIfExists('promos_etudiants');
    }
}
