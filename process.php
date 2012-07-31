<?php

$e_id = isset($_GET['e_id']) ? $_GET['e_id'] : '';
$filename = $_GET['file'];
$uploadPath = dirname(__FILE__) . '/uploads/';
$newFile = $uploadPath.$filename;
// $newFile = $upload_path.DIRECTORY_SEPARATOR.$newFilename;
$input = fopen("php://input", "r");
        
        // $temp_path = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . "tmp";
        // if(!is_writable($temp_path)){
        //     mkdir("$temp_path",0777);
        // }

$tempFilename = tempnam($uploadPath, 'temp_');
$tempfile = fopen($tempFilename, 'w');
$filesize = stream_copy_to_stream($input, $tempfile);
fclose($tempfile);
fclose($input);
        
rename($tempFilename,$newFile);

$sampleThumbnail = "uploads/".$filename;


$response = '{ "success" : "Success!", "e_id" : "'.$e_id.'", "filename" : "'.$filename.'", "thumbnail" : "'.$sampleThumbnail.'" }';
echo $response;

exit;