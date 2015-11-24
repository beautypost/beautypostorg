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
class Keyword extends AppModel {
    public $name = 'Keyword';
//    public $primaryKey = 'keyword';


    public function saveKeyword($item,$actressid){
        $conditions = array('conditions'=>array('keyword'=>$item['key'],'item_id'=>$item['id']));
        $c = $this->find('count',$conditions);

        if($c > 0){
            return;
        }
            $data = array();
            $data['keyword'] = $item['key'];
            $data['created'] = $this->now();
            $data['item_id'] = $item['id'];

            $this->create();
            $this->save($data);

            if($actressid > 0){
                $this->create();
                $data['category_id'] = KEYWORDACTRESSID;
                $data['keyword'] = $actressid;                
                $this->save($data);
            }
      
    }

    public function setActressID($items,$actressid,$sei,$mei){
        foreach($items as $key => $val){
            $conditions = array('conditions'=>array('item_id'=>$val['Item']['id'],'keyword'=>$actressid,'category_id'=>KEYWORDACTRESSID));
            $key = $this->find('first',$conditions);
            if(!$key){
                $this->create();
                $data['item_id'] = $val['Item']['id'];
                $data['category_id'] = KEYWORDACTRESSID;
                $data['keyword'] = $actressid;                
                $this->save($data);
                $this->create();
                $data['category_id'] = '';
                $data['item_id'] = $val['Item']['id'];
                $data['keyword'] = $sei.' '.$mei;                
                $this->save($data);



            }

        }
    }




    public function SavefindKeyAndDataIDAndSiteID($key,$itemid){
        $conditions = array('conditions'=>array('keyword'=>$key,'item_id'=>$itemid));
        $c = $this->find('count',$conditions);

        if($c > 0){
            return;
        }
            $data = array();
            $data['keyword'] = $key;
            $data['created'] = $this->now();
            $data['item_id'] = $itemid;

            $this->create();
            $this->save($data);
      
    }


    public function saveKeywords($items,$actressid){
        if(!$items){return;}
        foreach($items as $item){
            $this->saveKeyword($item,$actressid);
        }
    }


    public function saveAllFile($id,$keyword){
    $r =file_get_contents(DOMAIN.'?q='.$keyword);

    $file = new File(WWW_ROOT.'file/'.$id.'.html',true);
    $file->write($r);
    $file->close();

    }

    public function getActressByItemID($itemid){
//        $conditions['limit'] =20;
        $conditions['conditions'] = array(
            'item_id'=>$itemid,
            'category_id'=>KEYWORDACTRESSID
            );
        return $this->find('all',$conditions);
    }

    public function getKeyword(){
        $conditions['limit'] =20;
        $condtisions['conditions'] = array('site_id',100);
        return $this->find('all',$conditions);
    }


}
