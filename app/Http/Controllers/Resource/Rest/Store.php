<?php

namespace App\Http\Controllers\Resource\Rest;

trait Store
{
    public function store()
    {
        $resourceName = $this->getResourceName();

        if (file_exists(app_path("Http/Requests/$resourceName/Store.php"))) {
            $this->formRequestValidation();
        }

        $resourceFQN = $this->getResourceFQN();
        $model = $this->getModelFQN();

        return new $resourceFQN((new $model)->create(request()->all()));
    }
}
