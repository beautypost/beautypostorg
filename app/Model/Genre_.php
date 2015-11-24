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
class Genre extends AppModel {
    var $name = 'Genre';
    var $useTable = false;    
    /**
    GENRETOP (アイテム一覧)　のTOPで表示されるアイテム
    単数
    **/
    public function getAllGenre() {
        return $this->Genre();
    }

    /**
    id sequence
    name genreメニュー　breadcrmbs で利用
    icon  genreメニュー　breadcrmbs で利用
    children 子供がいる場合にid を配列で記載
    comment TOPページ・listページで利用
    **/
    public function Genre(){
         $genre[1] = array('id'=>1,'name'=>'法人設立代行','icon'=>'agent.png" alt="法人設立代行','title'=>'法人設立代行','children'=>false,'comment'=>'会社設立の第一歩。会社設立には、多くの手続きや準備が必要です。最適な法人設立代行選びで、スムーズに会社設立をしましょう。設立前の相談から設立後のアフターサポートまで、法人設立代行を比較。');
        $genre[2] = array('id'=>2,'name'=>'オフィス用品','icon'=>'pen.png" alt="オフィス用品','title'=>'オフィス用品','children'=>array(23,24),'comment'=>'文具やOA・PC用品、オフィス家具などの業務に欠かすことのできないオフィス用品。価格だけでなく、納期やデザイン、品揃えなどでオフィス用品販売サービスを比較。');
        $genre[3] = array('id'=>3,'name'=>'バーチャルオフィス','icon'=>'v-office.png" alt="バーチャルオフィス','title'=>'会社名','children'=>false,'comment'=>'会社運営において、最低限必要となる住所や電話番号などをレンタルすることが可能。都心に住所を置くことで、取引先の信頼を得ることが見込めます。立地や手厚いサービスなどでバーチャルオフィスを比較。');
        $genre[4] = array('id'=>4,'name'=>'ハンコ','icon'=>'stamp.png" alt="ハンコ','title'=>'会社名','children'=>false,'comment'=>'会社設立時に必要な代表者印をはじめ、口座開設に用いる銀行印や業務上で頻繁に使用する角印や会社印など、会社で必要となる印鑑を価格や品質などから比較。');
        $genre[5] = array('id'=>5,'name'=>'名刺','icon'=>'businesscard.png" alt="名刺','title'=>'会社名','children'=>false,'comment'=>'ビジネスをする上で必要となるのが名刺。名刺によって、会社のイメージは左右されるので、慎重に選びましょう。価格や納期だけでなく、紙の種類から、名刺作成サービスを比較。');
        $genre[6] = array('id'=>6,'name'=>'印刷','icon'=>'print.png" alt="印刷','title'=>'会社名','children'=>false,'comment'=>'販促や宣伝広告などに使用するチラシやポスター、商品やサービスを魅力的に伝える冊子やカタログ、フライヤー、スマホケースなどの販促グッズもビジネスで欠かせないアイテムです。納期や品質、価格などから印鑑会社を比較。');                
        $genre[8] = array('id'=>8,'name'=>'プロバイダ','icon'=>'provider.png" alt="プロバイダ','title'=>'会社名','children'=>false,'comment'=>'情報共有や情報発信が行われるネット社会。社内において、はやめのネット環境構築が重要です。最適なプロバイダ選びで、インターネット接続をしましょう。インターネット速度や安定性などから、プロバイダを比較。');
        $genre[9] = array('id'=>9,'name'=>'ビジネスフォン','icon'=>'businessphone.png" alt="ビジネスフォン','title'=>'会社名','children'=>false,'comment'=>'外線と内線の共有、保留転送など、多くの機能を備えるビジネスフォン。効率的なビジネスのためにはインフラを整えることが重要です。ビジネスフォン設置実績や業務改善のトータルソリューションからビジネスフォン設置業者を比較。');                
        $genre[10] = array('id'=>10,'name'=>'ドメイン','icon'=>'domain.png" alt="ドメイン','title'=>'会社名','children'=>false,'comment'=>'インターネット上の「住所」と言われるドメイン。会社のホームページのURLやメールアドレスなどに使用されます。取得したドメインで会社のイメージや信用度が変わることも。ドメインの種類や管理のしやすさなどから、ドメイン取得業者を比較。');
        $genre[11] = array('id'=>11,'name'=>'レンタルサーバー','icon'=>'rental-server.png" alt="レンタルサーバー','title'=>'会社名','children'=>false,'comment'=>'会社のホームページの規模や運営するサイトによって、選び方が変わるのがレンタルサーバー。最適なレンタルサーバー選びはコストパフォーマンスやサイトパフォーマンスを上げ、コンバージョン率(成約率)を最大化する要因となります。価格や管理のしやすさなどから、レンタルサーバーを比較。');
        $genre[12] = array('id'=>12,'name'=>'ショッピングカート','icon'=>'cart.png" alt="ショッピングカート','title'=>'会社名','children'=>false,'comment'=>'インターネット上で商品やサービスの販売と購入ができるネットショッピング。時間や立地条件に左右されることなく、商材をPRすることができます。価格や導入店舗数、操作性などからショッピングカートのASPを比較。');                
        $genre[17] = array('id'=>17,'name'=>'クラウドソーシング','icon'=>'crowdsourcing.png" alt="クラウドソーシング','title'=>'会社名','children'=>false,'comment'=>'スタートアップの会社は人材の確保が困難。インターネット上で業務の委託をするクラウドソーシングを利用することで、そのときに必要な人材を確保することが可能です。納品物のクオリティや納品スピードなどから、クラウドソーシングサービスを比較。');        
        $genre[14] = array('id'=>14,'name'=>'ソフトウェア','icon'=>'software.png" alt="ソフトウェア','title'=>'会社名','children'=>array(15,16,18),'comment'=>'会社の情報をウィルスやスパムの危険から守るセキュリティソフトと会計管理や経理業務をサポートする会計ソフト、会社で欠かせない必要なソフトウェアを比較。');
        $genre[15] = array('id'=>15,'name'=>'セキュリティソフト','icon'=>'security.png" alt="セキュリティソフト','title'=>'会社名','children'=>false,'comment'=>'情報は会社の大切な財産。複雑化する情報社会の中で、大切な情報を守るのは会社の義務です。多様化するウィルスやスパムから、情報を守るセキュリティソフトを比較。');                
        $genre[16] = array('id'=>16,'name'=>'会計ソフト','icon'=>'account.png" alt="会計ソフト','title'=>'会社名','children'=>false,'comment'=>'会社の規模や業種、業態に関わらず、どの会社でも必要となるのが会計。最適な会計ソフト選びで、業務効率を上げていきましょう。操作性や価格、サポートから会計ソフトを比較。');
        $genre[18] = array('id'=>18,'name'=>'オフィスソフト','icon'=>'officesoft.png" alt="オフィスソフト','title'=>'ソフト名','children'=>false,'comment'=>'オフィスでの仕事をサポートしてくれるオフィスソフト。オフィスソフトはワープロや表計算、プレゼンテーションツールからデータベースソフトまで多岐にわたります。使いやすさや価格から、オフィスでの仕事に欠かせないオフィスソフトを比較。');                     
        $genre[19] = array('id'=>19,'name'=>'銀行','icon'=>'bank.png" alt="銀行','title'=>'銀行名','children'=>array(20,21),'comment'=>'会社設立に際し、法人口座の開設は欠かせません。設立後も、振込や入出金など、頻繁に利用することになりますので、最も適した銀行で口座開設をしましょう。都市銀行とネット銀行の2種類から、銀行を比較。');
        $genre[20] = array('id'=>20,'name'=>'都市銀行','icon'=>'city-bank.png" alt="都市銀行','title'=>'銀行名','children'=>false,'comment'=>'都市銀行は全国的に展開していることから、利便性が高く、都市銀行で法人口座を開設することにより、取引会社からの信頼を獲得することができます。口座開設のわかりやすさや月額基本料などのコストから都市銀行を比較。');
        $genre[21] = array('id'=>21,'name'=>'ネット銀行','icon'=>'netbank.png" alt="ネット銀行','title'=>'銀行名','children'=>false,'comment'=>'ネット銀行は都市銀行や地方銀行のように店舗などがないため、振込手数料が安く、24時間いつでも決済することができます。口座開設のわかりやすさや利便性などからネット銀行を比較。');
        $genre[22] = array('id'=>22,'name'=>'法人クレジットカード','icon'=>'creditcard.png" alt="法人クレジットカード','title'=>'会社名','children'=>false,'comment'=>'ネット上での決済や消耗品の購入、雑費に利用すると便利なクレジットカード。法人クレジットカードをつくることにより、現金出納が楽になったり、引き落とし時期が遅れてくるのでキャッシュフローに余裕が生まれるなど、メリットがあります。カード発行の容易さや年会費などから法人クレジットカードを比較。');

        $genre[23] = array('id'=>23,'name'=>'OA・全般','icon'=>'pen.png','title'=>'','children'=>false,'comment'=>'文具やOA・PC用品、パーティションや書棚などのオフィス家具。業務に欠かすことのできないオフィス用品。価格だけでなく、納期やデザイン、品揃えなどでオフィス用品販売サービスを比較');                        
        $genre[24] = array('id'=>24,'name'=>'PC・直販','icon'=>'pen.png','title'=>'','children'=>false,'comment'=>'メーカー直販ならではの価格と品揃え。アウトレット商品や期間限定商品など、今まで欲しかったPCを手に入れるチャンス。法人契約によるボリュームディスカウントなど価格と性能でも比較');
//        $genre[25] = array('id'=>25,'name'=>'','icon'=>'fa-tachometer','title'=>'','children'=>false,'comment'=>'');                        
//        $genre[26] = array('id'=>26,'name'=>'','icon'=>'fa-tachometer','title'=>'','children'=>false,'comment'=>'');                        
//        $genre[27] = array('id'=>27,'name'=>'','icon'=>'fa-tachometer','title'=>'','children'=>false,'comment'=>'');                        

        return $genre;
    }


