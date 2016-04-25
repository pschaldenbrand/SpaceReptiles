<?php
/*
Written by Peter Schaldenbrand

These are functions to be used in the story/adventure pages
that depict your lizard on his travels throughout space.
*/

//Displays the title of what's happening in the picture
//$s is the message to be displayed
function story_header ( $s ){
	?>
	<p class = "story_title">
	<?php echo $s; ?>
	</p>
	<?php
}
?>

<?php
//Displays the image of the Lizard doing things. 
//$s is the picture location
function story_img ( $s ){
	?>
	<img class="story" src=<?php echo $s; ?> alt="fire">
	<?php
}
?>

<?php
//Displays the options for what your lizard does next.
//$text is the message of what the user sees
//$action is the php file location of what the page is of
//what the lizard does next
function story_option( $text, $action ){
	?>
	<form action= <?php echo $action; ?> class="story">
	<button class = "button" type="submit" value="start">
	<?php echo $text; ?>
	</button>
	</form>
	<?php
}
?>