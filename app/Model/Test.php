<?php
class Test extends AppModel {

    public $useTable = 'tests';
    public $primaryKey = 'id';
    //var $name = 'test';
    //var $modelName = 'Test';

    public $validate = array(
            'nickname' => array(
                'rule' => array('notEmpty'),
                'message' => '空にしないでくださいっ！！'
            )
    );

    function test_ins($name){
        //$saveData[$this->modelName]['nickname'] = $name;
        //var_dump($name);
        $this->save($name);
    }

    function test_select(){
        $query = array(
            'conditons' => ''
        );
        return $this->find('all');
    }
}