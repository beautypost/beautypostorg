<?php

App::uses('Component', 'Controller');

class RssCComponent extends InfoCComponent {

    var $components = array('BlogC');

   public function initialize(Controller $controller) {
        $this->controller = $controller;
    }


	/**
	値$all に値が含まれているかをcheckし、含まれていない場合は、error_logに出力
	$all は String Array 両対応
	**/
    public function getData($title,$url,$description,$rssFilename,$dataList,$Genre) {

    //----------------------
    //XML上半分作成
    //----------------------
    $rssHeader = <<<RSS
<?xml version="1.0" encoding="utf-8" ?>
<rss version="2.0"
 xmlns:content="http://purl.org/rss/1.0/modules/content/">
<channel>
<title>$title</title>
<link>$url</link>
<description>$description</description>
<language>ja</language>
RSS;

    //----------------------
    //XMLの記事部分作成
    //----------------------
    $_item = "";
    foreach($dataList as $item){
        $comment = $this->BlogC->getFeedItemTag($item['Blog']['comment']);
        $urlname = $Genre[$item['Blog']['genre_id']]['urlname'];
        $itemLink =DOMAIN.'/List/'.$urlname.'/blog/'.$item['Blog']['id'];
        $itemPubDate = date('D, d M Y H:i:s O', strtotime($item['Blog']['created']));        
        $_item .= "<item>\n";
        $_item .= "<title>" . htmlspecialchars($item['Blog']['title']) . "</title>\n";
        $_item .= "<link>" . $itemLink . "</link>\n";
        $_item .= "<description>" . htmlspecialchars($comment) . "</description>\n";
        $_item .= "<pubDate>$itemPubDate</pubDate>\n";
//        $_item .= "<content:encoded><![CDATA[".urlencode($item['Blog']['comment'])."]></content:encoded>\n";
        $_item .= "</item>\n";
    }

    //----------------------
    //XML下半分作成
    //----------------------
    $rssFooter = <<<RSS
</channel>
</rss>
RSS;

$ret = $rssHeader.$_item.$rssFooter;
//var_dump($ret);
return $ret;
    }

    public function getDataList($dataList,$Genre) {


    //----------------------
    //XMLの記事部分作成
    //----------------------
    $item = "";
    foreach($dataList as $item){
        $urlname= $Genre[$item['Blog']['genre_id']]['urlname'];
        $data['itemLink'] ='http://'.DOMAIN.'/List/'.$urlname.'/blog/'.$item['Blog']['id'];
        $data['itemPubDate'] = date('D, d M Y H:i:s O', strtotime($item['Blog']['created']));        
//        $data['title'] = $item['Blog']['title'];
//        $data['description'] = $item['Blog']['catchcopy'];
        $_data[] = $data;
    }

return $_data;
    }
}
?>