<?php
//Written by Peter Schaldenbrand

//Takes two Strings, then using the dynamic programming
//edit distance algorithm, converts the second string into 
//the first string ($n to $m)
//It echo's out each transition along the way.
function editdistance( $m, $n ){
	$table = array();	#this is the table with the shortest distance amounts
	$op = array();		#this is the operation that require shortest distance
	
	//initialize the tables
	for( $i = 1; $i <= strlen($m); $i++ ){
		$table[$i] = array();
		$table[0][0] = 0;
		$table[$i][0] = $i;
		$op[$i][0] = 2;
	}
	for( $i = 1; $i <= strlen($n); $i++ ){
		$table[0][$i] = $i;
		$op[0][$i] = 3;
	}
	
	//go through the table using the edit distance algorithm
	//along the way record the operation in $op
	for( $i = 1; $i <= strlen($m); $i++ ){
		for( $j = 1; $j <= strlen($n); $j++ ){
			$newop1;
			$zero = false;
			if( $m[$i-1] === $n[$j-1] ){
				$newop1 = 0 + $table[$i-1][$j-1];
				$zero = true;
			}
			else{
				$zero = false;
				$newop1 = 2 + $table[$i-1][$j-1];
			}
			$newop2 = $table[$i-1][$j]+1;
			$newop3 = $table[$i][$j-1]+1;
			$min = -1;
			if( $newop1 <= $newop2 && $newop1 <= $newop3 ){
				#this is substitution
				if( $zero == true ){
					$min = 0;
				}
				else{
					$min = 1;
				}
				$table[$i][$j] = $newop1;
			}
			else if( $newop2 < $newop3 ){
				#insertion
				$min = 2;
				$table[$i][$j] = $newop2;
			}
			else{
				#deletion
				$min = 3;
				$table[$i][$j] = $newop3;
			}
			$op[$i][$j] = $min;
		}
	}
	
	//go through $op starting from the final point and go backwards
	//have the reverse of the operations necessary to convert the two
	//words saved in $ops
	$ops = array();
	$currx = strlen($m);
	$curry = strlen($n);
	for( $i = 0; $i < strlen($n)+strlen($m)+1; $i++ ){
		$move = $op[$currx][$curry];
		if( $move == 1  ){
			$currx--;
			$curry--;
		}
		else if( $move == 0 ){
			$currx--;
			$curry--;
		}
		else if( $move == 2){
			$currx--;
		}
		else{
			$curry--;
		}
		$ops[] = $move;
		if( $currx == 0 && $curry == 0 ){
			break;
		}
	}
	
	//Reverse ops so that the changes happen to the beginning of 
	//the word rather than the end.
	$temp = array();
	for( $i = sizeof($ops)-1; $i>=0 ; $i--){
		$temp[] = $ops[$i];
	}
	$ops = $temp;
		
	//echo out each transition from one word to the next
	$word = str_split( $n );
	$final = str_split( $m );
	$x = 0;
	$y = 0;
	echo $n."<br/>";
	for( $i = 0; $i < sizeof($ops); $i++ ){
		if( $ops[$i] == 1 || $ops[$i] == 0){
			$word[$y] = $final[$x];
			$x++;
			$y++;
		}
		else if( $ops[$i] == 2){
			$tmp = array();
			for( $j = 0; $j <= sizeof($word) ; $j++ ){
				if( $j == $y){
					$tmp[$y] = $final[$x];		
				}
				else if( $j > $y ){
					$tmp[$j] = $word[$j-1];
				}
				else{
					$tmp[$j] = $word[$j];
				}
			}
			$x++;
			$y++;
			$word = $tmp;
		}
		else{
			$tmp = array();
			for( $j = 0; $j <= sizeof($word) - 1; $j++ ){
				if( $j != $y ){
					$tmp[] = $word[$j];
				}
			}
			$word = $tmp;
		}
		if( $ops[$i] != 0 ){
			echo implode("",$word) . "<br/>";
		}
	}
}	
?>