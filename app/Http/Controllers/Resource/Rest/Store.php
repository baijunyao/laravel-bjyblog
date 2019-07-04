<?php

namespace App\Http\Controllers\Resource\Rest;

trait Store
{
    public function store()
    {
        $model = $this->getModelFQN();
        $resource = $this->getResourceFQN();

        return new $resource((new $model)->create(request()->all()));
    }
}
