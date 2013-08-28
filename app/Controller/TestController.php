<?php
class TestController extends AppController {

    public $uses = array('Test');

    function beforeFilter(){
        parent::beforeFilter();
        $this->set('TestModel', $this->modelName['test']);
    }
    function test(){
        var_dump($this->request->data);
        if(!$this->request->isPost()) return;
        $this->{$this->modelName['test']}->test_ins($this->request->data);
        $testData = $this->{$this->modelName['test']}->test_select();
        $this->set('testData', $testData);
    }




}

