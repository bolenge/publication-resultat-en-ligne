<?php

namespace App\Admin\Controllers;

use App\Models\Enseignant;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class EnseignantController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Enseignant';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Enseignant());

        $grid->column('id', __('Id'));
        $grid->column('matricule', __('Matricule'));
        $grid->column('nom', __('Nom'));
        $grid->column('postnom', __('Postnom'));
        $grid->column('prenom', __('Prenom'));
        $grid->column('sexe', __('Sexe'));
        $grid->column('grade', __('Grade'));
        $grid->column('fonction', __('Fonction'));

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
        $show = new Show(Enseignant::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('matricule', __('Matricule'));
        $show->field('nom', __('Nom'));
        $show->field('postnom', __('Postnom'));
        $show->field('prenom', __('Prenom'));
        $show->field('sexe', __('Sexe'));
        $show->field('grade', __('Grade'));
        $show->field('fonction', __('Fonction'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Enseignant());

        $form->text('matricule', __('Matricule'));
        $form->text('nom', __('Nom'));
        $form->text('postnom', __('Postnom'));
        $form->text('prenom', __('Prenom'));
        $form->text('sexe', __('Sexe'));
        $form->text('grade', __('Grade'));
        $form->text('fonction', __('Fonction'));

        return $form;
    }
}
