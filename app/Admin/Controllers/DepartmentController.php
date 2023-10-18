<?php

namespace App\Admin\Controllers;

use App\models\Department;
use App\Models\Employee;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class DepartmentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Department';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Department());

        $grid->column('id', __('ID'));
        $grid->column('created_at', __('Created at'))->hide();
        $grid->column('updated_at', __('Updated at'))->hide();
        $grid->column('title', __('Title'));
        $grid->column('head', __('Department Head'));
/*         $grid->column('employee_id', __('Employee'));
 */        $grid->column('details', __('Details'));

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
        $show = new Show(Department::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('title', __('Title'));
        $show->field('head', __('Head'));
        
/*         $show->field('employee_id', __('Employee id'));
 */        $show->field('details', __('Details'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Department());

        $form->text('title', __('Title'));
        $form->select('head', __('Head of Department'))->options(Employee::all()->pluck('name', 'id'));
/*         $form->select('employee_id',__('Employee'))->options(Employee::all()->pluck('name' , 'id'));
 */        $form->textarea('details', __('Details'));

        return $form;
    }
}
/* $form->multipleSelect('tags')->options(Tag::all()->pluck('name', 'id'));

$form->select('employee_id', __('Employee'));
 */