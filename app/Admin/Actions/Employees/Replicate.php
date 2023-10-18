<?php

namespace App\Admin\Actions\Employees;

use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

/* class Replicate extends RowAction
 */
class Replicate extends RowAction
{
    public $name = 'copy';

    public function handle(Model $model)
    {
        $model->replicate()->save();

        // $model ...

        return $this->response()->success('Success message.')->refresh();
    }

}