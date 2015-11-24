<?php

App::uses('Component', 'Controller');

class VoteCComponent extends Component {

var $votemax = VOTEMAX;


	/**
	値$all に値が含まれているかをcheckし、含まれていない場合は、error_logに出力
	$all は String Array 両対応
	**/
    public function CheckVoteData($votedata) {
        if(!isset($votedata)){
            return;
        }
        if($votedata < 0 || $votedata > $this->votemax){
            return;
        }

        return true;

    }

    public function CheckAllVoteData($all,$GenreTitle){

        foreach($all as $key => $val){
            if(!$this->CheckVoteData($val)){
                $this->setMessages($GenreTitle[$key].'が選択されていません');
            }
        }
    }


}
?>