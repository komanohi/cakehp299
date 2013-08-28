<?php
class MainController extends AppController {

    public $uses = array('User');

    function beforeFilter(){
        parent::beforeFilter();
        $this->set('UserModel', $this->modelName['user']);
    }

    function index(){
        //var_dump($this->Session->read('Auth.User.User'));
        $userData = $this->{$this->modelName['user']}->getAllUserData();
        $this->set('userData', $userData);
    }

    /*
    public function contact() {
        if(empty($this->request->is('post'))) return;
        $this->loadModel('Contact');
        if ($this->request->is('post')) {
            $email = new CakeEmail();
            $email->config('contact'); //$contactの設定を読み込みます。
            $email->viewVars($this->request->data['Contact']); //送信内容をテンプレートファイルに渡します
            if($email->send()){
                //メール送信が成功した場合ここで処理
            }
        }
        $this->render();
    }*/

    public function contact() {
        App::uses('CakeEmail', 'Network/Email');
        $body = array (
                'name' => 'testName',
                'message'    => 'メッセージ文部分',
        );
        // 設定読み込み
        $email = new CakeEmail('gmail');
        // 送信
        $email = $email->config(array('log' => 'emails'))
                       ->template('gmail_test', 'default')
                       ->viewVars($body)
                       ->from(array('testset.testset@gmail.com' => 'testset.testset@gmail.com'))
                       ->to('njc.yokoyama@gmail.com')
                    // ->bcc($this->request->data['Contact']['email'])
                    // ->cc('*******@*******.com')
                       ->subject('タイトル')
                       ->send();
        debug($email);
    }
}