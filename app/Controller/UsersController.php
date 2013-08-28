<?php
class UsersController extends AppController {

    public $uses = array('User');

    function beforeFilter(){
        parent::beforeFilter();
        //ログイン無しで挙動を許可するactionを定義(AppControllerに定義すれば全controllerのactionに反映される
        $this->Auth->allow('input', 'finish', 'login', 'impel_logout');
        $this->set('UserModel', $this->modelName['user']);
    }

    /*
    function test(){
        //var_dump($this->request->data);
        if(!$this->request->isPost()) return;
        $this->TestModel->test_ins($this->request->data);
        $testData = $this->TestModel->test_select();
        $this->set('testData', $testData);
    }
    */

    /**
     * アカウント情報入力画面
     *
     * @param unknown $name
     */
    public function input(){
        if(!$this->request->isPost()) return;
        //var_dump($this->request->data);exit;
        if(!$this->{$this->modelName['user']}->save($this->request->data)) return;
        $this->redirect('finish');
    }

    /**
     * アカウント情報確認画面
     *
     * @param unknown $name
     */
    /*public function confirm(){
        if($this->{$this->modelName['user']}->validates()){
            // 色んな処理を書く！
        }
    }*/

    /**
     * アカウント登録完了画面
     *
     * @param unknown $name
     */
    public function finish(){

    }

    /**
     * ログイン画面
     * login_nowをon(true)にする
     * 既にログインされているアカウント(login_nowがtrue)の場合は、nameとpassが一致してもログイン不可
     * 「1アカウント＝1人」の状態を保つ、複数人で1つのアカウントを使用して欲しくない
     *
     * @param unknown $name
     */
    public function login(){
        if(!$this->request->isPost()) return;

        $loginData = $this->{$this->modelName['user']}->getLoginData($this->request->data);

        if (!$this->Auth->login($this->request->data)) {
            $this->Session->setFlash(__('Invalid username or password, try again'));
        } elseif ($loginData[$this->modelName['user']]['login_now'] == true) {
            $this->Session->setFlash(__('既にログインされているアカウントです。強制ログアウトを行ってください。'));
        } else {
            $this->{$this->modelName['user']}->loginNowSwitch($this->request->data, true);
            $this->redirect($this->Auth->redirect());
        }
    }

    /**
     * ログアウト処理
     * login_nowをoff(false)にした後、ログアウト
     *
     * @param unknown $name
     */
    public function logout(){
        //if(!$this->request->isPost()) return;
        $this->{$this->modelName['user']}->loginNowSwitch($this->Session->read('Auth.User'), false);
        $this->redirect($this->Auth->logout());
    }

    /**
     * 強制ログアウト処理
     * 他人が自分のアカウントを使用している場合、強制的にログアウトさせる(ログアウトと同時に、ログイン情報の変更を促す
     *
     * @param unknown $name
     */
    //他のPCにセッションが残ってしまう為、強制ログアウトは無し
    //login_nowに引っかかった場合は、メールへ送信したURLからアカウントの変更処理を行い、書き込み等の操作ができないようにする
    //アカウントの変更処理を行う場合は毎回userとパスを確認する
    /*public function impel_logout(){
        if(!$this->request->isPost()) return;
        $loginData = $this->{$this->modelName['user']}->getLoginData($this->request->data);
        //user&passが一致していればlogin_nowをfalseにしてログアウト処理
        if(!empty($loginData)){
            $this->{$this->modelName['user']}->loginNowSwitch($this->request->data, false);
            $this->redirect($this->Auth->logout());
        }else{
            $this->Session->setFlash(__('Invalid username or password, try again'));
        }
    }*/

    /**
     * アカウント情報変更
     *
     * @param unknown $name
     */
    public function change(){

    }


}