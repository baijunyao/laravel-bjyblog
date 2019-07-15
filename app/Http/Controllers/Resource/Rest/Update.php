<?php

namespace App\Http\Controllers\Resource\Rest;

trait Update
{
    public function update()
    {
        $resource = $this->getResourceFQN();

        if (file_exists(app_path("Http/Requests/$resource/Update.php"))) {
            $this->formRequestValidation();
        }

        $model = $this->getModelFQN();
        $currentModel = (new $model)->withTrashed()->find($this->getRouteId());
        $currentModel->update(request()->all());

        return new $resource($currentModel);
    }
}
