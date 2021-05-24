<?php 
include 'connectBD.php'; // Подключение к БД

//createProduct(); // вызов функции создания продукта. // Аргумент: название товара, название категории;
//deleteProduct(); // вызов функции пометки "Удалено" для продукта. // Аргумент: название товара;
//createCategory(); // вызов функции создания категории.// Аргумент: название категории;
//deleteCategory(); // вызов функции удаления категории.//Аргумент: название категории;
//getProducts(); // Вывод списка продуктов. // без аругмента

// Функции
function createCategory($category) { // Создание категории
	global $connect;
	$res = $connect->query("SELECT * from categories WHERE category = '$category'"); // Проверка на существование категории в БД.
	if ($res->num_rows > 0) { // Если существует, то ошибка.
		echo "Данное название категории занято";
	} else {
		$res = $connect->query("INSERT INTO `categories` (`category`) VALUES ('$category')"); // Если нет, то создать категорию.
		echo "Категория создана";
	}
}

function deleteCategory($category) { // Удаление категории
	global $connect;
	$res = $connect->query("SELECT * from products WHERE name_cat = '$category'"); // Проверка наличия прикрепленной категории в товарах
	if ($res->num_rows == 0 OR $res->num_rows >0 ) { // Если прикреплена, то ошибка.
		echo "Данной категории не существует, или она прикреплена к товару. Удаление невозможно.";
	} else {
		$res = $connect->query("DELETE FROM `categories` WHERE category = '$category'"); // Если нет, то удалить категорию.
		echo "Категория удалена";
	}
} 

function createProduct($product, $category) { // Создание товара
	global $connect;
	$res = $connect->query("SELECT * from products WHERE name = '$product'"); // Проверка на существование товара в БД.
	if ($res->num_rows > 0) { // Если существует, то ошибка.
		echo "Данное название товара занято";
	} else {
		$res = $connect->query("INSERT INTO `products` (`name`, `name_cat`) VALUES ('$product', '$category')"); // Если нет, то создать товар.
		echo "Товар создан";
	}
} 

function editProduct() { // Редактирование товара
} 

function deleteProduct($product) { // Удаление товара
	global $connect;
	$res = $connect->query("SELECT * from products WHERE name = '$product'"); // Проверка на существование товара в БД.
	if ($res->num_rows == 0) { // Если не существует, то ошибка.
		echo "Данного товара не существует";
	} else {
		$res = $connect->query("UPDATE `products` SET `deleted`= 1 WHERE name = '$product'"); // Если есть, то пометить товар "удалено".
		echo "Продукт удалён";
	}
} 

function getProducts() {
	global $connect;
	$res = $connect->query("SELECT * FROM products WHERE name'"); // Запрос получения всех продуктов
	if ($res->num_rows == 0) { // Если нет записей, то ошибка.
		echo "Отсутствуют товары";
	} else
		while ($result = mysql_fetch_assoc($res, MYSQL_ASSOC)) {
			foreach ($result as $col_value) {
			echo "<td>$col_value</td>\n";
		}
	}
}
		
 ?>