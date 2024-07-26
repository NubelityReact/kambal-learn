<?php 
	$result = array();
	$imagedata = base64_decode($_POST['img_data']);
	$filename = uniqid();
	//Location to where you want to created sign image
	$file_name = './doc_signs/'.$filename.'.png';
	file_put_contents($file_name,$imagedata);
	$result['status'] = 1;
	$result['file_name'] = $filename.'.png';
	echo json_encode($result);
?>