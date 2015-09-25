### 这是什么?

一般ORM将数据关系分为四类:

* hasOne
* belongsTo
* hasMany
* belongsToMany

ORM为了能方便的抽象出这四种关系,会对数据表的设计有[一定的要求](http://www.golaravel.com/laravel/docs/5.0/eloquent/#relationships). 如: 实现"一对多"关系, 要求采用在子表的各行数据中保存主表ID的设计方式来描述主表包含了多条子表数据

主表:

| id        | name     |
| ----------|---------:|
| 1         | Tom      |
| 2         | Sandy    | 

子表:

| user_id   | card_num   |
| ----------|-----------:|
| 1         | 123214     |
| 1         | 123235     | 
| 2         | 845623     | 

但因为当前数据库(med)中一些表用于表示"一对多"关系的数据表设计并不符合这样的设计规范 (当前Med库中多是通过在主表中用一个集合保存子表的关联ID来描述这种关系的).

所以,本插件实现了一个新关系接口'containsMany', 它的作用是当 当前数据表采用了在主表中用集合保存子表ID的方式来表述"一对多"关系时,仍能让开发者以Eloquent式的调用来优雅的处理多个模型之间的关系.

### 使用

    // 数据模型类
    class SomeModel extends Model {
        
        use ExtraRelations;

        // relationship model
        public function xxxs() {
            $this->containsMany('...Model', foreign_key, local_key);
        }
    }