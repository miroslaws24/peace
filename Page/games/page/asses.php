<?php
	session_start();
	include_once("../bd.php");
	$count = $_POST['count'];
	$id_game = $_POST['id'];
	$sql = " SELECT * FROM assesment WHERE id_user = '".$_SESSION['id']."' AND id_game = '".$_SESSION['game_id']."' ";
	$res = mysql_query($sql) or die ( "Error : ".mysql_error() );
	
	if(mysql_fetch_row($res) == 0){
		$query = " INSERT INTO assesment SET id_game ='".$_SESSION['game_id']."',id_user='".$_SESSION['id']."',count = '".$count."' ";
		$result = mysql_query($query) or die ( "Error : ".mysql_error() );
		echo $count;
		if($count == 1){
			echo '<script>
			var mark1 = document.getElementById("mark1");
			var mark2 = document.getElementById("mark2");
			var mark3 = document.getElementById("mark3");
			var mark4 = document.getElementById("mark4");
			var mark5 = document.getElementById("mark5");
			var mark6 = document.getElementById("mark6");
			var mark7 = document.getElementById("mark7");
			
			mark1.setAttribute("style","background-color: #7FCAFF;");
			mark2.setAttribute("style","background-color: #f1f1f1;");
			mark3.setAttribute("style","background-color: #f1f1f1;");
			mark4.setAttribute("style","background-color: #f1f1f1;");
			mark5.setAttribute("style","background-color: #f1f1f1;");
			mark6.setAttribute("style","background-color: #f1f1f1;");
			mark7.setAttribute("style","background-color: #f1f1f1;");
			</script>
			';
			
		}
		if($count == 2){
			echo '<script>
			mark1.setAttribute("style","background-color: #7FCAFF;");
			mark2.setAttribute("style","background-color: #7FCAFF;");
			mark3.setAttribute("style","background-color: #f1f1f1;");
			mark4.setAttribute("style","background-color: #f1f1f1;");
			mark5.setAttribute("style","background-color: #f1f1f1;");
			mark6.setAttribute("style","background-color: #f1f1f1;");
			mark7.setAttribute("style","background-color: #f1f1f1;");
			</script>';
		}
		if($count == 3){
			echo '<script>
			mark1.setAttribute("style","background-color: #7FCAFF;");
			mark2.setAttribute("style","background-color: #7FCAFF;");
			mark3.setAttribute("style","background-color: #7FCAFF;");
			mark4.setAttribute("style","background-color: #f1f1f1;");
			mark5.setAttribute("style","background-color: #f1f1f1;");
			mark6.setAttribute("style","background-color: #f1f1f1;");
			mark7.setAttribute("style","background-color: #f1f1f1;");
			</script>';
		}
		if($count == 4){
			echo '<script>
			mark1.setAttribute("style","background-color: #7FCAFF;");
			mark2.setAttribute("style","background-color: #7FCAFF;");
			mark3.setAttribute("style","background-color: #7FCAFF;");
			mark4.setAttribute("style","background-color: #7FCAFF;");
			mark5.setAttribute("style","background-color: #f1f1f1;");
			mark6.setAttribute("style","background-color: #f1f1f1;");
			mark7.setAttribute("style","background-color: #f1f1f1;");
			</script>';
		}
		if($count == 5){
			echo '<script>
			mark1.setAttribute("style","background-color: #7FCAFF;")
			mark2.setAttribute("style","background-color: #7FCAFF;")
			mark3.setAttribute("style","background-color: #7FCAFF;");
			mark4.setAttribute("style","background-color: #7FCAFF;");
			mark5.setAttribute("style","background-color: #7FCAFF;");
			mark6.setAttribute("style","background-color: #f1f1f1;");
			mark7.setAttribute("style","background-color: #f1f1f1;");
			</script>';
		}
		if($count == 6){
			echo '<script>
			mark1.setAttribute("style","background-color: #7FCAFF;")
			mark2.setAttribute("style","background-color: #7FCAFF;")
			mark3.setAttribute("style","background-color: #7FCAFF;");
			mark4.setAttribute("style","background-color: #7FCAFF;");
			mark5.setAttribute("style","background-color: #7FCAFF;");
			mark6.setAttribute("style","background-color: #7FCAFF;");
			mark7.setAttribute("style","background-color: #f1f1f1;");
			</script>';
		}
		if($count == 7){
			echo '<script>
			mark1.setAttribute("style","background-color: #7FCAFF;")
			mark2.setAttribute("style","background-color: #7FCAFF;")
			mark3.setAttribute("style","background-color: #7FCAFF;");
			mark4.setAttribute("style","background-color: #7FCAFF;");
			mark5.setAttribute("style","background-color: #7FCAFF;");
			mark6.setAttribute("style","background-color: #7FCAFF;");
			mark7.setAttribute("style","background-color: #7FCAFF;");
			</script>';
		}
	}
	else{
		$query = " UPDATE assesment SET id_game ='".$_SESSION['game_id']."',id_user='".$_SESSION['id']."',count = '".$count."' WHERE id_game = '".$_SESSION['game_id']."' AND id_user = '".$_SESSION['id']."' ";
		$result = mysql_query($query) or die ( "Error : ".mysql_error() );
		echo $count;
		if($count == 1){
			echo '<script>
			var mark1 = document.getElementById("mark1");
			var mark2 = document.getElementById("mark2");
			var mark3 = document.getElementById("mark3");
			var mark4 = document.getElementById("mark4");
			var mark5 = document.getElementById("mark5");
			var mark6 = document.getElementById("mark6");
			var mark7 = document.getElementById("mark7");
			
			mark1.setAttribute("style","background-color: #7FCAFF;");
			mark2.setAttribute("style","background-color: #f1f1f1;");
			mark3.setAttribute("style","background-color: #f1f1f1;");
			mark4.setAttribute("style","background-color: #f1f1f1;");
			mark5.setAttribute("style","background-color: #f1f1f1;");
			mark6.setAttribute("style","background-color: #f1f1f1;");
			mark7.setAttribute("style","background-color: #f1f1f1;");
			</script>
			';
			
		}
		if($count == 2){
			echo '<script>
			mark1.setAttribute("style","background-color: #7FCAFF;");
			mark2.setAttribute("style","background-color: #7FCAFF;");
			mark3.setAttribute("style","background-color: #f1f1f1;");
			mark4.setAttribute("style","background-color: #f1f1f1;");
			mark5.setAttribute("style","background-color: #f1f1f1;");
			mark6.setAttribute("style","background-color: #f1f1f1;");
			mark7.setAttribute("style","background-color: #f1f1f1;");
			</script>';
		}
		if($count == 3){
			echo '<script>
			mark1.setAttribute("style","background-color: #7FCAFF;");
			mark2.setAttribute("style","background-color: #7FCAFF;");
			mark3.setAttribute("style","background-color: #7FCAFF;");
			mark4.setAttribute("style","background-color: #f1f1f1;");
			mark5.setAttribute("style","background-color: #f1f1f1;");
			mark6.setAttribute("style","background-color: #f1f1f1;");
			mark7.setAttribute("style","background-color: #f1f1f1;");
			</script>';
		}
		if($count == 4){
			echo '<script>
			mark1.setAttribute("style","background-color: #7FCAFF;");
			mark2.setAttribute("style","background-color: #7FCAFF;");
			mark3.setAttribute("style","background-color: #7FCAFF;");
			mark4.setAttribute("style","background-color: #7FCAFF;");
			mark5.setAttribute("style","background-color: #f1f1f1;");
			mark6.setAttribute("style","background-color: #f1f1f1;");
			mark7.setAttribute("style","background-color: #f1f1f1;");
			</script>';
		}
		if($count == 5){
			echo '<script>
			mark1.setAttribute("style","background-color: #7FCAFF;")
			mark2.setAttribute("style","background-color: #7FCAFF;")
			mark3.setAttribute("style","background-color: #7FCAFF;");
			mark4.setAttribute("style","background-color: #7FCAFF;");
			mark5.setAttribute("style","background-color: #7FCAFF;");
			mark6.setAttribute("style","background-color: #f1f1f1;");
			mark7.setAttribute("style","background-color: #f1f1f1;");
			</script>';
		}
		if($count == 6){
			echo '<script>
			mark1.setAttribute("style","background-color: #7FCAFF;")
			mark2.setAttribute("style","background-color: #7FCAFF;")
			mark3.setAttribute("style","background-color: #7FCAFF;");
			mark4.setAttribute("style","background-color: #7FCAFF;");
			mark5.setAttribute("style","background-color: #7FCAFF;");
			mark6.setAttribute("style","background-color: #7FCAFF;");
			mark7.setAttribute("style","background-color: #f1f1f1;");
			</script>';
		}
		if($count == 7){
			echo '<script>
			mark1.setAttribute("style","background-color: #7FCAFF;")
			mark2.setAttribute("style","background-color: #7FCAFF;")
			mark3.setAttribute("style","background-color: #7FCAFF;");
			mark4.setAttribute("style","background-color: #7FCAFF;");
			mark5.setAttribute("style","background-color: #7FCAFF;");
			mark6.setAttribute("style","background-color: #7FCAFF;");
			mark7.setAttribute("style","background-color: #7FCAFF;");
			</script>';
		}
	}
?>