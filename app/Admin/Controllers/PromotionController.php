<?php

namespace App\Admin\Controllers;

use App\Models\Promotion;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PromotionController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Promotion';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Promotion());

        $grid->column('id', __('Id'));
        $grid->column('intitule', __('Intitule'));
        $grid->column('description', __('Description'));

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
        $show = new Show(Promotion::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('intitule', __('Intitule'));
        $show->field('description', __('Description'));
        $show->field('id_section', __('Id section'));
        $show->field('created_at', __('Date créée'));
        $show->field('updated_at', __('Date modifiée'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Promotion());

        $form->text('intitule', __('Intitule'));
        $form->text('description', __('Description'));

        return $form;
    }

    public function all(Request $request)
    {
        // $q = $request->get('q');

        return Promotion::find();
    }
}
