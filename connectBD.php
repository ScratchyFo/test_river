<?php 
$adress = 'localhost'; // Адрес БД сервера
$userbd = 'root'; // Юзер
$passbd = 'root'; // Пароль
$namebd = 'test'; // База данных

$connect = new mysqli($adress, $userbd, $passbd, $namebd); // коннект
if ($connect->connect_error) {
	die("Connected un successfully: " . $connect->connect_error);
}
 ?>