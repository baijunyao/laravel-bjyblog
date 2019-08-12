<?php

namespace App\Observers;

class BaseObserver
{
    public function created($model)
    {
        flash_success(__('Store Success'));
    }

    public function updated($model)
    {
        // restore() triggering both restored() and updated()
        if(! $model->isDirty('deleted_at')){
            flash_success(__('Update Success'));
        }
    }

    public function deleted($model)
    {
        // delete() and forceDelete() will triggering deleted()
        if ($model->isForceDeleting()) {
            flash_success(__('Force Delete Success'));
        } else {
            flash_success(__('Delete Success'));
        }
    }

    public function restored($model)
    {
        flash_success(__('Restore Success'));
    }
}
