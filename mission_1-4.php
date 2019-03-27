<head>
	<meta charset= "UTF-8" >
</head>
<html>
	<head>
		<title>mission1-4</title>
	</head>
	<body>
		<form action= "mission_1-4.php" method= "post" >
			<input type= "text" name= "comment" placeholder= "コメント" size= "80" >
			<input type= "submit" , name= "submit", value= "送信" > <br>
		</form>
		<?php
			$comment=$_POST[ "comment" ];
			if(!empty($_POST["comment"])){			
			$filename='mission_1-5.txt';
		 	$fp=fopen($filename, 'a');
		 	fwrite($fp,$comment."\n");
		 	fclose($fp);
		 	if($_POST[ "comment" ]=== "完成!"){
		 	echo "おめでとう!";
		 	}else{
		 	echo $comment. "  ". "を受け付けました" ;
			}	
			}else	{echo "コメントが入力されていません";
		 	}		
		 	?>
	</body>
</html>