<?php
App::uses('Component', 'Controller');

define("SAVE_DIR","/images/upload/");

/**
 *ImageComponent
 *
 * @property News $News
 * @property PaginatorComponent $Paginator
 */
class HNDImageComponent extends Component {
	
	//Register an image to a directory.
	//一時ファイルの拡張子取得関数
	private function getExtention($file) {
		$tmp_size = getimagesize($file); // 一時ファイルの情報を取得
		$img = $extension = null;
		switch ($tmp_size[2]) { // 画像の種類を判別
    		case 1 : // GIF
        		$img = imageCreateFromGIF($file);
        		$extension = 'gif';
        		break;
    		case 2 : // JPEG
        		$img = imageCreateFromJPEG($file);
        		$extension = 'jpg';
        		break;
    		case 3 : // PNG
        		$img = imageCreateFromPNG($file);
        		$extension = 'png';
        		break;
    		default : break;
		}
		return $extension;
	}
}
