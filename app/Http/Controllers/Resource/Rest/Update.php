<?php

namespace App\Http\Controllers\Resource\Rest;

trait Update
{
    public function update()
    {
        if (file_exists(app_path('Http/Requests/Tag/' . 'Update.php'))) {
            $this->formRequestValidation();
        }

        $model = $this->getModelFQN();
        $resource = $this->getResourceFQN();
        $currentModel = (new $model)->withTrashed()->find($this->getRouteId());
        $currentModel->update(request()->all());

        return new $resource($currentModel);
    }
}
