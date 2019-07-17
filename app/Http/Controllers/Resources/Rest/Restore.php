<?php

namespace App\Http\Controllers\Resources\Rest;

trait Restore
{
    public function restore()
    {
        $model = $this->getModelFQN();
        $resource = $this->getResourceFQN();

        $currentModel = (new $model)->withTrashed()->find($this->getRouteId());
        $currentModel->restore();

        return new $resource($currentModel);
    }
}
