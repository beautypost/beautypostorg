<?php

App::uses('Component', 'Controller');

class MetaCComponent extends Component {

    public function setMetaData($pagetitle,$metakeywords,$metadescription){
    	$metaData = array();
       /**
        * metaDataの設定
        **/
        $metaData['Pagetitle'] = $pagetitle;
        $metaData['metaKeywords'] = $metakeywords;
        $metaData['metaDescription'] = $metadescription;

    	return $metaData;
    }


    public function getHikakuMetaDescription($Genre,$GenreTitle){
        $ret = '';
        $ret = $Genre['name'].'の比較ポイント';
        foreach($GenreTitle as $title){
            $ret .= '['.$title['title'].']';
        }
        $ret .= 'について詳しく説明します。';
        return $ret;
    }


    public function getYougoMetaDescription($Genre,$Yougo){
        $ret = '';
        $ret = $Genre['name'].'用語集|';
        $i=0;        
        foreach($Yougo as $title){
            $i++;
            if($i > 10){break;}
            $ret .= '['.$title['Yougo']['title'].']';
        }
        $ret .= 'について詳しく説明します。';
        return $ret;
    }

    public function getYougoMetaKeyword($item){

        $ret = '';
        $i=0;        
        foreach($item as $title){
            $i++;
            if($i > 7){break;}
            $ret .= $title['Yougo']['title'].',';
        }
                $ret = substr($ret, 0, -1);
        return $ret;
    }

}
?>