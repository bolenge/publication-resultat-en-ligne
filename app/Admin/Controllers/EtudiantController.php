<?php

namespace App\Admin\Controllers;

use App\Models\Etudiant;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class EtudiantController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Etudiant';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Etudiant());

        $grid->column('id', __('Id'));
        $grid->column('matricule', __('Matricule'));
        $grid->column('nom', __('Nom'));
        $grid->column('postnom', __('Postnom'));
        $grid->column('prenom', __('Prenom'));
        $grid->column('sexe', __('Sexe'));
        $grid->column('date_naissance', __('Date naissance'));
        $grid->column('lieu_naissance', __('Lieu naissance'));
        $grid->column('telephone', __('Telephone'));
        $grid->column('email', __('Email'));
        $grid->column('etat_civil', __('Etat civil'));
        $grid->column('adresse', __('Adresse'));
        $grid->column('profession', __('Profession'));
        $grid->column('created_at', __('Date enregistré'));

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
        $show = new Show(Etudiant::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('matricule', __('Matricule'));
        $show->field('nom', __('Nom'));
        $show->field('postnom', __('Postnom'));
        $show->field('prenom', __('Prenom'));
        $show->field('sexe', __('Sexe'));
        $show->field('date_naissance', __('Date naissance'));
        $show->field('lieu_naissance', __('Lieu naissance'));
        $show->field('telephone', __('Telephone'));
        $show->field('email', __('Email'));
        $show->field('etat_civil', __('Etat civil'));
        $show->field('adresse', __('Adresse'));
        $show->field('profession', __('Profession'));
        $show->field('created_at', __('Date enregistré'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Etudiant());

        $form->text('matricule', __('Matricule'));
        $form->text('nom', __('Nom'));
        $form->text('postnom', __('Postnom'));
        $form->text('prenom', __('Prenom'));
        $form->text('sexe', __('Sexe'));
        $form->text('date_naissance', __('Date naissance'));
        $form->text('lieu_naissance', __('Lieu naissance'));
        $form->text('telephone', __('Telephone'));
        $form->email('email', __('Email'));
        $form->text('etat_civil', __('Etat civil'));
        $form->text('adresse', __('Adresse'));
        $form->text('profession', __('Profession'));
        $form->text('password', __('Mot de passe'));

        return $form;
    }
}
