<?php
namespace Medlinker\EloquentRelationPlugin\Src;

use Jenssegers\Mongodb\Relations\HasMany;

class ContainsMany extends HasMany
{

    public function addConstraints()
    {
        if (static::$constraints) {
            $this->query->whereIn($this->foreignKey, $this->getParentKey());

            $this->query->whereNotNull($this->foreignKey);
        }
    }

}