<?php
    // создать короткое имя переменной
    $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>

<html>
<head>
    <title>eSpring - Заказы клиентов</title>
</head>
<body>
<h1>eSpring - система очистки воды</h1>
<h2>Заказы клиентов</h2>
    
<?php
  
    // Считывание всего файла.
    // Каждый заказ становится элементом массива
    $orders = file ("$DOCUMENT_ROOT/water/orders/orders.txt");
    // Подсчет количества заказов, хранящихся в массиве
    $number_of_orders = count($orders);
    if ($number_of_orders == 0) {
        echo '<p><strong>Нет ожидающих заказов.
        Пожалуйста, попытайтесь позже.</strong></p>';
    }
    echo "<table border = 1>\n";
    echo '<tr><th bgcolor = "#c9e8f6">Дата заказа</th>
              <th bgcolor = "#c9e8f6">Товар</th>
              <th bgcolor = "#c9e8f6">Сумма</th>
              <th bgcolor = "#c9e8f6">Имя</th>
              <th bgcolor = "#c9e8f6">Телефон</th>
              <th bgcolor = "#c9e8f6">e-mail</th>
          </tr>';
    for ($i = 0; $i < $number_of_orders; $i++)
    {
        // Разбиение строк
        $line = explode( "\t", $orders[$i]);
        // Сохранение только количества заказанных товаров
        $line[2] = intval($line[2]);
        $line[4] = intval($line[4]);
        // Вывод заказов
        echo "<tr>".
                  "<td>".$line[0]."</td>".
                  "<td>".$line[1]."</td>".
                  "<td align = \"center\">".$line[2]."</td>".
                  "<td>".$line[3]."</td>".
                  "<td>".$line[4]."</td>".
                  "<td>".$line[5]."</td>".
              "</tr>";
    }
    echo "</table>";
    
?>
    
</body>
</html>