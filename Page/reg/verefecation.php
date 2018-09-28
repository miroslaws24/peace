<?php
	session_start();
	$url = 'index.php?id=';
?>
<style>
	.centr{
		width: 300px;
		height: 200px;
		margin: 20% auto;
		text-align: center;
	}
	.centr img{
		width: 40px;
		height: 40px;
	}
	.centr p{
		font-size: 14px;
		font-family: Arial;
	}
</style>
<?php
	if(isset($_SESSION['id'])){
		echo '
		<script language="JavaScript"> 
			window.location.href = "/site/'.$url.$_SESSION['id'].'"
		</script>';
	}
?>
<div class="centr">
	<p>Вы успешно вошли</p>
</div>
