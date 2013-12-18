<?php
	header("Content-Type: text/html;charset=utf-8");
	ini_set('display_errors', 'off');
	date_default_timezone_set('PRC');
	session_start();
	$name = $_POST['name'];
	$size = $_POST['size'];
	$start = $_POST['start'];
	$fileSliceSize = $_POST['fileSliceSize'];
	$fileid = $_POST['fileid'];
	$tempFile = $_FILES['file']['tmp_name'];//临时路径


	//$_SESSION['start'] = $start;

	/*if( $_SESSION[$fileid] ){

	}else{
		$_SESSION[$fileid] = $fileid;

	}
	$_SESSION["fileid"] = $fileid;*/

	
	logger('----------------------------name:'.$name);
	logger('size:'.$size);
	logger('start:'.$start);
	logger('fileSliceSize:'.$fileSliceSize);
	logger('fileid:'.$fileid);
	logger('tempFile:'.$tempFile);

	//$_SESSION['start'] = $start + $fileSliceSize;


	$result = json_decode('{}');
	$result->name = $name;
	$result->size = $size;
	$result->start = $start+$fileSliceSize;
	$fileStream = file_get_contents($tempFile);
	

	//防止中文乱码
	$name = iconv( 'utf-8', 'gb2312', urldecode($name) );
	file_put_contents('./upload/'.$name,$fileStream,FILE_APPEND);
	echo json_encode($result);
	

function logger($content){
    file_put_contents("log.html",date('Y-m-d H:i:s ').$content.'<br>',FILE_APPEND);
}
?>