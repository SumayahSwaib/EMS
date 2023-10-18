<?php

namespace App\Admin\Controllers;

use App\Models\Employee;
use App\models\Payment;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

use function PHPUnit\Framework\returnSelf;

class PaymentController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Payment';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Payment());
        $grid->model()->orderBy('id', 'desc');
        $grid->filter(function ($filter) {

            $filter->disableIdFilter('id', 'ID');
            $filter->equal('employee_id', 'Employee')
                ->select(Employee::all()->pluck('name', 'id'));
            $filter->group('amount', function ($group) {
                $group->gt('greater than');
                $group->lt('less than');
                $group->nlt('not less than');
                $group->ngt('not greater than');
                $group->equal('equal to');
            });
        });




        $grid->column('id', __('ID'))->sortable();
        $grid->column('created_at', __('Created at'))->hide();
        $grid->column('updated_at', __('Updated at'))->hide();

        $grid->column('employee_id', __('Employee '))
            ->display(function ($employee) {
                return Employee::find($employee)->name;
            });
        $grid->column('payment_type', __('Payment type'))
            ->label([
                'Wage' => 'info',
                'Salary' => 'success',
                'Commission' => 'danger',

            ]);
        $grid->column('amount', __('Amount'))
            ->setAttributes(['style' => 'color:blue;font-weight:bold']);
        $grid->column('paid_at', __('Payment Date'));

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
        $show = new Show(Payment::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('employee_id', __('Employee id'));
        $show->field('payment_type', __('Payment type'));
        $show->field('amount', __('Amount'));
        $show->field('paid_at', __('Paid at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Payment());

        $form->select('employee_id', __('Employee'))->options(Employee::all()->pluck('name', 'id'))->rules('required');
        $form->radioCard('payment_type', __('Payment type'))
            ->options([
                'Wage' => 'Wage',
                'Salary' => 'Salary',
                'Commission' => 'Commission',
            ])->when('Commission', function (Form $form) {
                $form->text('commission_rate', 'Commission Rate')->rules('required');
                $form->currency('sales_amount', 'Sales Amount')->rules('required');
            })->when('Salary', function (Form $form) {
                $form->currency('amount', __('Amount'))->symbol('UG')->rules('required');
            })->when('Wage', function (Form $form) {
                $form->currency('amount', __('Amount'))->symbol('UG')->rules('required');
            })


            ->rules('required');
        $form->date('paid_at', __('Paid at'))->default(date('Y-m-d'))->rules('required');

        $form->radio('bonus', __('Bonus'))
            ->options([
                1 => 'Yes',
                2 => 'No',
            ])->when(1, function (Form $form) {

                $form->text('bonus_type', 'Bonus Type')->rules('required');
                $form->currency('bonus_amount', 'bonus_amount')->rules('required');
            })->when(2, function (Form $form) {
            })->rules('required');



        return $form;
    }
}
