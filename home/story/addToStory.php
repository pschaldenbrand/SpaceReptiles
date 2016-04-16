<?php
echo
"
</br>
<div class=\"add\">
<form  action=\"newPage.php\" method=\"post\" enctype=\"multipart/form-data\">
    Add to the story:
    <input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\"></br>
	<p class=\"formtext\">Make a name for your option:</p>
	<input type=\"text\" class=\"textbox\" name=\"option_text\" id=\"opttext\"></br>
	<p class=\"formtext\">Make a filename for your new Image:</p>
	<input type=\"text\" class=\"textbox\" name=\"fileName\" id=\"fname\"></br>
    <input type=\"submit\" value=\"Upload Image\" name=\"submit\">
</form>
</div>
"
?>