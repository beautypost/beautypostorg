<?php

App::uses('Component', 'Controller');

class ItemCComponent extends Component {

   public function initialize(Controller $controller) {
        $this->controller = $controller;

    }

	private function loadModel($modelName) {
	    if (!empty($this->{$modelName})) {
	    // すでに存在すればそのままreturn
	        return;
	    } elseif (!empty($this->controller->{$modelName})) {
	    // 呼び出し元のコントローラでusesしてあれば$this->{モデル名}に参照渡し
	        $this->{$modelName} = $this->controller->{$modelName};
	    } else {
	    // コントローラでusesしていなければコンポーネントでモデルを読み込む
	        App::uses($modelName, 'Model');
	        $this->{$modelName} = new $modelName;
	    }
	}

	//検索ボックス用の値をconditionに変換
	public function setItemValueSearch($data){
		$this->loadModel('Genre');
		$ar = $this->Genre->allSearchGenreID();

		$conditions = array();
		$con = array();
		if(!is_array($data)){
			return;
		}
		//機種・目的・部位
		foreach($data as $k => $v){
			if(!in_array($k,$ar)){continue;}
			if($v > 0){
				$con[]['genres like'] ='%,'.$v.',%';
			}

		}

		if(isset($data['GenreKisyu']) && $data['GenreKisyu']){
			$con[]['genre_id'] = $data['GenreKisyu'];
		}

		if(isset($data['GenreMakers']) && $data['GenreMakers']){
			$con[]['maker'] = $data['GenreMakers'];
		}

        if(isset($data['GenrePriceLow'])){
		if($data['GenrePriceLow'] || $data['GenrePriceHigh']){
			// $con[]['price >='] = (int)($data['GenrePriceLow']);
			// $con[]['price <='] = (int)($data['GenrePriceHigh']);
            $con[]['price between ? AND ?'] = array((integer)$data['GenrePriceLow'],(integer)$data['GenrePriceHigh']);
		}
        }
		$conditions['AND'] = $con;

		if(isset($data['keyword']) && $data['keyword']){
			$conditions['OR']['title like'] = '%'.$data['keyword'].'%';
            $conditions['OR']['comment like'] = '%'.$data['keyword'].'%';
            $conditions['OR']['jancode like'] = '%'.$data['keyword'].'%';
            $conditions['OR']['poscode like'] = '%'.$data['keyword'].'%';

		}


		return $conditions;
	}

        /**
         * アップロードされたファイルのチェックを行う
         *
         * @param array $errormessages
         * @param unknown_type $_FIlES
         * @return String テンポラリファイルネーム（ファイルパス付き）
         */
        function uploadCheck(&$errormessages,$_FIlES, $count,$uploadpath=UploadImagePath) {
                //ファイル情報取得
                $tmp_name = $_FILES['userfile']['tmp_name'][$count];
                $uploadname = $_FILES['userfile']['name'][$count];
                $mimetype = $_FILES['userfile']['type'][$count];
                $size = $_FILES['userfile']['size'][$count];

                // $ext = $this->PostUpload->__getExt($mimetype);

                // $tmp_upload_file_path = strrchr($tmp_name,'/') . $ext;

//                debug($_FILES);
//                debug($tmp_upload_file_path);
                $uploadname = date("Y-m-d_H_i_s").'-'.$count.'-'.$uploadname;

                //ファイルアップロード
                if(!$this->tmp_image_uploads($tmp_name, $uploadname,$uploadpath)){
                        //アップロードファイルの削除
                        $this->Image->tmp_image_delete($uploadname);
                        array_push($errormessages, $count . '番目のファイルアップロードに失敗しました');
                }
                return $uploadname;
        }

        /**
         * テンポラリ画像を実際の画像パスに移動させる。
         * 画像パスはcakePHPの配下にあるため、httpからは取りに行けない
         *
         * @param unknown_type $tmp_name
         * @param unknown_type $filename
         * @return unknown
         */
        function tmp_image_uploads($tmp_name,$file_name,$uploadpath){

                        if(!move_uploaded_file($tmp_name, $uploadpath.$file_name)){
                                error_log('can not move dir='.$tmp_name."::".$uploadpath.$file_name);
                                return false;
                        }

                        chmod($uploadpath.$file_name,0755);

                        return true;
        }



}
?>