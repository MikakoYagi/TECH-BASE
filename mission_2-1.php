<head>
	<meta charset= "UTF-8" >
</head>
<html>
	<head>
		<title>mission_2-1</title>
	</head>
	<body>
		<?php
			$filename='mission_2-1.txt';
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
			$edit=$_POST[ "edit-num" ];
			if(!empty($_POST[ "edit-num" ])){
		 		$array=file($filename);
		 		$fp=fopen($filename, 'w');
		 			foreach($array as $element){
		 			$array=explode($delimiter, $element);
					$num=$array[0];
					$num=(int)$num;
		 			if($_POST[ "edit-num" ]==$num){
						$editname=$array[1];
						$editcomment=$array[2];
						}
					}
				}
			?>	
		<form action= "mission_2-1.php" method= "post" >
			<input type= "text" name="name" value="<?php echo $editname; ?>" size= "70" ><br>
			<input type= "text" name= "comment"  value= "<?php echo $editcomment; ?>" size= "90" ><br>
			<input type= "submit"  value= "送信" > <br>
			<input type= "text" name= "erasion" placeholder= "削除対象番号" size= "10" ><br>
			<input type= "submit"  value= "削除" ><br>
			<input type= "text" name= "edit-num" placeholder= "編集対象番号" size= "10" ><br>
			<input type= "submit"  value= "編集" ><br>
			<input type= "hidden" name= "edit-num viewer" value= "<?php echo $edit; ?>"><br>
			<input type= "submit"  value= "送信" > 
		</form>
			<?php
				if(!empty($_POST[ "comment" ]) && !empty($_POST[ "name" ])){
				$fp=fopen($filename, 'a');
		 		fwrite($fp,$string."\n");
		 		fclose($fp);
		 		}
		 	if(!empty($_POST[ "erasion" ])){
		 		$array=file($filename);
		 		$fp=fopen($filename, 'w');
		 		foreach($array as $element){
					$array=explode($delimiter, $element);
					$num=$array[0];
					$num=(int)$num;
				}if($_POST[ "erasion" ]!=$num){//この際に上書きと同時に番号を振り直す方法もある
				fwrite($fp, $element."\n");
		 		}
		 		fclose($fp);
		 		}
		 	   if($_POST[ "edit-num" ]==$num){//この中でfclose()
		 	   $array=file($filename);
		 		$fp=fopen($filename, 'w');
		 		fwrite($fp, $string."\n");
				fclose($fp);
				}else{$array=file($filename);
		 		$fp=fopen($filename, 'w');
		 		fwrite($fp, $element. "\n");
				}
				fclose($fp);
		 		$array=file($filename);
		 		foreach($array as $element){
				$spilitted_string=explode($delimiter, $element);//$stringが前半での定義。表示が投稿・編集時にしかできない
				echo  $element. "<br/>\n";
				}
			?>
	</body>
</html>