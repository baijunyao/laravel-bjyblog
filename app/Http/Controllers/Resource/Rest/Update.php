<?php

namespace App\Http\Controllers\Resource\Rest;

trait Update
{
    public function update()
    {
        $resourceName = $this->getResourceName();

        if (file_exists(app_path("Http/Requests/$resourceName/Update.php"))) {
            $this->formRequestValidation();
        }

        $resourceFQN = $this->getResourceFQN();
        $model = $this->getModelFQN();
        $currentModel = (new $model)->withTrashed()->find($this->getRouteId());
        $currentModel->update(request()->all());

        return new $resourceFQN($currentModel);
    }
}
