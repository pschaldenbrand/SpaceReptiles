<?php
//This adds a box to the bottom of each story page
//the box has a form to create a new page in the story
echo
"
</br>
<div class=\"add\">
<form  action=\"newPage.php\" method=\"post\" enctype=\"multipart/form-data\">
    Add to the story:
    <input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\"></br>
	<p class=\"formtext\">Make a name for your option:</p>
	<input type=\"text\" class=\"textbox\" name=\"option_text\" id=\"opttext\"></br>
	<p class=\"formtext\">What happens in this new part of the story?</p>
	<input type=\"text\" class=\"textbox\" name=\"description\" id=\"fname\"></br>
    <input class=\"button_upload\" type=\"submit\" value=\"Upload Image\" name=\"submit\">
</form>
</div>
"
?>