<?php

$uri = 'http://s054.b-10.net.b-10.net/v1/d679dcd0-8369f02b-b92e3c5d-70359b7a/beauty/daily-hairstyle-comment/?area=43';

$http = new HttpSample();
$http->setTimeout(7); // タイムアウトまでの時間を7秒にセット
$success = $http->get($uri);
if ($success) {
    $success = $dom->loadXml($http->getRawdata());
}

var_dump($success);

/**
 * HTTP通信のためのサンプルクラス。
 * タイムアウトまでの秒数を設定したHTTP通信を行うためのサンプルクラスです。
 * モジュール libcurl を要求します。
 * @author Craid Co.Ltd.
 */
class HttpSample {

    /**
     * @var $timeout int
     */
    private $timeout = 10;

    /**
     * @var $rawdata string
     */
    private $rawdata = null;

    /**
     * @var $statusCode int
     */
    private $statusCode = null;

    /**
     * タイムアウトまでの秒数をセットする。
     * @param int $value
     */
    public function setTimeout ($value) {
        $this->timeout = $value;
    }

    /**
     * getメソッド後のレスポンスを取得する。
     * @return string
     */
    public function getRawdata() {
        return $this->rawdata;
    }

    /**
     * getメソッド後のHTTPステータスコードを取得する。
     * @return int
     */
    public function getStatusCode() {
        return $this->statusCode;
    }


    /**
     * GETリクエストを送り、レスポンスをロードする。
     * @param string $url
     * @return boolean 成功時 true、それ以外(通信エラー、タイムアウト、HTTPステータスコードが400以上の場合も)は false
     */
    public function get($url) {
        $this->statusCode = null;

        // 通信の設定
        $ch = curl_init();                                 // 初期化
        curl_setopt($ch, CURLOPT_URL, $url);               // URLをセットする。
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);          // HTTPステータスコードが400以上の場合、エラーと判断させる。
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout); // タイムアウトまでの秒数をセットする。
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);       // レスポンスをすぐ出力させず、文字列として返させる。
        curl_setopt($ch, CURLOPT_HEADER, 0);               // 出力にヘッダーを含めない。
        // 通信の実行
        $this->rawdata = curl_exec($ch);                          // レスポンスデータを格納する。
        $curlErrno = curl_errno($ch);                             // エラーコードを取得する。
        $this->statusCode = curl_getinfo($ch,CURLINFO_HTTP_CODE); // HTTPステータスコードを格納する。
        // 通信の破棄
        curl_close($ch);

        if ($curlErrno) {
            return false; // エラーコードがあれば失敗
        } else {
            return true;  // エラーコードがなければ成功
        }
    }

}


?>