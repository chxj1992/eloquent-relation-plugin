<?php
namespace Medlinker\EloquentRelationPlugin\Tests\Model;

use Jenssegers\Mongodb\Model;
use Medlinker\EloquentRelationPlugin\Src\ExtraRelations;

class User extends Model {

    use ExtraRelations;

    public $collection = 'users';

    public $fillable = ['id', 'name', 'cardIdList'];

    public function cards() {
        return $this->containsMany('\Medlinker\EloquentRelationPlugin\Tests\Model\UserCard', 'id', 'cardIdList');
    }

}