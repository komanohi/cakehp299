





<?php
    echo $this->Form->create(false, array('type' => 'post', 'action' => 'login'));
    echo $this->Form->input($UserModel . '.username', array('label' => 'ログイン名', 'size' => '30', 'maxlength' => '30'));echo '<br />';
    echo $this->Form->input($UserModel . '.password', array('label' => 'ログインパス', 'size' => '30', 'maxlength' => '30', 'type' => 'password'));echo '<br />';
    echo $this->Session->flash();echo '<br />';
    echo $this->Form->submit('ログイン');
    echo $this->Form->end();
    //echo $this->Html->url(array('action' => 'impel_logout'));
    echo '<br />';
    echo $this->Html->link('強制ログアウト', array('action' => 'impel_logout', 'full_base' => true));
?>