    /**
    親は多次元になっている子どもたちをすべて一元的に指定する
    **/
    public function GenreChild(){
        $genre = array();
        $genre[14] = array(15,16,18);
        $genre[19] = array(20,21);
        $genre[2]  = array(23,24);
//        $genre[13] = array(17,18,19,20,21,22,23,24,25,26);
        return $genre;
    }


    /**
    一覧画面で各タイトルごとのtooltipで表示される内容
    **/
    public function GenreTitle(){
        $genre[1] = array(
                1=>array('title'=>'満足度','comment'=>'ビズランユーザーのみが5段階評価でレビューした総合的な評価です。'),
                2=>array('title'=>'設立前の相談','comment'=>'会社設立に関する疑問などの相談サポートについての評価です'),
                3=>array('title'=>'スムーズな手続き','comment'=>'会社設立に必要な手続きをスムーズに行えたかの評価です'),
                4=>array('title'=>'価格','comment'=>'価格設定についての評価です。'),
                5=>array('title'=>'設立後のサポート','comment'=>'会社設立後の各種必要手続きなどのサポートについての評価です。'),
                );
        $genre[2] = array(
                1=>array('title'=>'満足度','comment'=>'ビズランユーザーのみが5段階評価でレビューした総合的な評価です。'),
                2=>array('title'=>'品揃え','comment'=>'品揃えについての評価です。'),
                3=>array('title'=>'デザイン','comment'=>'デザイン性についての評価です。'),
                4=>array('title'=>'配送スピード','comment'=>'注文から商品到着までのスピードについての評価です。'),
                5=>array('title'=>'価格','comment'=>'価格設定についての評価です。')
                );
        $genre[3] = array(
                1=>array('title'=>'満足度','comment'=>'ビズランユーザーのみが5段階評価でレビューした総合的な評価です。'),
                2=>array('title'=>'内見・事前相談','comment'=>'内見・事前相談の内容についての評価です。'),
                3=>array('title'=>'ロケーション','comment'=>'バーチャルオフィスの立地条件における評価です。'),
                4=>array('title'=>'価格','comment'=>'価格設定についての評価です。'),
                5=>array('title'=>'サポート','comment'=>'サポートについての評価です。')
                );
        $genre[4] = array(
                1=>array('title'=>'満足度','comment'=>'ビズランユーザーのみが5段階評価でレビューした総合的な評価です。'),
                2=>array('title'=>'品揃え','comment'=>'印材の種類や扱う印鑑の種類についての評価です。'),
                3=>array('title'=>'納期','comment'=>'注文から到着までの速さについての評価です。'),
                4=>array('title'=>'品質','comment'=>'納品物の品質についての評価です。'),
                5=>array('title'=>'価格','comment'=>'価格設定についての評価です。'),
                );
        $genre[5] = array(
                1=>array('title'=>'満足度','comment'=>'ビズランユーザーのみが5段階評価でレビューした総合的な評価です。'),
                2=>array('title'=>'入稿方法のわかりやすさ','comment'=>'入稿ファイル形式の種類の豊富さやスムーズに入稿することができたかの評価です。'),
                3=>array('title'=>'納期','comment'=>'注文から納品物到着までの速さについての評価です。'),
                4=>array('title'=>'印刷品質','comment'=>'名刺の品質の評価です。'),
                5=>array('title'=>'価格','comment'=>'価格設定についての評価です。')
                );
        $genre[6] = array(
                1=>array('title'=>'満足度','comment'=>'ビズランユーザーのみが5段階評価でレビューした総合的な評価です。'),
                2=>array('title'=>'入稿方法のわかりやすさ','comment'=>'入稿ファイル形式の種類の豊富さやスムーズに入稿することができたかの評価です。'),
                3=>array('title'=>'納期','comment'=>'注文から納品物到着までの速さについての評価です。'),
                4=>array('title'=>'印刷品質','comment'=>'印刷物の品質の評価です。'),
                5=>array('title'=>'価格','comment'=>'価格設定についての評価です。')
                );
        $genre[7] = array(
                1=>array('title'=>'','comment'=>''),
                2=>array('title'=>'','comment'=>''),
                3=>array('title'=>'','comment'=>''),
                4=>array('title'=>'','comment'=>''),
                5=>array('title'=>'','comment'=>'')
                );
        $genre[8] = array(
                1=>array('title'=>'満足度','comment'=>'ビズランユーザーのみが5段階評価でレビューした総合的な評価です。'),
                2=>array('title'=>'利用開始までのスピード','comment'=>'インターネット接続までの速さについての評価です。'),
                3=>array('title'=>'回線速度','comment'=>'回線速度についての評価です。'),
                4=>array('title'=>'安定性','comment'=>'ネット回線が途切れないことや速度の安定性についての評価です。'),
                5=>array('title'=>'価格','comment'=>'価格設定についての評価です。')
                );
        $genre[9] = array(
                1=>array('title'=>'満足度','comment'=>'ビズランユーザーのみが5段階評価でレビューした総合的な評価です。'),
                2=>array('title'=>'導入相談','comment'=>'導入に伴う設計や提案内容、工事前打ち合わせを含め、社内のOA機器に関することの相談などについての評価です。'),
                3=>array('title'=>'利用開始までのスピード','comment'=>'ビジネスフォンを利用することができるまでの速さについての評価です。'),
                4=>array('title'=>'動作確認','comment'=>'電話機器の説明や希望通りに使用することができたかについての評価です。'),
                5=>array('title'=>'価格','comment'=>'価格設定についての評価です。')
                );
        $genre[10] = array(
                1=>array('title'=>'満足度','comment'=>'ビズランユーザーのみが5段階評価でレビューした総合的な評価です。'),
                2=>array('title'=>'取得までの手順','comment'=>'ドメイン取得までスムーズに行うことができたかについての評価です。'),
                3=>array('title'=>'設定マニュアルのわかりやすさ','comment'=>'DNS設定や移管したドメインの設定などのわかりやすさについての評価です。'),
                4=>array('title'=>'管理画面の使いやすさ','comment'=>'DNS設定やマルチドメイン設定などの使いやすさについての評価です。'),
                5=>array('title'=>'価格','comment'=>'価格設定についての評価です。')
                );
        $genre[11] = array(
                1=>array('title'=>'満足度','comment'=>'ビズランユーザーのみが5段階評価でレビューした総合的な評価です。'),
                2=>array('title'=>'安定性','comment'=>'サイトの表示速度など、データの返送時間やデータアップロード時間についての評価です。'),
                3=>array('title'=>'機能の豊富さ','comment'=>'MySQLなどのデータベースやPHPなどのCGI、メーラーなどの機能についての評価です。'),
                4=>array('title'=>'管理画面の使いやすさ','comment'=>'管理画面を利用するのにわかりやすく、使いこなすことができるか'),
                5=>array('title'=>'価格','comment'=>'価格設定についての評価です。')
                );
        $genre[12] = array(
                1=>array('title'=>'満足度','comment'=>'ビズランユーザーのみが5段階評価でレビューした総合的な評価です。'),
                2=>array('title'=>'使いやすさ','comment'=>'画像の設定や支払い設定など、ネットショップ開業までスムーズに行えたかについての評価です。'),
                3=>array('title'=>'機能の豊富さ','comment'=>'アクセス解析や独自ドメイン対応、クレジットカード決済などの機能についての評価です。'),
                4=>array('title'=>'安定性','comment'=>'商品の表示速度やデータベースエラーなどが生じないかについての評価です。'),
                5=>array('title'=>'価格','comment'=>'価格設定についての評価です。')
                );
        $genre[17] = array(
                1=>array('title'=>'満足度','comment'=>'ビズランユーザーのみが5段階評価でレビューした総合的な評価です。'),
                2=>array('title'=>'クオリティ','comment'=>'制作物や納品物の品質についての評価です。'),
                3=>array('title'=>'スピード','comment'=>'発注から納品までの速さについての評価です。'),
                4=>array('title'=>'使いやすさ','comment'=>'発注から納品、支払いまでスムーズに行うことができたかについての評価です。'),
                5=>array('title'=>'価格','comment'=>'価格設定についての評価です。')
                );
        $genre[14] = array(
                1=>array('title'=>'','comment'=>''),
                2=>array('title'=>'','comment'=>''),
                3=>array('title'=>'','comment'=>''),
                4=>array('title'=>'','comment'=>''),
                5=>array('title'=>'','comment'=>'')
                );
        $genre[15] = array(
                1=>array('title'=>'満足度','comment'=>'ビズランユーザーのみが5段階評価でレビューした総合的な評価です。'),
                2=>array('title'=>'検出率','comment'=>'ウィルスやスパムの検出率についての評価です。'),
                3=>array('title'=>'軽さ','comment'=>'パソコンの起動やソフトウェアなどの立ち上げに時間がかからないかについての評価です。'),
                4=>array('title'=>'操作性','comment'=>'管理画面の見やすさや使いやすさについての評価です。'),
                5=>array('title'=>'価格','comment'=>'価格設定についての評価です。'),
                );
        $genre[16] = array(
                1=>array('title'=>'満足度','comment'=>'ビズランユーザーのみが5段階評価でレビューした総合的な評価です。'),
                2=>array('title'=>'機能性','comment'=>'会計ソフトに搭載された機能についての評価です。'),
                3=>array('title'=>'使いやすさ','comment'=>'機能を使いこなせるなど、会計ソフトの使いやすさについての評価です。'),
                4=>array('title'=>'価格','comment'=>'価格設定についての評価です。'),
                5=>array('title'=>'サポート','comment'=>'電話、メールなどのサポートについての評価です。')
                );
        $genre[18] = array(
                1=>array('title'=>'満足度','comment'=>'ビズランユーザーのみが5段階評価でレビューした総合的な評価です。'),
                2=>array('title'=>'使いやすさ','comment'=>'機能メニューのわかりやすさや使いやすさについての評価です。'),
                3=>array('title'=>'軽さ','comment'=>'パソコンの起動やソフトウェアなどの立ち上げに時間がかからないかについての評価です。'),
                4=>array('title'=>'互換性','comment'=>'他のオフィスソフトの互換性の高さについての評価です。'),
                5=>array('title'=>'価格','comment'=>'価格設定についての評価です。')
                );
        $genre[19] = array(
                1=>array('title'=>'','comment'=>''),
                2=>array('title'=>'','comment'=>''),
                3=>array('title'=>'','comment'=>''),
                4=>array('title'=>'','comment'=>''),
                5=>array('title'=>'','comment'=>'')
                );
        $genre[20] = array(
                1=>array('title'=>'満足度','comment'=>'ビズランユーザーのみが5段階評価でレビューした総合的な評価です。'),
                2=>array('title'=>'口座開設のスムーズさ','comment'=>'法人口座を開設する際に必要な書類や手続き、開設までの期間などの評価です。'),
                3=>array('title'=>'コスト','comment'=>'月額基本料と振込手数料など、口座利用にかかる費用についての評価です。'),
                4=>array('title'=>'利便性','comment'=>'入出金や振込、ATM利用や利用可能時間など、使いやすさについての評価です。'),
                5=>array('title'=>'サポート','comment'=>'法人口座開設後のサポート(融資やキャンペーンに関するお知らせ等)についての評価です。')
                );
        $genre[21] = array(
                1=>array('title'=>'満足度','comment'=>'ビズランユーザーのみが5段階評価でレビューした総合的な評価です。'),
                2=>array('title'=>'口座開設のスムーズさ','comment'=>'法人口座を開設する際に必要な書類や手続き、開設までの期間などの評価です。'),
                3=>array('title'=>'コスト','comment'=>'月額基本料と振込手数料など、口座利用にかかる費用についての評価です。'),
                4=>array('title'=>'利便性','comment'=>'入出金や振込、ATM利用など、使いやすさについての評価です。'),
                5=>array('title'=>'サポート','comment'=>'法人口座開設後のサポートについての評価です。')
                );
        $genre[22] = array(
                1=>array('title'=>'満足度','comment'=>'ビズランユーザーのみが5段階評価でレビューした総合的な評価です。'),
                2=>array('title'=>'年会費','comment'=>'クレジットカードの年会費についての評価です。'),
                3=>array('title'=>'利便性','comment'=>'利用可能条件など、クレジットカードの使いやすさについての評価です。'),
                4=>array('title'=>'特典の充実度','comment'=>'ポイント還元率など、特典の充実度についての評価です。'),
                5=>array('title'=>'サポート','comment'=>'カード発行の必要条件など、カード発行の難易度についての評価です。')
                );
        $genre[23] = array(
                1=>array('title'=>'満足度','comment'=>'ビズランユーザーのみが5段階評価でレビューした総合的な評価です。'),
                2=>array('title'=>'品揃え','comment'=>'品揃えについての評価です。'),
                3=>array('title'=>'デザイン','comment'=>'デザイン性についての評価です。'),
                4=>array('title'=>'配送スピード','comment'=>'注文から商品到着までのスピードについての評価です。'),
                5=>array('title'=>'価格','comment'=>'価格設定についての評価です。')
                );
        $genre[24] = array(
                1=>array('title'=>'満足度','comment'=>'ビズランユーザーのみが5段階評価でレビューした総合的な評価です。'),
                2=>array('title'=>'品揃え','comment'=>'品揃えについての評価です。'),
                3=>array('title'=>'デザイン','comment'=>'デザイン性についての評価です。'),
                4=>array('title'=>'配送スピード','comment'=>'注文から商品到着までのスピードについての評価です。'),
                5=>array('title'=>'価格','comment'=>'価格設定についての評価です。')
                );        
        return $genre;                                          
    }



