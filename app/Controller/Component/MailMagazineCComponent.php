<?php

App::uses('Component', 'Controller');

class MailMagazineCComponent extends Component {

	/**
	値$all に値が含まれているかをcheckし、含まれていない場合は、error_logに出力
	$all は String Array 両対応
	**/
    public function createBody($message,$nickname) {
        $pattern = '/\{NICKNAME\}/';
        $_data = preg_replace($pattern,$nickname,$message);
        return $_data;
    }


}
?>