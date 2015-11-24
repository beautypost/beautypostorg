<?php

App::uses('Component', 'Controller');

class QuestionCComponent extends Component {

   public function initialize(Controller $controller) {
        $this->controller = $controller;

    }

    private function loadModel($modelName) {
        if (!empty($this->{$modelName})) {
        // すでに存在すればそのままreturn
            return;
        } elseif (!empty($this->controller->{$modelName})) {
        // 呼び出し元のコントローラでusesしてあれば$this->{モデル名}に参照渡し
            $this->{$modelName} = $this->controller->{$modelName};
        } else {
        // コントローラでusesしていなければコンポーネントでモデルを読み込む
            App::uses($modelName, 'Model');
            $this->{$modelName} = new $modelName;
        }
    }


    var $messages = array();


    public function setMessages($data){
        $this->messages[] = $data;
    }

    public function getMessages(){
        return $this->messages;
    }

    public function setErrorLog($name,$message){
            $this->log($name.'::'.$message);
    }


    public function getQuestions($limit=2){
        $this->loadModel('Question');
        $ar = $this->Question->getItems($limit);

        return $ar;
    }

    public function getNewQuestion(){
        return;
    }





}
?>