<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Payment;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;
use Illuminate\Support\Facades\Auth;
use PhpParser\Builder\Function_;
use Encore\Admin\Widgets\InfoBox;
use Encore\Admin\Widgets\Table;
use Illuminate\Console\View\Components\Task;

class HomeController extends Controller
{
    public function index(Content $content)
    {

        $u = Auth::user();
        $content
            ->title('Employee Management - Dashboard')
            ->description('Hello ' . $u->name . "!")
            ->row(function (row $row) {
                $row->column(6, function (Column $column) {
                    $box = new Box('To Do List', 'tasks'
                    
    
                );
                    $box->style('success');
                    $box->solid();
                    $column->append($box);
                });

                $row->column(6, function (Column $column) {
                    $box = new Box('Employees', number_format(Employee::where([])->count()));
                    $box->style('success');
                    $box->solid();

                    $column->append($box);
                });
                
            })
            ->row(function (row $row) {
                $row->column(3, function (Column $column) {
                    $box = new Box('Employees on Salary', number_format(Payment::where(['payment_type' => 'Salary'])->count()));
                    $box->style('success');
                    $box->solid();

                    $column->append($box);
                });

                $row->column(3, function (Column $column) {
                    $box = new Box('Employees On Wage', number_format(Payment::where(['payment_type' => 'Wage'])->count()));
                    $box->style('success');
                    $box->solid();
                    $column->append($box);
                });

                $row->column(3, function (Column $column) {
                    $box = new Box('Employees On Commission', number_format(Payment::where(['payment_type' => 'Commission'])->count()));
                    $box->style('success');
                    $box->solid();

                    $column->append($box);
                });

                $row->column(3, function (Column $column) {
                    $box = new Box('Total Payments', 'UGX', number_format(Payment::where([])->sum('amount')));
                    $box->style('success');
                    $box->solid();

                    $column->append($box);
                });
            });




        return $content;
    }
}
