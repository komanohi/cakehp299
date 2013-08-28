<?php
class User extends AppModel {

    public $useTable = 'users';
    public $primaryKey = 'id';

    /**
     * フィールド定義
     * ■name：ログイン名
     *
     *
     * ■pass：ログインパス
     *
     *
     * ■mail：メールアドレス
     * ※アカウント削除有りにするので、重複登録を許可する
     *
     * ■login_now：現在ログインされているアカウントかどうか
     *   true：ログイン中、false：ログアウト中
     *
     * ■last_login_time：最後にログインした時間
     *
     * ■created：アカウント登録された時間
     *
     * ■modified：最後に情報がアカウント変更された時間
     *
     */
    public $validate = array(
            'username' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => '必須'
                ),
                'alphaNumeric' => array(
                    'rule' => array('alphaNumeric'),
                    'message' => '半角英数字のみ(全角禁止)'
                ),
                'isUnique' => array(
                    'rule' => 'isUnique',
                    'message' => '既に登録されている名前です'
                ),
                'between' => array(
                    'rule' => array('between', 5, 30),
                    'message' => '5字以上30字以下'
                )
            ),
            'password' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => '必須'
                ),
                'between' => array(
                    'rule' => array('between', 5, 30),
                    'message' => '5字以上30字以下'
                ),
                'sameCheck' => array(
                    'rule' => array('sameCheck', 'password_more'),
                    'message' => 'ログインパス(確認)と一致してません'
                )
            ),
            'mail' => array(
                'notEmpty' => array(
                    'rule' => 'notEmpty',
                    'message' => '必須'
                ),
                'email' => array(
                    'rule' => array('email'),
                    'message' => 'アドレス形式のみ許可(使用中のアドレスが通らない場合は他のフリーアドレスを取得して下さい)'
                ),
                'sameCheck' => array(
                    'rule' => array('sameCheck', 'mail_more'),
                    'message' => 'メールアドレス(確認)と一致してません'
                )
            ),
    );

    /*function test(){
        var_dump($this->alias);
    }*/

    public function beforeSave($options = array()) {
        //アカウント登録時、パスワードのハッシュ化(暗号化)を行う
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }

    //パスワードの同一性チェックをする。
    public function sameCheck($value , $fieldName) {
        $v1 = array_shift($value);
        $v2 = $this->data[$this->name][$fieldName];
        return $v1 == $v2;
    }

    public function getLoginData($loginData){
        $query = array(
                'conditions' => array(
                        'username' => $loginData[$this->alias]['username'],
                        'password' => AuthComponent::password($loginData[$this->alias]['password'])
                )
        );
        return $this->find('first', $query);
    }

    //login_nowのtrue/false切り替え
    public function loginNowSwitch($loginData, $onOff) {
        $query = array(
            'conditions' => array(
                'username' => $loginData[$this->alias]['username'],
                'password' => AuthComponent::password($loginData[$this->alias]['password'])
            )
        );
        $changeIdData = $this->find('first', $query);
        $this->save(array('id' => $changeIdData[$this->alias]['id'], 'login_now' => $onOff));
        return false;
    }

    public function getAllUserData(){
        return $this->find('all');
    }
}