<?php

namespace Baijunyao\LaravelRestful;

trait Update
{
    public function update()
    {
        $this->formRequestValidation('Update');
        $resourceFQN = $this->getResourceFQN();
        $model = $this->getModelFQN();
        $currentModel = (new $model)->withTrashed()->find($this->getRouteId());
        $currentModel->update(request()->all());

        return new $resourceFQN($currentModel);
    }
}
