<?php

namespace App\Admin\Actions\Employees;

use Encore\Admin\Actions\BatchAction;
use Illuminate\Database\Eloquent\Collection;

class BatchReplicate extends BatchAction
{
    public $name = 'batch copy';

    public function handle(Collection $collection)
    {
        foreach ($collection as $model) {
            $model->replicate()->save();

        }

         return $this->response()->success('Success message...')->refresh();
    }

     public function dialog()
    {
        $this->confirm('Are you sure to copy this row?');
    } 


}