    /**
    StaticPage(global navi に載せないpageのリストを作成)
    **/
    public function GenreStatic(){
        $genre = array();
        $genre[101] = array('pagename'=>'pages/privacy','id'=>101,'name'=>'プライバシーポリシー','icon'=>'fa fa-file-text','children'=>false,'comment'=>'プライバシー');
        $genre[102] = array('pagename'=>'pages/about','id'=>102,'name'=>'ビズランについて','icon'=>'fa fa-check-square-o','children'=>false,'comment'=>ABOUTPAGEDESCRIPTION,'keywords'=>ABOUTPAGEKEYWORDS);
        $genre[103] = array('pagename'=>'pages/faq','id'=>103,'name'=>'よくあるご質問','icon'=>'glyphicon glyphicon-question-sign','children'=>false,'comment'=>FAQPAGEDESCRIPTION,'keywords'=>FAQPAGEKEYWORDS);
        $genre[107] = array('pagename'=>'pages/company','id'=>107,'name'=>'運営者概要','icon'=>'glyphicon glyphicon-question-sign','children'=>false,'comment'=>COMPANYPAGEDESCRIPTION,'keywords'=>COMPANYPAGEKEYWORDS);        
        $genre[104] = array('pagename'=>'contact','id'=>104,'name'=>'お問い合わせ','icon'=>'fa fa-envelope-o','children'=>false,'comment'=>CONTACTPAGEDESCRIPTION,'keywords'=>CONTACTPAGEKEYWORDS);
        $genre[105] = array('pagename'=>'mypage','id'=>105,'name'=>'マイページ','icon'=>'fa fa-user','children'=>false,'comment'=>'マイページ');        
        $genre[106] = array('pagename'=>'Fbconnect','id'=>106,'name'=>'Facebookログイン','icon'=>'fa fa-facebook-square','children'=>false,'comment'=>FACEBOOKPAGEDESCRIPTION,'keywords'=>FACEBOOKPAGEKEYWORDS);
        return $genre;
    }


