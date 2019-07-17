<?php

namespace App\Http\Controllers\Resources\Rest;

trait Destroy
{
    public function destroy()
    {
        $model = static::getModelFQN();
        $id = $this->getRouteId();
        (new $model)->destroy($id);

        return response('');
    }
}
