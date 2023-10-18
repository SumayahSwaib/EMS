<?php

namespace App\Admin\Controllers;

use App\Models\Employee;
use App\models\Task;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TaskController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Task';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Task());

        $grid->column('id', __('ID'));
        $grid->column('created_at', __('Created at'))->hide();
        $grid->column('updated_at', __('Updated at'))->hide();
        $grid->column('Title', __('Title'));
/*         $grid->column('employee_id', __('Employee'));
 */        $grid->column('employee_id', __('Employee '))
        ->display(function($employee){
        return Employee::find($employee)->name;
    });


        $grid->column('status', __('Status'))

        ->editable('select',
        [
            'Done'=>'Done',
            'Pending'=>'Pending',
            'Cancelled'=>'cancelled',
            'Ongoing'=>'ongoing'
            ])
        ->dot([
            'Done'=>'success',
            'Pending'=>'primary',
            'Cancelled'=>'danger',
            'Ongoing'=>'warning'

        ])->sortable();
        
        $grid->column('due_date', __('Due date'));
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
        $show = new Show(Task::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('Title', __('Title'));
        $show->field('employee_id', __('Employee id'));
        $show->field('status', __('Status'));
        $show->field('due_date', __('Due date'));
        $show->field('description', __('Description'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Task());

        $form->text('Title', __('Title'));
        $form->select('employee_id', __('Employee in  Charge '))->options(Employee::all()->pluck('name' , 'id'));
        $form->radioCard('status', __('Status'))
        ->options
        ([
            'Done'=>'Done',
            'Pending'=>'Pending',
            'Cancelled'=>'cancelled',
            'Ongoing'=>'ongoing'
        ]);
        $form->date('due_date', __('Due date'))->default(date('Y-m-d'));
        $form->text('description', __('Description'));

        return $form;
    }
}
