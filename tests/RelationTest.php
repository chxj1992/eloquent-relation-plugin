<?php
namespace Medlinker\EloquentRelationPlugin\Tests;

use Medlinker\EloquentRelationPlugin\Tests\Model\User;
use Medlinker\EloquentRelationPlugin\Tests\Model\UserCard;

class RelationTest extends TestCase
{

    public function setUp() {

        parent::setUp();

        User::truncate();
        UserCard::truncate();

        User::create(['id'=>1, 'name'=>'Andy', 'cardIdList'=>[1, 2]]);
        UserCard::create(['id'=>1, 'card_num'=>'12345']);
        UserCard::create(['id'=>2, 'card_num'=>'23456']);
    }

    public function testGetRelationUserContainsTwoCards() {
        $cards = User::first()->cards;

        $this->assertCount(2, $cards);
    }


}