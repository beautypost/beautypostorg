<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppHelper', 'View/Helper');


/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class BeautypostHelper extends AppHelper {

var $helpers = array('Useful');

function rvtreeViews($genreID,$genre,$all,&$add,$f,&$allchild,$UserData){

	if($f){
		echo '<ul class="submenu">'."\n";
	}
	foreach($genre as $g){
		if(!in_array($g['id'],$add)){

			if($genreID == $g['id']){
				echo '<li class="active">'."\n";
			}else{
				//自分の子供達を取得する
				if(array_key_exists($g['id'],$allchild)){
					if(in_array($genreID,$allchild[$g['id']])){
						echo '<li class="active open hsub">'."\n";
					}else{
						echo '<li>'."\n";
					}
				}else{
					echo '<li>'."\n";
				}


			}
			$add[] = $g['id'];

		$ret = array();
		if($g['children']){

			echo '<a href="#" class="dropdown-toggle">'."\n";
			echo '<img src="'.WEBROOT.'assets/img/genre/'.$g['icon'].'" alt="'.$g['name'].'">'."\n";
			echo $g['name']."\n";
			echo '<b class="arrow fa fa-angle-down"></b>'."\n";
			echo '</a>'."\n";


			foreach($g['children'] as $gg){
				$ret[$gg] = $all[$gg];
			}

			$this->rvtreeViews($genreID,$ret,$all,$add,true,$allchild,$UserData);
		}else{


			echo '<a href="'.WEBROOT.'List/'.$g['urlname'].'">';
			echo '<img src="'.WEBROOT.'assets/img/genre/'.$g['icon'].'" alt="'.$g['name'].'">';
			echo $g['name'];
		    echo $this->Useful->CheckAdminID($UserData['id']) ? '['.$g['id'].']':'';
			echo '</a>'."\n";


			echo '</li>'."\n";
		}
				}
	}

	if($f){echo '</ul></li>';}

	return;
	}

	function cssActive($name){
		if(strcasecmp($this->params['controller'],$name) == 0){
			echo 'active';
		}
		return;
	}

	function checkParent($genres,$genreID){
		foreach($genres as $genre){
			//ある場合、そのIDをstock
			if(is_array($genre['children']) && in_array($genreID,$genre['children'])){
				return true;
			}
		}
		return false;
	}


	function breadCrumbs($genres,$genreID,&$bread){
		//自分のIDが他のIDの子供にあるか？
		foreach($genres as $genre){
			//ある場合、そのIDをstock
			if(is_array($genre['children']) && in_array($genreID,$genre['children'])){
				$bread[] = $genre;
				$this->breadCrumbs($genres,$genre['id'],$bread);
			}
		}

	}

	function breadCrumbsView($genres,$genreID,$subpage='',$pagetitle){
		$breadcrumbs=array();

		echo '<ul class="breadcrumb">';
		echo '<li>';
		echo '<i class="ace-icon fa fa-home home-icon"></i>';
		echo '<a href="'.WEBROOT.'">Home</a>';
		echo '</li>';

		if(!$genreID){
			echo '</ul>';
			return;
		}

		$this->breadCrumbs($genres,$genreID,$breadcrumbs,$pagetitle);
		$breadcrumbs[] = $genres[$genreID];


		foreach($breadcrumbs as $breadcrumb){

			if($breadcrumb === end($breadcrumbs)){
				echo '<li class="active">';
				if(isset($breadcrumb['pagename'])){
						echo '<a href="'.WEBROOT.$breadcrumb['pagename'].'">';
				}else{
					echo '<a href="'.WEBROOT.'List/'.$breadcrumb['urlname'].'">';
				}

				if(preg_match('/\.png$/i',$breadcrumb['icon'])){
					echo '<img src="'.WEBROOT.'assets/img/genre/'.$breadcrumb['icon'].'" alt="'.$breadcrumb['name'].'">'."\n";
				}else{
					echo '<i class="menu-icon '.$breadcrumb['icon'].'"></i>&nbsp;';

				}
				echo $breadcrumb['name'].'</a></li>';
			}else{
//				echo '<li><i class="menu-icon '.$breadcrumb['icon'].'"></i>&nbsp;';
				echo '<li><img src="'.WEBROOT.'assets/img/genre/'.$breadcrumb['icon'].'" alt="'.$breadcrumb['name'].'">'."\n";
				echo $breadcrumb['name'].'</li>';

			}
		}

		if($subpage){
			if(is_array($subpage['child'])){
				echo '<li><a href="'.WEBROOT.'List/'.$breadcrumb['urlname'].'/blog/"><i class="ace-icon '.$subpage['icon'].'"></i>'.$subpage['name'].'</a></li>';
				echo $pagetitle ? '<li>'.$pagetitle.'</li>':'';
			}else{
				echo '<li><i class="ace-icon '.$subpage['icon'].'"></i>'.$subpage['name'].'</li>';
			}
		}

		echo '</ul><!-- /.breadcrumb -->';
		return;
	}

	function childrenlist($genreID,$genre){
		$children = $genre[$genreID]['children'];

		foreach($children as $child){
			$ret[] = $genre[$child];
		}
		return $ret;
	}

	/**
	vote数 / vote合計 vote平均値を取得
	**/
	function voteAverage($item,$name,$percent=1){
		if(!$item['Item']['vote_count']){
			return 0;
		}

		$_name = $name.'_total';
		$ret = 0;
		if($item['Item'][$_name]){
			$ret = $item['Item'][$name] / $item['Item'][$_name];
		}


		$ret = $ret*$percent;
		return round($ret,1);
	}

	function voteAverageView($item,$name){

		$ave = $this->voteAverage($item,$name,20);
		if($ave > 80){
			$co = 'info';
		}elseif($ave >= 50){
			$co = 'success';
		}else{
			$co = 'danger';
		}

		echo '<div class="progress progress-striped active" data-percent="&nbsp;'.$ave.'%">';
		echo '<div class="progress-bar progress-bar-'.$co.'" style="width:'.$ave.'%;"></div>';
		echo '</div>';
	}

	function voteAverageStarView($item,$name,$l=3,$r=9,$tooltip=''){
		$ave = $this->voteAverage($item,$name);
		if($tooltip){
		echo '<div class="col-xs-'.$l.' kz-col-clear align-right">';

}else{
		echo '<div class="col-xs-'.$l.' kz-col">';
}
		echo $ave;
		if($tooltip){
//		echo "&nbsp;".$tooltip."&nbsp";
	}
		echo '&nbsp;</div>';
		echo '<div class="col-xs-'.$r.' kz-star-0">';
		// for($x=0;$x<$ave;$x++){
		// 	echo '<img src="'.WEBROOT.'assets/img/star_full.png" width=15px class="kz-img-star">';
		// }
		// for($y=$x;$y<5;$y++){
		// 	echo '<img src="'.WEBROOT.'assets/img/star_null.png" width=15px class="kz-img-star">';
		// }
		echo '<div class="star pull-left" data-score="'.$ave.'"></div>';
		echo '</div>';
	}

	function ranking($key){
		switch($key){
			case 1:		echo '<div class="col-xs-12 kz-col-clear align-right"><span class="label label-sm sg-label-au arrowed-right">'.$key.'位</span></div>';return;
			case 2:		echo '<div class="col-xs-12 kz-col-clear align-right"><span class="label label-sm sg-label-ag arrowed-right">'.$key.'位</span></div>';return;
			case 3:		echo '<div class="col-xs-12 kz-col-clear align-right"><span class="label label-sm sg-label-cu arrowed-right">'.$key.'位</span></div>';return;

		}
		echo '<div class="pull-right">'.$key.'位</div>';
		return;
	}

	function rankingClass($key){
		switch($key){
			case 1: echo 'kz-rank-1';return;
			case 2: echo 'kz-rank-2';return;
			case 3: echo 'kz-rank-3';return;
		}
		echo 'kz-rank-'.$key;return;
	}

	function screenshot($id,$org=false){
		if($org){
			$imgpath = 'assets/img/screenshot/org/sc_'.$id.'.png';
		}else{
			$imgpath = 'assets/img/screenshot/sc_'.$id.'.png';
		}
		$docpath = ROOT.'/app/webroot/'.$imgpath;
		$this->log($imgpath);
		if(file_exists($docpath)){
			return WEBROOT.$imgpath;
		}else{
			return WEBROOT.NOWPRINTING;
		}

	}

	function voteButton($value,$userVote){
		if (isset($userVote['UserVote']) && ($value['Item']['id'] == $userVote['UserVote']['item_id'])){
			echo '<a data-toggle="modal" class="btn-xs btn-info" data-target="#voteModal" href="'.$value['Item']['id'].'">';
			echo '<i class="ace-icon fa fa-pencil-square-o"></i><span class="kz-vote">編集</span></a>';
		}else{
			echo '<a data-toggle="modal" class="btn-xs btn-warning" data-target="#voteModal" href="'.$value['Item']['id'].'">';
			echo '<i class="ace-icon fa fa-pencil-square-o"></i><span class="kz-vote">投票</span>';
			echo '</a>';
		}
	}

	function newsIcon($Item,$Genres){
		$link = false;
		switch ($Item['Blog']['tag']){
			case NEWSADD:
				$labelcolor = 'danger';
				$text = '追加';
				$link = true;
			break;
			case NEWSSALE:
				$labelcolor = 'warning';
				$text = 'お得情報';
			break;
			case NEWSPOST:
				$labelcolor = 'success';
				$text = '記事一覧';
			break;
		}

		echo '<span class="label label-'.$labelcolor.' arrowed-right arrowed-in kz-top-label">';
		if($link){
			echo '<a href="'.WEBROOT.'List/'.$Genres[$Item['Blog']['genre_id']]['urlname'].'">';
		}else{
			echo '<a href="'.WEBROOT.'List/'.$Genres[$Item['Blog']['genre_id']]['urlname'].'/blog/">';
		}
		echo $text;
		echo '</a></span>';

}


}
