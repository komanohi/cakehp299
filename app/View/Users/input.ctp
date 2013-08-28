<?php
    echo $this->Form->create(false, array('type' => 'post', 'action' => 'input'));
    echo $this->Form->input($UserModel . '.username', array('label' => 'ログイン名', 'size' => '30', 'maxlength' => '30'));echo '<br />';
    echo $this->Form->input($UserModel . '.password', array('label' => 'ログインパス', 'size' => '30', 'maxlength' => '30', 'type' => 'password'));echo '<br />';
    echo $this->Form->input($UserModel . '.password_more', array('label' => 'ログインパス(確認)', 'size' => '30', 'maxlength' => '30', 'type' => 'password'));echo '<br />';
    echo $this->Form->input($UserModel . '.mail', array('label' => 'メールアドレス', 'size' => '90', 'maxlength' => '256'));echo '<br />';
    echo $this->Form->input($UserModel . '.mail_more', array('label' => 'メールアドレス(確認)', 'size' => '90', 'maxlength' => '256'));echo '<br />';
    echo '確認画面へは遷移しません。<br />要件を満たしていればそのまま登録されますので確認はこのページで行って下さい。<br />';
    echo $this->Form->submit('登録');
    echo $this->Form->end();
    echo '<br />';
    echo $this->Html->link('ログインページへ', array('action' => 'login', 'full_base' => true));

?>