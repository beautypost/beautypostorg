<?php

App::uses('Component', 'Controller');

class BlogCComponent extends Component {
    var $components = array('RequestHandler');
    var $pattern = '[1-9]?[0-9][0-9]';

   public function initialize(Controller $controller) {
        $this->controller = $controller;
    }
 
    public function getItemByID($id) {
        return $this->controller->Item->getItemByID($val);
    }


    public function replaceItemTag($data){
        $match = array();

        //ローカル限定　/assets からはじまったら WEBROOT をつける
        if($_SERVER["HTTP_HOST"] == 'localhost'){        
            $data =  preg_replace("/\/assets\//",WEBROOT.'assets/',$data);
        }



        preg_match_all("/(<$this->pattern>)/",$data,$match);

        //var_dump($match);


        $rd_value = array();
        $rd_pattern = array();
        
        foreach($match[0] as $key => $value){
            $rd_value[] ="/".$value."/";

        //var_dump($value);
            preg_match("/($this->pattern)/",$value,$_match);
            $val = $_match[0];
            $_val = '';
            $fields = array('id','name','title');
            $item = $this->controller->Item->getItemByID($val,$fields);
            if($this->RequestHandler->isMobile()){
                $_val ='<div class="site">';
                $_val .= '    <a href="'.WEBROOT.'Item/?itemID='.$item['Item']['id'].'" target="item'.$item['Item']['id'].'">';
                $_val .= '    <img class="img-responsive img-thumbnail" src="'.WEBROOT.'assets/img/screenshot/org/sc_'.$item['Item']['id'].'.png" alt="'.$item['Item']['name'].'"></a>';
                $_val .= '    <a href="'.WEBROOT.'Item/?itemID='.$item['Item']['id'].'" target="item'.$item['Item']['id'].'">'.$item['Item']['name'].'</a><br />';
                $_val .=     $item['Item']['title'];
                $_val .='</div>';
            }else{
                $_val ='<div class="site">';
                $_val .= '    <p><a href="'.WEBROOT.'Item/?itemID='.$item['Item']['id'].'" target="item'.$item['Item']['id'].'">';
                $_val .= '    <img class="sg-mr img-responsive img-thumbnail" src="'.WEBROOT.'assets/img/screenshot/org/sc_'.$item['Item']['id'].'.png" alt="'.$item['Item']['name'].'"></a></p>';
                $_val .= '    <p><a href="'.WEBROOT.'Item/?itemID='.$item['Item']['id'].'" target="item'.$item['Item']['id'].'">'.$item['Item']['name'].'</a><br />';
                $_val .=     $item['Item']['title'];
                $_val .='</p></div>';

            }


// $_val = '<div class="col-xs-12 kz-blog-list">';
// $_val .= '  <div class="col-sm-3 col-xs-4 kz-col-clear">';
// $_val .= '    <a href="'.WEBROOT.'Item/?itemID='.$item['Item']['id'].'" target="item'.$item['Item']['id'].'">';
// $_val .= '    <img src="'.WEBROOT.'assets/img/screenshot/sc_'.$item['Item']['id'].'.png" class="img-responsive img-thumbnail" alt="'.$item['Item']['name'].'"></a>';
// $_val .= '  </div>';
// $_val .= '  <div class="col-sm-9 col-xs-8 kz-col-r">';
// $_val .= '    <div class="col-xs-12 kz-col-r">';
// $_val .= '      <a href="'.WEBROOT.'Item/?itemID='.$item['Item']['id'].'" target="item'.$item['Item']['id'].'">'.$item['Item']['name'].'</a>';
// $_val .= '      <div class="kz-list-copy">'.$item['Item']['title'].'</div>';
// $_val .= '    </div>';
// $_val .= '  </div>';
// $_val .= '</div>';

            $rd_pattern[] = $_val;
        }

        $_data = preg_replace($rd_value,$rd_pattern,$data);


    return $_data;

    }

    public function getItemLinks($data){
        $match = array();
        preg_match_all("/<($this->pattern)>/",$data,$match);
        return $match[1];
    }


    public function getFeedItemTag($data){
        $match = array();
        $pattern = '/\<img src\=\"\/assets\/img\/blog\/[a-z0-9]+\.png\".*\>/';
        $_data =  preg_replace($pattern,'',$data);
        $ret = preg_replace("/<($this->pattern)>/",'',$_data);

        return $ret;
    }


    public function sendPing(){

$pingserver =array();

$pingserver[] = array('blog.with2.net','/ping.php/');
$pingserver[] = array('blogsearch.google.co.jp','/ping/RPC2');
$pingserver[] = array('blogsearch.google.com','/ping/RPC2');
//$pingserver[] = array('hamham.info','/blog/xmlrpc/');
$pingserver[] = array('ping.bloggers.jp','/rpc/');
$pingserver[] = array('ping.blogranking.net','/');
//$pingserver[] = array('ping.cocolog-nifty.com','/xmlrpc');
//$pingserver[] = array('ping.exblog.jp','/xmlrpc');
$pingserver[] = array('ping.fc2.com','/');
$pingserver[] = array('ping.feedburner.com','');
$pingserver[] = array('ping.freeblogranking.com','/xmlrpc/');
//$pingserver[] = array('ping.rootblog.com','/rpc.php');
$pingserver[] = array('ping.rss.drecom.jp','/');
//$pingserver[] = array('ping.sitecms.net','');
$pingserver[] = array('pingoo.jp','/ping/');
$pingserver[] = array('ranking.kuruten.jp','/ping');
//$pingserver[] = array('rpc.blogrolling.com','/pinger/');
$pingserver[] = array('rpc.pingomatic.com','/');
$pingserver[] = array('rpc.weblogs.com','/RPC2');
//$pingserver[] = array('serenebach.net','/rep.cgi');
//$pingserver[] = array('taichistereo.net','/xmlrpc/');
$pingserver[] = array('www.bloglines.com','/ping');
$pingserver[] = array('www.i-learn.jp','/ping/');
$pingserver[] = array('xping.pubsub.com','/ping/');

$r = '<?xml version="1.0" encoding="UTF-8"?>';
$r .='<methodCall>';
$r .='<methodName>weblogUpdates.ping</methodName>';
$r .='<params>';
$r .='<param><value>'.INDEXPAGETITLE.'</value></param>';
$r .='<param><value>'.DOMAIN.'</value></param>';
$r .='</params>';
$r .='</methodCall>';

foreach ($pingserver as $server){
    $ret =$this->send_socket($server[0],'80',$server[1],$r);
    echo $server[0].'<textarea>'.$ret.'</textarea><hr>';
}

    }


//送信関数
function send_socket($host, $port, $path, $param){ 
    $data = '';
    $sock = fsockopen($host, $port);
    $request = "POST " . $path . " HTTP/1.1\r\n"
        . "Host: " . $host . "\r\n"
        . "Content-Type: application/x-www-form-urlencoded\r\n"
        . "Content-Length: " . strlen($param) . "\r\n"
        . "User-Agent: MSIE7.0\r\n"
        . "Connection: Close\r\n"
        . "\r\n"
        .  $param . "\r\n";
    if(!$sock){
        $data = 'socket error：' . $host;
    }else{
        fputs($sock, $request);
        while(!feof($sock)){
            $data .= fgets($sock);
        }
        fclose($sock);
    }
    return $data;
}

}
?>