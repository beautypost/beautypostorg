<?php
// app/Model/User.php
class User extends AppModel {

        public function MailPwLogin($mail,$password){
            $con['conditions'] = array(
                'username'=>$mail,
                'password'=>$password
                );
            $r = $this->find('first',$con);

            if(isset($r['User']['id'])){
                return $r['User'];
            }
            return;
        }

}
?>