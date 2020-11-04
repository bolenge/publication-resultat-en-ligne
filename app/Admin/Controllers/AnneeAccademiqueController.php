<?php

namespace App\Admin\Controllers;

use App\Models\AnneeAccademique;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AnneeAccademiqueController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'AnneeAccademique';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new AnneeAccademique());

        $grid->column('id', __('Id'));
        $grid->column('libelle_annee', __('Libelle Année'));

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
        $show = new Show(AnneeAccademique::findOrFail($id));
    
        $show->field('id', __('Id'));
        $show->field('libelle_annee', __('Libelle année'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new AnneeAccademique());

        $form->text('libelle_annee', __('Libelle'));

        return $form;
    }

    public function all(Request $request)
    {
    $q = $request->get('q');

    return AnneeAccademique::where('libelle_annee', 'like', "%$q%")->paginate(null, ['id', 'libelle_annee']);
    }
}
