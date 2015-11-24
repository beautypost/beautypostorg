<?php

App::uses('Component', 'Controller');

class CheckComponent extends Component {


	/**
	値$all に値が含まれているかをcheckし、含まれていない場合は、error_logに出力
	$all は String Array 両対応
	**/
    public function NullCheckData($name,$all) {
    	$_all = '';
    	if(is_array($all)){
			foreach($all as $k => $v){
				$_all .= $v.',';
			}
			$all = $_all;
		}
    	if($all){
            $this->log($name.'::'.$all);
    	}

    }


    /**
	metaData 用のCheckを行う以下の値でいずれかのDATAが設定されていないと、error_logに出力される
	metaDescription
	metaKeywords = array():
	PageTittle
    **/
    public function NullCheckMetaData($name,$data){
    	$ret='';
    	if(!(isset($data['metaDescription'])) || !$data['metaDescription']){
    		$ret .= 'no Description:';
    	}
    	if(!(isset($data['Pagetitle'])) || !$data['Pagetitle']){
    		$ret .= 'no Pagetitle:';
    	}
    	if (!(isset($data['metaKeywords'])) || !is_array($data['metaKeywords'])){
    		$ret .= 'no Keywords:';    		
    	}
    	$this->NullCheckData($name,$ret);



    }

}
?>