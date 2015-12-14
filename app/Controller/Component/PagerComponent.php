<?php
App::uses('Component', 'Controller');
class PagerComponent extends Component {
    public function getPager($allcount,$p,$limit) {
		$s = $e = true;
		$pages = $allcount / $limit ;


		$pages = intval($pages+0.9);
        $ret['pend'] = $pages;

		$pager = array();
		//ページ数が5ページ以下の場合はそのまま値を入れて返す
		if($pages < PAGERLIMIT){
			for($x=0;$x<$pages;$x++){
				$pager[$x] = $x+1;
			}
			$ret['s'] = false;
			$ret['e'] = false;
			$ret['p'] = false;

			$ret['pager'] = $pager;
			return $ret;
		}

		$pagestart = $p -2;
		$pageend = $p +2;
		if($pagestart < 1){
			$pagestart = 1;
			$s = false;
		}


		if($pageend > $pages){
			$pagestart = $pagestart - ($pageend - $pages);
			$e = false;
		}

		for($x=0;$x<PAGERLIMIT;$x++){

			$pager[$x] = $pagestart;
            $pagestart++;
            if($pages < $pagestart){
                break;
            }
		}

		$ret['s'] = $s;
		$ret['e'] = $e;
		$ret['pager'] = $pager;
		$ret['p'] = $p;
//var_dump($ret['pager']);
		return $ret;
    }

    public function getPagerDetail($all,$object,$id,$limit=1){
        $ret['s'] = false;
        $ret['e'] = false;


        foreach($all as $k => $v){
            if($v[$object]['id'] == $id){
                $offset = $k;
                break;
            }
        }
        if($offset != 0){
            $ret['s'] = $all[$offset-1][$object]['id'];
        }

        if($offset < (count($all))-1){
            $ret['e'] = $all[$offset+1][$object]['id'];
        }

        $ret['p'] = $offset;
        return $ret;
    }


}

/*
  <ul class="pagination pagination-lg">
<?php if ($s):?>
      <li><a href="?p=<?php echo $p-1?>">&laquo;</a></li>
<?php endif;?>
  <?php foreach ($pager as $k =>$v):?>
    <?php if ($p == $v-1):?>
      <li class="active"><a href="?p=<?php echo $v-1?>"><?php echo $v;?></a></li>
    <?php else:?>
      <li><a href="?p=<?php echo $v-1?>"><?php echo $v?></a></li>
    <?php endif;?>
  <?php endforeach;?>
<?php if ($e):?>
      <li><a href="?p=<?php echo $p+1?>">&raquo;</a></li>
<?php endif;?>

  </ul>
*/
?>