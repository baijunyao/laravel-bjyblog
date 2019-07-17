<?php

namespace App\Http\Controllers\Resource\Rest;

trait Store
{
    public function store()
    {
        $this->formRequestValidation('Store');
        $resourceFQN = $this->getResourceFQN();
        $model = $this->getModelFQN();

        return new $resourceFQN((new $model)->create(request()->all()));
    }
}
