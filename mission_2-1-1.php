<head>
	<meta charset= "UTF-8" >
</head>
<html>
	<head>
		<title>mission_2-1-1</title>
	</head>
	<body>
		<form action= "mission_2-1-1.php" method= "post" >
			<input type= "text" name="name"  size= "70" ><br>
			<input type= "text" name= "comment"  size= "90" ><br>
			<input type= "submit"  value= "送信" > 
		</form>
		<?php
			$filename='mission_2-1-1.txt';
			$array=file($filename);
			 if(!empty($filename)){	
			 	$array=file($filename);
			 	foreach($array as $element){
					$array=explode("<>", $element);
					$num=$array[0];
			 	}
			 	$num=(int)$num;
				$num++;
			}else{
				$num=1;
			}			
			$name=$_POST[ "name" ];
			$comment=$_POST[ "comment" ];
			date_default_timezone_set('Asia/Tokyo');
			$date=date( "Y/m/d H:i:s" );
			$delimiter="<>";
			$string=$num."<>".$name."<>".$comment."<>".$date;
				if(!empty($_POST[ "comment" ]) && !empty($_POST[ "name" ])){
				$fp=fopen($filename, 'a');
		 		fwrite($fp,$string."\n");
		 		fclose($fp);
		 		}
		 		$array=file($filename);
		 		foreach($array as $element){
				$spilitted_string=explode($delimiter, $string);
				echo  $element. "<br/>\n";
				}
			?>
	</body>
</html>