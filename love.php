<?php
	include("bd.php");
	$id = intval($_POST['id']);
	$count = 0;
	$message = '';
	$error = true;
	
	if($id){
		/** Обновляем количество лайков в статье */
		
		$query = $pdo->prepare("UPDATE post SET love = love+1  WHERE id = :id");
		$query->execute(array(':id'=>$id));
		
		/** Выбираем количество лайков в статье */
		$query = $pdo->prepare("SELECT love FROM post WHERE id = :id");
		$query->execute(array(':id'=>$id));
		$result = $query->fetch(PDO::FETCH_ASSOC);
		$count = isset($result['love']) ? $result['love']  : 0;
		
		$error = false;
	}else{
		/** Если ID пуст - возвращаем ошибку */
		
		$error = true;
		$message = 'Статья не найдена';
	}
	 
	/** Возвращаем ответ скрипту */
	 
	// Формируем масив данных для отправки
	$out = array(
		'error' => $error,
		'message' => $message,
		'count' => $count,
	);
	 
	// Устанавливаем заголовок ответа в формате json
	header('Content-Type: text/json; charset=utf-8');
	 
	// Кодируем данные в формат json и отправляем
	echo json_encode($out);
?>