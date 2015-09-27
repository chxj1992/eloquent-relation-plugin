<?php
namespace Medlinker\EloquentRelationPlugin\Src;


trait ExtraRelations {

    public function containsMany($related, $foreignKey = null, $localKey = null)
    {

//        Not support relation with original model currently
//        // Check if it is a relation with an original model.
//        if ($related instanceof Model)
//        {
//            return parent::hasOne($related, $foreignKey, $localKey);
//        }

        $foreignKey = $foreignKey ?: $this->getForeignKey();

        $instance = new $related;

        $localKey = $localKey ?: $this->getKeyName();

        return new ContainsMany($instance->newQuery(), $this, $foreignKey, $localKey);
    }


}