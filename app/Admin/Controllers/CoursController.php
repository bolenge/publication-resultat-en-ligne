<?php

namespace App\Admin\Controllers;

use App\Models\Cours;
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
        $grid->column('volume', __('Volume (Pondération)'));

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

        $form->text('libelle', __('Libelle'));
        $form->text('volume', __('Volume'));

        return $form;
    }
}
