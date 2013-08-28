




you make a view file.



<?php
    echo $this->Form->create(false, array('type' => 'post', 'action' => 'test'));
    echo $this->Form->input($TestModel . '.nickname', array('label' => 'ニックネーム'));
    /*
    echo $this->Form->text('HaskapForm.text1');
    echo '<br />';
    echo $this->Form->checkbox('HaskapForm.チェックボックス1', array('checked' => true));
    echo $this->Form->label('HaskapForm.チェックボックス1');
    echo '<br />';
    echo $this->Form->radio('HaskapForm.radio1',
        array('ウィンドウズ' => 'windows',
            'リナックス' => 'linux',
            'マックOS' => 'macosx'),
        array('legend' => 'OSを選択', 'value' => 'リナックス')
    );
    echo '<br />';
    echo $this->Form->select('HaskapForm.select1',
        array('ウィンドウズ' => 'windows',
            'リナックス' => 'linux',
            'マックOS' => 'macosx'),
        array('empty' => '項目を選んでください')
    );
    */
    echo '<br />';
    echo $this->Form->submit('送信');
    echo $this->Form->end();

?>
    <table>
        <tr>
            <th>id</th><th>nickname</th><th>created</th><th>modified</th>
        </tr>
        <?php
            if(!empty($testData)){
                foreach($testData as $data){
                    echo
                    "
                        <tr>
                            <td>
                                {$data[$TestModel]['id']}
                            </td>
                            <td>
                                {$data[$TestModel]['nickname']}
                            </td>
                            <td>
                                {$data[$TestModel]['created']}
                            </td>
                            <td>
                                {$data[$TestModel]['modified']}
                            </td>
                        </tr>
                    ";
                }
            }
        ?>
    </table>





















