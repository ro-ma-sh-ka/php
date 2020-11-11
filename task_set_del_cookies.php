<?php
//php уровень 1:
//Необходимо сделать форму для авторизации на сайте, для этого делаются 3 обязательных поля:
//login, password, email. Если верно ввели - записываем в куки специальный ключ,
//при наличии которого выводим человеку кнопку "выйти из сайта".
//В момент выхода - удалить созданную куку..

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	if($name == 'Roma' && $email == 'test@mail.ru' && $password == '123') {
		setcookie('checking', 'ok', time()+20);
		header('Location: ' .$_SERVER["HTTP_REFERER"]);
	} else {
		$name = '';
		$email = '';
		$password = '';
		setcookie('checking', 'nok', time()+10);
		echo 'It is not right!<br>';
		$form = "
		<form action = '' method = 'post'>
			<input type = 'submit' name = 'submit_3' value = 'Try again'>
		</form>";
		echo $form;
	}
}

if (isset($_POST['submit_3'])) {
	header('Location: ' .$_SERVER["HTTP_REFERER"]);
}

if (isset($_POST['submit_2'])) {
	setcookie('checking', 'ok', time()-3600);
	header('Location: ' .$_SERVER["HTTP_REFERER"]);
}

if ($_COOKIE['checking'] == 'ok') {
	echo 'cookie: '.$_COOKIE['checking'].'<br>';
	$form = "
	<form action = '' method = 'post'>
		<input type = 'submit' name = 'submit_2' value = 'Logout'>
	</form>";
	echo $form;
} elseif ($_COOKIE['checking'] != 'nok') {
	$form = "
	<form action = '' method = 'post'>
		<p>Input your login: <input type = 'text' name = 'name'></p>
		<p>Input your email: <input type = 'email' name = 'email'><p>
		<p>Input password: <input type = 'password' name = 'password' size = 20></p>
		<input type = 'submit' name = 'submit' value = 'Login'>
	</form>";
	echo $form;
}

?>
