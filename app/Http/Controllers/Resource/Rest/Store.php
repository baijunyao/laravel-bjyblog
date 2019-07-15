<?php

namespace App\Http\Controllers\Resource\Rest;

trait Store
{
    public function store()
    {
        $resource = $this->getResourceFQN();

        if (file_exists(app_path("Http/Requests/$resource/Store.php"))) {
            $this->formRequestValidation();
        }

        $model = $this->getModelFQN();

        return new $resource((new $model)->create(request()->all()));
    }
}
