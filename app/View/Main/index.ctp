    <table>
        <tr>
            <th>id</th><th>username</th><th>password</th><th>mail</th><th>login_now</th><th>created</th><th>modified</th>
        </tr>
        <?php
            if(!empty($userData)){
                foreach($userData as $data){
                    echo
                    "
                        <tr>
                            <td>
                                {$data[$UserModel]['id']}
                            </td>
                            <td>
                                {$data[$UserModel]['username']}
                            </td>
                            <td>
                                {$data[$UserModel]['password']}
                            </td>
                            <td>
                                {$data[$UserModel]['mail']}
                            </td>
                            <td>
                                {$data[$UserModel]['login_now']}
                            </td>
                            <td>
                                {$data[$UserModel]['created']}
                            </td>
                            <td>
                                {$data[$UserModel]['modified']}
                            </td>
                        </tr>
                    ";
                }
            }
        ?>
    </table>
    <?php
    echo '<br />';
    echo $this->Html->link('ログアウト', array('controller' => 'users', 'action' => 'logout', 'full_base' => true));

    ?>