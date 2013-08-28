<?php
    echo $this->Form->create(false, array('type' => 'post', 'action' => 'confirm'));
    echo $this->Form->input(null, array('label' => 'ログイン名', 'value' => $this->data[$UserModel]['name'], 'disabled'));echo '<br />';
    echo $this->Form->input(null, array('label' => 'ログインパス', 'value' => '非表示', 'disabled'));echo '<br />';
    echo $this->Form->input(null, array('label' => 'メールアドレス', 'value' => $this->data[$UserModel]['mail'], 'disabled'));echo '<br />';

    echo $this->Form->input($UserModel . '.name', array('type' => 'hidden'));
    echo $this->Form->input($UserModel . '.pass', array('type' => 'hidden'));
    echo $this->Form->input($UserModel . '.mail', array('type' => 'hidden'));
    echo $this->Form->submit('登録');
    echo $this->Form->end();

?>