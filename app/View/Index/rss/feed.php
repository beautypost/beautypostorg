<?php
$channel = array (
    'title' => 'サイトの名前', //サイトの名前
    'link' => 'http://example.com/', //サイトURL
    'guid' => 'http://example.com/', //サイトURL
    'description' => 'フィードの説明' //フィードの説明
);
$this->set('channel',$channel);
echo $this->Rss->items($entries, 'transformRSS');

function transformRSS($entries) {
    return array(
        'title' => $entries['title'], //投稿のタイトル
        'link' => array('action' => 'view', $entries['itemLink']), //投稿の個別ページへのリンク先
        'guid' => array('action' => 'view', $entries['itemLink'), //投稿の個別ページへのリンク先
        'description' => $entries['description'], //投稿の本文
        'pubDate' => $entries['itemPubData'] //投稿日時
    );
}
?>