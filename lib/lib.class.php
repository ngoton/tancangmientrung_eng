<?php
class Library{
	private static $instance;

	public static function getInstance() {
        if (!self::$instance)
        {    
            self::$instance = new Library();
        }
        return self::$instance;
    }

	public function hien_thi_ngay_thang($day){
		$i = date('d',$day);
		$j = date('m',$day);
		$k = date('Y',$day);
		$result = $i.'/'.$j.'/'.$k;
		return $result;
	}

	/*
	* cắt đầu 1 xâu với số từ nhất định
	* param: xâu cần cắt, số lượng từ muốn cắt
	* return: xâu được cắt
	*/
	public function truncateString($str,$len,$charset="UTF-8"){
		$str = html_entity_decode($str,ENT_QUOTES,$charset);
		if (mb_strlen($str,$charset) > $len) {
			$arr = explode('', $str);
			$str = mb_substr($str, 0, $len, $charset);
			$arrRes = explode('', $str);
			$last = $arr[count($arrRes)-1];
			unset($arr);
			if (strcasecmp($arrRes[count($arrRes)-1], $last)) {
				unset($arrRes[count($arrRes)-1]);
			}
			return implode('', $arrRes)."...";
		}
		return $str;
	}

	

	/*
	* lấy đường link trang hiện tại
	* param: không
	* return: url hiện tại
	*/
	public function url_hientai(){
		$pageURL = 'http';
		if (!empty($_SERVER['HTTPS'])) {
			if ($_SERVER['HTTPS'] == on) {
				$pageURL .= "s";
			}		
		}
		$pageURL .= '://';
		if ($_SERVER['SERVER_PORT'] != "80") {
			$pageURL .= $_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
		}
		else{
			$pageURL .= $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
		}
		return $pageURL;
	}

	/*
	* loại bỏ ký tự đặc biệt
	* param: chuỗi
	* return: chuỗi mới
	*/
	function cleanup_text($str){
            
        if(ini_get('magic_quotes_gpc'))
        {
            $data= stripslashes($str);
        }
        return mysql_real_escape_string($data);
    } 

    /*
	
    */
    public function upload_image($name){
    	if ($_FILES[$name]['type'] == "image/jpeg" || $_FILES[$name]['type'] == "image/png" || $_FILES[$name]['type'] == "image/gif") {
    		if ($_FILES[$name]['size'] > 1048576) {
    			echo 'File không được lớn hơn 1Mb';
    		}
    		else{
    			$path = "public/images/upload/";
    			$tmp_name = $_FILES[$name]['tmp_name'];
    			$type = $_FILES[$name]['type'];
    			$size = $_FILES[$name]['size'];
    			$name = $_FILES[$name]['name'];

    			move_uploaded_file($tmp_name, $path.$name);
    		}
    	}
    }
    public function upload_file($name){
    	
    			$path = "public/files/";
    			$tmp_name = $_FILES[$name]['tmp_name'];
    			$type = $_FILES[$name]['type'];
    			$size = $_FILES[$name]['size'];
    			$name = $_FILES[$name]['name'];

    			move_uploaded_file($tmp_name, $path.$name);
    	
    }

    /*
	
    */
    public function formatMoney($number, $fractional=false) {  
	    if ($fractional) {  
	        $number = sprintf('%.2f', $number);  
	    }  
	    while (true) {  
	        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);  
	        if ($replaced != $number) {  
	            $number = $replaced;  
	        } else {  
	            break;  
	        }  
	    }  
	    return $number;  
	}

	/*
	* Bỏ dấu
	*/ 
	public function stripUnicode($str){
	  if(!$str) return false;
	   $unicode = array(
		  'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|A',
		  'd'=>'đ|Đ|D',
		  'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|E',
		  'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị|I',
		  'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|O',
		  'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|U',
		  'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ|Y',
		  'b'=>'B',
		  'c'=>'C',
		  'f'=>'F',
		  'g'=>'G',
		  'h'=>'H',
		  'j'=>'J',
		  'k'=>'K',
		  'l'=>'L',
		  'm'=>'M',
		  'n'=>'N',
		  'p'=>'P',
		  'q'=>'Q',
		  'r'=>'R',
		  's'=>'s',
		  't'=>'T',
		  'v'=>'V',
		  'w'=>'W',
		  'x'=>'X',
		  'z'=>'Z',
 
	   );
	foreach($unicode as $nonUnicode=>$uni) $str = preg_replace("/($uni)/i",$nonUnicode,$str);
	$str = str_replace( ' - ', ' ', $str );
	$str = str_replace( ' ', '-', $str );
	$str = str_replace( ';', '', $str );
	$str = str_replace( ':', '', $str );
	$str = str_replace( '(', '', $str );
	$str = str_replace( ')', '', $str );
	$str = str_replace( ',', '', $str );
	$str = str_replace( '/', '', $str );
	$str = str_replace( '_', '', $str );
	return $str;
	}
}

?>