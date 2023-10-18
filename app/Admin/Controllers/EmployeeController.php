<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Employees\BatchReplicate;
use App\Admin\Actions\Employees\Replicate;
use App\Models\Department;
use App\models\Employee;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Form\Field\Select;
use Encore\Admin\Grid;
use Encore\Admin\Show;

use function Termwind\style;

class EmployeeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Employee';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    
    {

        $grid = new Grid(new Employee());
        $grid->export(function ($export) {
            $export->filename('test.csv');

 
        });
        $grid->actions(function ($actions) {
            $actions->add(new Replicate);
        });
        $grid->batchActions(function ($batch) {
            $batch->add(new BatchReplicate());
        });
        $grid->batchActions(function ($batch) {
            $batch->add(new BatchReplicate());
        });

        $grid->filter(function($filter){
            $filter->disableIdFilter();
            $filter->like('name', 'Name');
        });

        
        $grid->column('id', __('Id'));
        $grid->column('created_at', __('Created at'))->hide();
        $grid->column('updated_at', __('Updated at'))->hide();
        $grid->column('mail', __('mail'))
        ->display(function($email){
            return'sumayahswaibk@gmail.com';
        })
        ->gravatar();
        $grid->column('name', __('Name'))
        ->editable()
        ->setAttributes(['style'=>'color:red;font-weight:bold']);
        $grid->column('photo', __('Photo'))
        /*  ->lightbox(['width' => 60, 'height' => 60])  */
        ->sortable();
        $grid->column('email', __('Email'));
        $grid->column('phone', __('Phone'));
        $grid->column('age', __('Age'))
        ->setAttributes([
            'style' => 
            'color:rgb(26, 9, 94);
            font-weight:bold;
            font-size:20px'
        ]);
        $grid->column('gender', __('Gender'))
       ->editable('select',
        [
            'female' => 'F', 
            'male' => 'M'
            ]);

        /* ->using([
            'female' => 'F', 
            'male' => 'M'
        ]) */
        /* ->dot([
            'female' => 'primary', 
            'male' => 'success' 
        ]); */
        
        
        $grid->column('department', __('Department'));
        $grid->column('designation', __('Designation'));
        $grid->column('hire_date', __('Hire date'));

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
        $show = new Show(Employee::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('name', __('Name'));
        $show->field('photo', __('Photo'));
        
        $show->field('email', __('Email'));
        $show->field('phone', __('Phone'));
        $show->field('age', __('Age'));
        $show->field('gender', __('Gender'));
        $show->field('department', __('Department'));
        $show->field('designation', __('Designation'));
        $show->field('hire_date', __('Hire date'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Employee());

        $form->text('name', __('Name'));
        $form->image('photo', __('Photo'));
        $form->email('email', __('Email'));
        $form->mobile('phone', __('Phone'));
        $form->text('age', __('Age'));
        $form->radio('gender', __('Gender'))
        ->options([
            'female'=>'Female',
            'male'=>'Male',
        ]);
        
        $form->select('department', __('Department'))->options(Department::all()->pluck('title', 'id'));
        $form->text('designation', __('Designation'));
        $form->date('hire_date', __('Hire date'));

        return $form;
    }
}
