<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;

class BaseObserver
{
    public function created()
    {
        flash_success('添加成功');
        $this->clearCache();
    }

    public function updated(Model $model)
    {
        // restore() triggering both restored() and updated()
        if(! $model->isDirty('deleted_at')){
            flash_success('修改成功');
        }
        $this->clearCache();
    }

    public function deleted(Model $model)
    {
        // delete() and forceDelete() will triggering deleted()
        if ($model->isForceDeleting()) {
            flash_success('彻底删除成功');
        } else {
            flash_success('删除成功');
        }

        $this->clearCache();
    }

    public function restored()
    {
        flash_success('恢复成功');
        $this->clearCache();
    }

    protected function clearCache()
    {
    }
}
