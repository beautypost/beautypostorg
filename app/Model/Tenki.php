<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */



App::uses('Model', 'Model');

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 */
class Tenki extends AppModel {
    var $name = 'Tenki';

function getTenki($areaCode,$skinCode,$apiCode){

$serverId = 's054'; // サーバーID
$userDirectory = 'd679dcd0-8369f02b-b92e3c5d-70359b7a'; // ユーザーディレクトリ

$apis = array (
    '4' => array('label' => '乾燥肌注意報', 'directory' => 'daily-dry-comment', 'skin' => true, 'hair' => false),
    '6' => array('label' => '日焼け＆シミ', 'directory' => 'daily-sunburn-comment', 'skin' => true, 'hair' => false),
);

$skins = array (
    '1' => array('label' => '敏感肌'),
    '2' => array('label' => '乾燥肌'),
    '3' => array('label' => '脂性肌'),
    '4' => array('label' => '混合肌')
);


$apiDirectory = $apis[$apiCode]['directory'];
$uri = "http://{$serverId}.b-10.net/v1/{$userDirectory}/beauty/{$apiDirectory}/?area={$areaCode}";
$uri .= "&skin={$skinCode}";

var_dump($uri);

$dom = new DOMDocument();
$http = new HttpSample();
$http->setTimeout(7); // タイムアウトまでの時間を7秒にセット
$success = $http->get($uri);
if ($success) {
    $success = $dom->loadXml($http->getRawdata());
}

// レスポンスの表示
$comment = ''; // 予報コメント
$message = ''; // 予報コメントが利用できない場合の表示メッセージ
$commentAvailable = false; // 予報のコメントが利用できるか否か
if (!$success) {
    // リクエストに失敗した場合
    $statusCode = $http->getStatusCode();
    switch ($statusCode) {
        case 400:
        case 500: // APIリクエスト形式が正しくない、もしくはメンテナンス中
            break;
        default: // APIリクエスト形式以外の理由で
            break;
    }
    $message = '予報を取得できません。';
} else {
    // リクエストに成功した場合、コンテンツの取り出しを試みます。
    $xpath = new DOMXPath($dom);
    $queryForecasts = '/announce/forecast';
    $forecasts = $xpath->query($queryForecasts);
    if ($forecasts->length == 0) {
        // forecast要素がない場合
        $message = '予報は発表されていません。';
    } else {
        $forecast = $forecasts->item(0);
        // content 要素を検索
        $query = 'content';
        $result = $xpath->query($query, $forecast);
        if ($result->length == 0) {
        } else {
            $content = $result->item(0);
            // content 要素から comment要素（美容コメント）を取得
            $query = 'name';
            $result = $xpath->query($query, $content);
            $forecastName = $result->item(0)->textContent;
            $query = 'level';
            $result = $xpath->query($query, $content);
            $warnLevel = $result->item(0)->textContent;
            $warnLevelValue = $result->item(0)->getAttribute('value');
            $query = 'star';
            $result = $xpath->query($query, $content);
            $warnStar = $result->item(0)->textContent;
            $query = 'comment';
            $result = $xpath->query($query, $content);
            $comment = $result->item(0)->textContent;
            $commentAvailable = true;
        }
    }
}

$ret['comment'] = $comment;
$ret['level'] = $warnLevelValue;

return $ret;

}

}
