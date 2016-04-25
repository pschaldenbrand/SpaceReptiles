<?php
/*Written by Peter Schaldenbrand
  this is the page that updates the current story php file
  to add the new option (button) to go to the new page. 
  it uploads a photo and then creates a new php file that
  is the new page.
  Using some code from http://www.w3schools.com/php/php_file_upload.asp*/
  
//upload the picture
$target_dir = "uploaded_pics/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
if( strlen($_FILES["fileToUpload"]["name"]) <5 ){
	$uploadOk=0;
}
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
} 
if( strlen($_POST["option_text"])==0){
	$uploadOk == 0;
}

//choose a random number for the file name:
$filename = rand(0,999999999);

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	echo "</br>no</br>";
} 
// if everything is ok, try to upload file
else {
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], 
		$target_dir . $filename ."-img.". $imageFileType)) {
	} 
}
if( $uploadOk == 1){  //only do this stuff if the picture uploaded correctly
	
//Make a PHP file to have the new page
$phppage = fopen( $filename . "_USER_MADE_PAGE.php", "w");
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
	story_header(\"" . "".$_POST["description"]."\");\n" 
);
fwrite( $phppage, "\tstory_img(\"uploaded_pics/".$filename."-img.".$imageFileType . "\");");

$prevPageNameAr = explode("/",$_SERVER['HTTP_REFERER']);
$prev_page_name = $prevPageNameAr[ count( $prevPageNameAr) -1 ];
fwrite( $phppage, "\n\t//opt 1\n\tstory_option(\"Go Back?\", \"$prev_page_name\");");
fwrite( $phppage, "\n\t//next\n\tinclude(\"addToStory.php\");\n?>\n");
fwrite( $phppage, "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js\"></script>\n");
fwrite( $phppage, "<script src=\"story_js.js\"></script>\n" );
fwrite( $phppage, "</body>\n</html>");

//Edit the current story page to include the new option
$page_name_ar = explode("/",$_SERVER['HTTP_REFERER']);
$page_name = $page_name_ar[ count( $page_name_ar) -1 ];
$page_name = substr($page_name, 0, -1 );
$pagetext = fopen( $page_name , "r");
$i = 0;
$str_ar;
//add all the lines of the file to an array to add back later
while(!feof($pagetext)){
	$str_ar[$i] = fgets($pagetext);
	$i = $i + 1;
}

//add all the lines back to the file with the new option (button) in it
$newfn = substr($page_name, 0, count($page_name)-5) .".php";
$newfile = fopen( $newfn, "w");
$opt_num = 1;
for( $j = 0; $j < count($str_ar); $j++){
	$line = $str_ar[$j];
	$split = preg_split('/\s+/', $line);
	$write = true;
	if( count($split) == 4 ){
		if( $split[1] === "//opt" ){
			$opt_num = $opt_num + 1;
		}
	}
	if( count($split) == 3 ){
		//add the line that has the new page option
		if( $split[1] === "//next" ){
			$write = false;
			fwrite( $newfile, "\t//opt ".$opt_num."\n" );
			$goToPHP = $filename."_USER_MADE_PAGE.php";
			fwrite( $newfile, "\tstory_option(\"".$_POST["option_text"]."\",\"$goToPHP\");\n");
			fwrite( $newfile, "\t//next\n");
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
//go back to the original page
header( 'Location: ' . $_SERVER['HTTP_REFERER']);
?>