    /**
    GenreID を元にGenreデータを取得
    **/
    public function getGenreByGenreID($id){
        $all = $this->Genre();
        return $all[$id];
    }



    /**
    genreIDを元にGenreTitleを取得
    List画面で、各項目titleを表示する
    **/
    public function getGenreTitleByGenreID($genreID){
        $genreID = isset($genreID)? $genreID : DEFAULTGENRE;
        $genre = $this->GenreTitle();
        return $genre[$genreID];
    }

    /**
    genreIDを元にGenreTitleを取得
    List画面で、各項目titleを表示する
    **/
    public function getGenreIDByUrlName($urlname){
        $genres = $this->Genre();

        foreach($genres as $genre){
            if($genre['name'] == $urlname){
                return $genre['id'];
            }
        }

        return DEFAULTGENRE;
    }

    /**
    staticページ(genreに属さないページの一覧を取得)
    **/
    public function getAllStaticGenre(){
        return $this->GenreStatic();
    }

    /**
    staticページの情報をGenreIDを用い取得
    **/
    public function getStatigGenreByGenreID($genreID){
        $genre = $this->GenreStatic();
        return isset($genre[$genreID]) ? $genre[$genreID] : null;
    }

    /**
    staticページの情報をpagenameを用い取得
    **/
    public function getGenreIDByPageName($pagename){
        $genres = $this->GenreStatic();
        foreach($genres as $genre){
            if($genre['pagename'] == $pagename){
                return $genre['id'];
            }
        }
        return null;
    }


}
