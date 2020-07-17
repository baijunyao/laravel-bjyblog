<?php

namespace App\Observers;

class BaseObserver
{
    public function created($model)
    {
        flash_success(translate('Store Success'));
    }

    public function updated($model)
    {
        // restore() triggering both restored() and updated()
        if(! $model->isDirty('deleted_at')){
            flash_success(translate('Update Success'));
        }
    }

    public function deleted($model)
    {
        // delete() and forceDelete() will triggering deleted()
        if ($model->isForceDeleting()) {
            flash_success(translate('Force Delete Success'));
        } else {
            flash_success(translate('Delete Success'));
        }
    }

    public function restored($model)
    {
        flash_success(translate('Restore Success'));
    }
}
