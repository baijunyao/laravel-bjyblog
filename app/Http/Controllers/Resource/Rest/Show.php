<?php

namespace App\Http\Controllers\Resource\Rest;

trait Show
{
    public function show()
    {
        $model = $this->getModelFQN();
        $resource = $this->getResourceFQN();
        $id = $this->getRouteId();

        return new $resource((new $model)->withTrashed()->find($id));
    }
}
