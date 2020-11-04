<?php

namespace App\Admin\Controllers;

use App\Models\Etudiant;
use App\Models\Promotion;
use App\Models\AnneeAccademique;
use App\Models\PromoEtudiant;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use App\Utils\DBO;

class PromoEtudiantController extends AdminController
{
    use DBO;

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'PromoEtudiant';

    // public function index(Content $content)
    // {
    //     // dd("Bonjour");
    //     return $content
    //         ->title($this->title())
    //         ->description($this->description['index'] ?? trans('admin.list'));
    //         // ->body();
    // }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $q = $this->db->prepare('SELECT E.nom, E.prenom, A.libelle_annee AS anne_acad, P.intitule AS promotion, PE.id
                                 FROM etudiants AS E, annee_accademiques AS A, promotions AS P, promos_etudiants AS PE
                                 WHERE PE.id_etudiant = E.id
                                   AND PE.id_promotion = P.id
                                   AND PE.id_annee_accademique = A.id');
        $q->execute([

        ]);
        $list = $q->fetchAll();
        // $etudiant =  new Etudiant();


        $grid = new Grid(new PromoEtudiant());
        $grid->column('id', __('Id'));
        $grid->column('id_etudiant', 'Etudiant')->display(function ($id_etudiant) {
            return Etudiant::findOrFail($id_etudiant)->nom.' '.Etudiant::findOrFail($id_etudiant)->prenom;
        });

        $grid->column('id_promotion', 'Promotion')->display(function ($id_promotion) {
            return Promotion::findOrFail($id_promotion)->intitule;
        });

        $grid->column('id_annee_accademique', 'Année academique')->display(function ($id_annee_accademique) {
            return AnneeAccademique::findOrFail($id_annee_accademique)->libelle_annee;
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(PromoEtudiant::findOrFail($id));



        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new PromoEtudiant());
        $etudiants = $promotions = $annees = [];

        foreach (Etudiant::all('id', 'nom', 'prenom') as $etudiant) {
            $etudiants[$etudiant->id] = $etudiant->nom.' '.$etudiant->prenom;
        }

        foreach (Promotion::all() as $promotion) {
            $promotions[$promotion->id] = $promotion->intitule;
        }

        foreach (AnneeAccademique::all() as $annee) {
            $annees[$annee->id] = $annee->libelle_annee;
        }
        
        $form->select('id_etudiant', 'Etudiant')->options($etudiants);
        $form->select('id_promotion', 'Promotion')->options($promotions);
        $form->select('id_annee_accademique', 'Année academique')->options($annees);

        return $form;
    }
}
