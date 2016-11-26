<?php
$target_dir = "../../images/";
$imageFileType = explode(".", $_FILES["file"]["name"])[1];
$target_file = $target_dir . "favicon." . $imageFileType;
$uploadOk = 1;
// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["file"]["tmp_name"]);    
if($check !== false){
    $uploadOk = 1;        
}else{
	echo "File is not an image.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "ico") {
    echo "Sorry, only JPG, JPEG, PNG, GIF & ICO files are allowed.";
    $uploadOk = 0;
}
if ($uploadOk == 0){
	echo("Sorry yout file wasent uploaded");
}else{
	$file_pattern = $target_dir . "favicon.*";
	array_map( "unlink", glob( $file_pattern ) );
	if(isset($_POST['generator'])){
		if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)){
			$jsonTemplate = '{"favicon_generation": {"api_key": "a7f5c2c11140755fe99ad121417c9e94403a7ee7","master_picture": {"type": "url","url": "{{ url }}","demo": "false"},"files_location": {"type": "root"},"callback": {"type": "url","url": "{{ callback }}","short_url": "false","path_only": "false","custom_parameter": "ref=157539001"}}}';			
			$varibles = array();
			$varibles['url'] = "https://yt3.ggpht.com/-v0soe-ievYE/AAAAAAAAAAI/AAAAAAAAAAA/OixOH_h84Po/s900-c-k-no-mo-rj-c0xffffff/photo.jpg";
			$varibles['callback'] = "http://beattbots.com";					
			foreach($varibles as $key => $value){
				$jsonTemplate = str_replace('{{ ' . $key . ' }}', $value, $jsonTemplate);
			}			
			header("Location: http://realfavicongenerator.net/api/favicon_generator?json_params=" . $jsonTemplate);
		}
	}else{
		$file_pattern = "../../" . "favicon.*";
		array_map( "unlink", glob( $file_pattern ) );
		if(move_uploaded_file($_FILES['file']['tmp_name'], "../../" . "favicon." . $imageFileType)){
			header("Location: ../settings.php");
		}else{
			echo("Sorry there was an error when uploading your file");
		}
	}
}
?>