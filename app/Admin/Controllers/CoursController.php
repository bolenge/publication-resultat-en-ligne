<?php

namespace App\Admin\Controllers;

use App\Models\Cours;
use App\Models\Promotion;
use App\Models\Enseignant;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CoursController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Cours';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Cours());

        $grid->column('id', __('Id'));
        $grid->column('libelle', __('Libelle'));
        $grid->column('volume', __('Volume Horaire'));
        $grid->column('id_promotion', __('Promotion'))->display(function ($id_promotion) {
            return Promotion::find($id_promotion)->intitule;
        });
        $grid->column('id_enseignant', __('Enseignant'))->display(function ($id_enseignant) {
            return Enseignant::find($id_enseignant)->nom.' '.Enseignant::find($id_enseignant)->prenom;
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
        $show = new Show(Cours::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('libelle', __('Libelle'));
        $show->field('volume', __('Volume (Pondération)'));
        $show->field('id_promotion', __('Promotion'))->as(function($id_promotion) {
            return Promotion::find($id_promotion)->intitule;
        });
        $show->field('id_enseignant', __('Enseignant'))->as(function($id_enseignant) {
            return Enseignant::find($id_enseignant)->nom.' '.Enseignant::find($id_enseignant)->prenom;
        });

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Cours());
        $promotions = $enseignants = [];

        foreach (Promotion::all() as $promotion) {
            $promotions[$promotion->id] = $promotion->intitule;
        }

        foreach (Enseignant::all() as $enseignant) {
            $enseignants[$enseignant->id] = $enseignant->nom.' '.$enseignant->prenom;
        }

        $form->text('libelle', __('Libelle'));
        $form->text('volume', __('Volume'));
        $form->select('id_promotion', __('Promotion'))->options($promotions);
        $form->select('id_enseignant', __('Enseignant'))->options($enseignants);

        return $form;
    }
}
