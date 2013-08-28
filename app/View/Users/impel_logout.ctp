<?php
    echo $this->Form->create(false, array('type' => 'post', 'action' => 'impel_logout'));
    echo $this->Form->input($UserModel . '.username', array('label' => 'ログイン名', 'size' => '30', 'maxlength' => '30'));echo '<br />';
    echo $this->Form->input($UserModel . '.password', array('label' => 'ログインパス', 'size' => '30', 'maxlength' => '30', 'type' => 'password'));echo '<br />';
    echo $this->Session->flash();echo '<br />';
    echo '強制ログアウトが必要な場合は、アカウント情報が他者に漏れてしまっている可能性があります。<br />強制ログアウト後、早急にパスワードの変更を行うことをオススメします。';
    echo $this->Form->submit('強制ログアウト');
    echo $this->Form->end();
?>