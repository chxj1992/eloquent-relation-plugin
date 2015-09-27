<?php
namespace Medlinker\EloquentRelationPlugin\Tests\Model;

use Jenssegers\Mongodb\Model;

class UserCard extends Model {

    public $collection = 'user_cards';

    public $fillable = ['id', 'card_num'];

}