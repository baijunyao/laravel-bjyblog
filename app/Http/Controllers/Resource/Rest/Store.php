<?php

namespace App\Http\Controllers\Resource\Rest;

trait Store
{
    public function store()
    {
        if (file_exists(app_path('Http/Requests/Tag/' . 'Store.php'))) {
            $this->formRequestValidation();
        }

        $model = $this->getModelFQN();
        $resource = $this->getResourceFQN();

        return new $resource((new $model)->create(request()->all()));
    }
}
