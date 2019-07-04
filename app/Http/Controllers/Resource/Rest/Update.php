<?php

namespace App\Http\Controllers\Resource\Rest;

trait Update
{
    public function update()
    {
        $model = $this->getModelFQN();
        $resource = $this->getResourceFQN();
        $currentModel = (new $model)->withTrashed()->find($this->getRouteId());
        $currentModel->update(request()->all());

        return new $resource($currentModel);
    }
}
