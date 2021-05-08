<?php

namespace App\Models\Observers;

class BaseObserver
{
    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return void
     */
    public function created($model)
    {
        flash_success(translate('Store Success'));
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return void
     */
    public function updated($model)
    {
        // restore() triggering both restored() and updated()
        if(! $model->isDirty('deleted_at')){
            flash_success(translate('Update Success'));
        }
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return void
     */
    public function deleted($model)
    {
        // delete() and forceDelete() will triggering deleted()
        if (method_exists($model, 'isForceDeleting') && $model->isForceDeleting()) {
            flash_success(translate('Force Delete Success'));
        } else {
            flash_success(translate('Delete Success'));
        }
    }

    /**
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return void
     */
    public function restored($model)
    {
        flash_success(translate('Restore Success'));
    }
}
