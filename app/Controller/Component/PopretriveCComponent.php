<?php
class Pop3Retrieve{
    private $connect;
 
    //接続
    function open($host, $user, $pass, $port=110){
        $this->connect = fsockopen( $host, $port, $err, $errno );
        if ( !$this->connect ) {
            return false;
        }
         
        fputs($this->connect, "USER {$user}\r\n");
        if(!$this->check_response()) return false;
 
        fputs($this->connect, "PASS {$pass}\r\n");
        if(!$this->check_response()) return false;
    }
     
    //レスポンスコード確認
    function check_response(){
        $buf = fgets($this->connect, 512);
        if( substr($buf, 0, 3) != '+OK' ) {
            return false;
        } else {
            return true;
        }
    }
 
    //メール数確認
    function status(){
        fputs($this->connect, "STAT\r\n");
         
        if( !$this->check_response() ) return false;
        $buf = fgets($this->connect, 512);
        sscanf($buf, '+OK %d %d', $num, $size);
         
        return $num;
    }
     
    //num番目のメールを受信
    function retrieve($num=1){
        $default_timeout = ini_get('default_socket_timeout');
        stream_set_timeout($this->connect, 3);
         
        fputs($this->connect, "RETR {$num}\r\n");
 
        if( !$this->check_response() ) return false;
         
        $data = "";
        $line = "";
         
        while ( !feof($this->connect) ) {
            $meta_data = stream_get_meta_data($this->connect);
            if($meta_data["timed_out"]) break;
             
            $line = fgets($this->connect);
            if($line === false || preg_match("/^\.\r\n/", $line)) break;
            $line = preg_replace("/^\.\./", ".", $line);
            $data .= $line;
        }
         
        stream_set_timeout($this->connect, $default_timeout);
         
        return $data;
    }
     
    //削除
    function delete($num=1){
        fputs($this->connect, "DELE {$num}\r\n");
 
        if( !$this->check_response() ) return false;
     
    }
 
    //終了
    function close(){
        fputs($this->connect, "QUIT\r\n");
        if( !$this->check_response() ) return false;
         
        fclose($this->connect);
    }
}