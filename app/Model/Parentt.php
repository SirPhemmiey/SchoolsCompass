<?php
App::uses('AppModel', 'Model');
class Parentt extends AppModel{
    
    public function beforeSave($options = array()){
        if(!empty($this->data[$this->alias]['password'])){
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }
}