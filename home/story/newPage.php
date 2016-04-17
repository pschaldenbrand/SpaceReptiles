<?php
//Using some code from http://www.w3schools.com/php/php_file_upload.asp
$target_dir = "uploaded_pics/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
echo strlen($_FILES["fileToUpload"]["name"]) . "     ";
echo $_FILES["fileToUpload"]["name"];
$uploadOk = 1;
if( strlen($_FILES["fileToUpload"]["name"]) <5 ){
	$uploadOk=0;
}
//echo "$target_file and $target_dir";
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
} 
if( strlen($_POST["fileName"])==0 || strlen($_POST["option_text"])==0){
	$uploadOk == 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	echo "</br>no</br>";
} 
// if everything is ok, try to upload file
else {
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], 
		$target_dir . $_POST["fileName"] ."-img.". $imageFileType)) {
			echo "</br>uploaded</br>";
	} 
	else {
		echo "</br>not uploaded yo</br>";
	}
}
if( $uploadOk == 1){
	
//Make a PHP file to have the new page
$phppage = fopen( $_POST["fileName"] . "_USER_MADE_PAGE.php", "w");
fwrite( $phppage, 
"<?php
//Written by Peter Schaldenbrand
session_start();
?>
<!DOCTYPE html>
<html lang=\"en\">
<head>
	<link rel=\"stylesheet\" type=\"text/css\" href=\"../../CSS/space.css\">
	<title>SPACE LIZARDS FROM SPACE</title>
	
</head>
<body>
	<?php include(\"story_functions.php\"); 
	\$n = \$_SESSION[\"username\"];
	story_header(\"" . "INSERT HEADER HERE\");\n" 
);
fwrite( $phppage, "\tstory_img(\"uploaded_pics/".$_POST["fileName"]."-img.".$imageFileType . "\");");

$prevPageNameAr = explode("/",$_SERVER['HTTP_REFERER']);
$prev_page_name = $prevPageNameAr[ count( $prevPageNameAr) -1 ];
fwrite( $phppage, "\n\t//opt 1\n\tstory_option(\"Go Back?\", \"$prev_page_name\");");
fwrite( $phppage, "\n\t//next\n\tinclude(\"addToStory.php\");\n?>\n</body>\n</html>");
//Edit the current story page to include the new option
//echo "</br>".$_SERVER['HTTP_REFERER'];
$page_name_ar = explode("/",$_SERVER['HTTP_REFERER']);
$page_name = $page_name_ar[ count( $page_name_ar) -1 ];
echo"</br>".count($page_name)."gay".$page_name."</br>";
$page_name = substr($page_name, 0, -1 );
echo "    gay  ".$page_name;
$pagetext = fopen( $page_name , "r");
$i = 0;
$str_ar;
while(!feof($pagetext)){
	$str_ar[$i] = fgets($pagetext);
	$i = $i + 1;
}

$newfn = substr($page_name, 0, count($page_name)-5) .".php";
echo"cuntcuntcutn".$newfn;
$newfile = fopen( $newfn, "w");
$opt_num = 1;
for( $j = 0; $j < count($str_ar); $j++){
	$line = $str_ar[$j];
	$split = preg_split('/\s+/', $line);
	$write = true;
	//print_r( $split );
	if( count($split) == 4 ){
		if( $split[1] === "//opt" ){
			//echo"</br> $split[1]</br>";
			$opt_num = $opt_num + 1;
		}
	}
	if( count($split) == 3 ){
		if( $split[1] === "//next" ){
			$write = false;
			fwrite( $newfile, "\t//opt ".$opt_num."\n" );
			$goToPHP = $_POST["fileName"]."_USER_MADE_PAGE.php";
			fwrite( $newfile, "\tstory_option(\"".$_POST["option_text"]."\",\"$goToPHP\");\n");
			fwrite( $newfile, "\t//next\n");
			//fwrite( $newfile, 
		}
	}
	if( $write == true ){
		fwrite( $newfile, $line);
	}
		
}
fclose($newfile);
fclose($pagetext);
fclose($phppage);
}
header( 'Location: ' . $_SERVER['HTTP_REFERER']);
?>