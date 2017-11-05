<html>
<body>
<?php

// указывается адрес, где находится (хостится) ваша база данных
$sdd_db_host='localhost';

// указывается имя базы данных, с которой скрипт будет работать.
// Это обязательно, так как баз может быть множество на одном сервере
$sdd_db_name='espring';

// логин доступа к базе данных
$sdd_db_user='root';

// пароль доступа к базе данных
$sdd_db_pass='560017pas';

// установка связи с сервером (@ подавление возможных ошибок)
@mysql_connect($sdd_db_host,$sdd_db_user,$sdd_db_pass);

// переключение на нужную базу данных
@mysql_select_db($sdd_db_name);

// делаем выборку из таблицы
$result=mysql_query('SELECT * FROM `customers`');

// выполнение SQL запроса и получение всех записей (строк) из таблицы `table_name`
while ($row=mysql_fetch_array($result))
{ // вывод данных
  echo '<p>Запись id='.$row['id'].'. Текст: '.$row['name'].'</p>';
}// /while
?>
</body>
</html>