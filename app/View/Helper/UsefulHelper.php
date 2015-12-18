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
class UsefulHelper extends AppHelper {
	/**
	配列を , カンマ区切りの文字列に変換　最後の, もトル。
	配列でない場合は、そのまま渡す
	**/
	public function roop($data,$sep){
		$all ='';
		$ret = '';
		if(is_array($data)){
			foreach($data as $k => $v){
				$all .= $v.$sep;
			}
			if($all){
				$ret = substr($all, 0, -1);
			}
		}else{
			$ret = $data;
	}
		return $ret;
	}

	public function createKeyValue($items,$objtitle,$setkey){
		$ret = array();
//		var_dump($items);
		foreach($items as $key => $val){
			$ret[$val[$objtitle]['id']] = $val[$objtitle][$setkey];
		}
//		var_dump($ret);
		return $ret;
	}

	public function option2($items,$objtitle,$setkey,$set){
		$ret = $this->createKeyValue($items,$objtitle,$setkey);
//        var_dump($ret);
		return $this->option($ret,$set);
	}

    public function checkwant($userid,$itemid,$want){
        foreach($want as $k => $v){
            if(
                $v['Want']['user_id'] == $userid &&
                $v['Want']['item_id'] == $itemid
                ){

                return true;
            }
        }
        return false;
    }

    public function age($year,$month,$day){
        $month = sprintf('%02d',$month);
        $age = (int) ((date('Ymd')-($year.$month.$day))/10000);
        return $age;
    }

	/**
	html select 用 option 生成
	**/

    public function checked($options,$set){
        if(isset($options[$set])){
            return 'checked';
        }
    }


    public function ViewselectValue($options,$set){
        if(!isset($set)){
            return '指定なし';
        }
        return $options[$set];
    }

    public function ItemImg($name,$width,$path='item',$class=''){
        if(!$name){
            return;
        }
        return '<img src="'.WEBROOT.'images/'.$path.'/'.$name.'"width="'.$width.'" class="'.$class.'">';
    }


    public function checkbox($items,$objtitle,$setkey,$set,$name){
        $op = $this->createKeyValue($items,$objtitle,$setkey);
//var_dump($op);
//        var_dump($set);
        if(!is_array($set)){
            $set = explode(',',$set);
        }
//        var_dump($rset);
        $ret = '';
        foreach($op as $key => $val){
            $ret .= '<input type=checkbox name=data['.$name.'][] value=\''.$key."'";
            if(is_array($set)){
             $ret .= (in_array($key,$set)) ? ' checked ' :'';
            }
            $ret .='>'.$val;
        }
        return $ret;
    }

    public function checkbox2($items,$name,$set){
        if(!is_array($set)){
            $set = explode(',',$set);
        }
        $ret = '';
//        var_dump($items);
        foreach($items as $key => $val){
            $ret .= '<input type=checkbox name=data['.$name.'][] value=\''.$key."'";
            if(is_array($set)){
             $ret .= (in_array($key,$set)) ? ' checked ' :'';
            }
            $ret .='>'.$val;
        }
        return $ret;

    }

    public function radio($name,$items,$selected){
        $ret = '';
        foreach($items as $key => $val){
            $ret .="<li><input type='radio' name='".$name."' value='".$key."'";
            if(isset($selected)){
             $ret .= ($key == $selected) ? ' checked ' :'';
            }
            $ret .='>'.$val.'</li>';
        }
        return $ret;
    }

    public function vradio($key,$val){
        $ret = '';
        for($i=0;$i<6;$i++){
            $ret .= '<td><input type="radio" name="data['.$key.']" value="'.$i.'"';
            if($i == $val){
                $ret .=' checked ';
            }
            $ret .='></td>';
        }
        return $ret;
    }

    public function vradioc($key,$val){
        $ret = '';
        for($i=0;$i<6;$i++){
            $ret .= '<td>';
            if($i == $val){
                $ret .= ($val > 0) ? $val.'点': '無評価';
            }
            $ret .='</td>';
        }
        return $ret;
    }

    public function checkboxvalue($items,$objtitle,$setkey,$set,$sep='/'){
         $op = $this->createKeyValue($items,$objtitle,$setkey);
         $ret = '';
         if(!is_array($set)){
            $set = explode(',',$set);
        }
         foreach($op as $key => $val){
             $ret .= in_array((String)$key,$set) ? $val.$sep :'';
         }
        return $ret;
    }

    public function checkboxvalue2($items,$set){
         $ret = '';
         if(!is_array($set)){
            $set = explode(',',$set);
        }
         foreach($items as $key => $val){
             $ret .= in_array((String)$key,$set) ? $val.'/' :'';
         }
        return $ret;
    }

    public function checkNull($arg){
        if($arg == ''){
            return '-';
        }
        if($arg == '1970.01.01'){
            return '-';
        }
        return $arg;
    }


    /**
    html select 用 option 生成
    **/
    public function getIco($Icos,$selected){
        $ret = '';
        $rset = explode(',',$selected);
        $rset = array_filter($rset,'strlen');
        foreach($rset as $key => $val){
                if(isset($val)){
                 $ret .= '<li class="tag-'.$val.'">'.$Icos['ico'][$val].'</li> ';
                }
        }
//        var_dump($ret);
        return $ret;
    }


	/**
	html select 用 option 生成
	**/
	public function option($options,$selected,$nu=''){
        if(!is_array($selected)){
            if($selected !== ''){
            $selected = explode(',',$selected);
            }
        }
        $ret = '';
        if(!$nu){
		  $ret .= '<option value="">-----</option>';
        }

		foreach($options as $key => $val){
			$ret .= "<option value=$key";
            if(is_array($selected)){
			 $ret .= (in_array($key,$selected)) ? ' selected ' :'';
            }
			$ret .= '>'.$val.'</option>';
		}
//        var_dump($ret);
		return $ret;
	}

    public function selectOptionValue($items,$key){
        foreach($items as $item){
            if($item['Genre']['id'] == $key){
                return $item['Genre']['title'];
            }
        }
    }

	public function selectValue($options,$set){
		return $options[$set];
	}

	public function checkAdminID($id){
		if(strstr(ADMINID,$id)){
			return true;
		}
		return;
	}

	public function newIcon($time){
		$l_time = strtotime("-3 day");
		if($time > $l_time){
            echo '<img class="new-tag" src="'.WEBROOT.'assets/img/blog/new-tag.png" alt="">';
        }
	}

	public function setdate($time,$enc='Y/m/d H時i分'){
		return date($enc,strtotime($time));
	}

	public function pagetitle($title,$comment){
		echo '
                        <div class="page-header">
                            <h1>
                                '.$title.'
                                <small>
                                    <i class="ace-icon fa fa-angle-double-right"></i>
                                    '.$comment.'
                                </small>
                            </h1>
                        </div><!-- /.page-header -->';
	}

	public function ifNull($val){
		if(isset($val)){
			return $val;
		}
	}

    public function formartTime($time){
        echo $time;
        echo date("Y.m.d",strtotime($time));
    }



}
