<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class MailmagazineController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Mailmagazine');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->set('cssname','content');
        $this->set('bodyclass','page-magazine');

        if(!$this->SnsuserData){
            $this->redirect('/Login/');
        }


    }


    public function index(){
    //getで受け取ったdataをセット
        $data = '';
        $data = $this->setRequestGetValues($data);

        $limit = 20;
        $p = isset($data['p']) ? $data['p'] : 0;
        $Mailmagazine = $this->Mailmagazine->getItems($limit,$p);
        $this->set('Mailmagazine',$Mailmagazine);

        $total = $this->Mailmagazine->getItemsCount('');
        $pager = $this->Pager->getPager($total,$p,$limit);

//      var_dump($pager);
//      var_dump($total);
        $this->set('totalcount',$total);

        $this->set('Pager',$pager);


    }

    public function Detail($id){
        $total = $this->Mailmagazine->getItemsCount('');
        $p = isset($data['p']) ? $data['p'] : 0;

        $pager = $this->Pager->getPager($total,$p,1);
        $this->set('Pager',$pager);

        $Mailmagazine = $this->Mailmagazine->getItemByID($id);
        $this->set('Mailmagazine',$Mailmagazine);
    }

}
