<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Обработка форм eSpring</title>
    </head>
    <body>
    
    <div style="text-align: center; padding-top: 100px; margin-left: 40%; width: 350px">
    <h1>Система очистки воды eSpring</h1>
    <h2>Результат заказа:</h2>
        <div style="text-align: left; width: 400px;">
             
    <?php
            header("Content-type: text/html; charset=utf-8");
            include "../config/config.php";
            
            date_default_timezone_set('Asia/Yekaterinburg');
            $date = date('d.m.Y, H:i');
            
            $filters = $_POST['filters'];     // Создаем короткие имена переменных
            $username = $_POST['username'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $order = ' ';
            $totalamount = 0;
          
            $products = array( array( 'eSpring, гарантия 5 лет, доп. кран', 'eSpring, с гарантией 5 лет, подключение к дополнительному крану', 53700),
                               array( 'eSpring, гарантия 5 лет, осн. кран', 'eSpring, с гарантией 5 лет, подключение к основному крану', 53700),
                               array( 'eSpring, гарантия 2 года, доп. кран', 'eSpring, с гарантией 2 года, подключение к дополнительному крану', 48865),
                               array( 'eSpring, гарантия 2 года, осн. кран', 'eSpring, с гарантией 2 года, подключение к основному крану', 48865),
                               array( 'Крепление к стене', 'Крепление системы eSpring к стене', 2415),
                               array( 'Префильтр', 'Префильтр', 1705),
                               array( 'Картридж', 'Сменный картридж', 11940));
            
            echo '<p>Заказ обработан в ';
            echo $date;
            echo '</p>';
            
            echo '<p>Ваш заказ: </p>';
            
            switch($filters)         // Вывод информации о заказе
            {
                case 'filter_war5_add':
                    $order = $products[0][0];
                    $totalamount = $products[0][2];
                    echo '<p>'.$products[0][1].'</p>';
                    echo '<p>К оплате: '.space($totalamount).' руб.</p>';
                break;
                case 'filter_war5_main':
                    $order = $products[1][0];
                    $totalamount = $products[1][2];
                    echo '<p>'.$products[1][1].'</p>';
                    echo '<p>К оплате: '.space($totalamount).' руб.</p>';
                break;
                case 'filter_war2_add':
                    $order = $products[2][0];
                    $totalamount = $products[2][2];
                    echo '<p>'.$products[2][1].'</p>';
                    echo '<p>К оплате: '.space($totalamount).' руб.</p>';
                break;
                case 'filter_war2_main':
                    $order = $products[3][0];
                    $totalamount = $products[3][2];
                    echo '<p>'.$products[3][1].'</p>';
                    echo '<p>К оплате: '.space($totalamount).' руб.</p>';
                break;
                case 'mount':
                    $order = $products[4][0];
                    $totalamount = $products[4][2];
                    echo '<p>'.$products[4][1].'</p>';
                    echo '<p>К оплате: '.space($totalamount).' руб.</p>';
                break;
                case 'prefilter':
                    $order = $products[5][0];
                    $totalamount = $products[5][2];
                    echo '<p>'.$products[5][1].'</p>';
                    echo '<p>К оплате: '.space($totalamount).' руб.</p>';
                break;
                case 'cartridge':
                    $order = $products[6][0];
                    $totalamount = $products[6][2];
                    echo '<p>'.$products[6][1].'</p>';
                    echo '<p>К оплате: '.space($totalamount).' руб.</p>';
                break;
            }
            
                                  // Работа с файлами
            /*
            $outputstring = $date."\t".$order."\t".$totalamount."\t".$username."\t".$phone."\t".$email."\n";
            
            @ $fp = fopen("../orders/orders.txt", 'ab');
            if (!$fp)
            {
                echo '<p><strong>В настроящий момент Ваш запрос не может быть обработан. '
                    .'Пожалуйста, попытайтесь позже.</strong></p></body></html>';
                exit;
            }           
            flock($fp, LOCK_EX); // Блокирование файла для записи
            fwrite($fp, $outputstring, strlen($outputstring));
            flock($fp, LOCK_UN); // Снятие блокировки на запись
            fclose($fp);
            
            echo '<p>Заказ записан</p>';
            */
            
            // Попытка записи данных в БД
            @ $db = new mysqli('localhost', 'root', '560017pas', 'espring');
            if (mysqli_connect_errno())
            {
                echo 'Ошибка: Не удалось установить соединение с базой данных.
                Пожалуйста, повторите попытку позже.';
                exit;
            }
            
            $query = "insert into customers values
                      ('".NULL."', '".$username."', '".$email."', '".$phone."')";
            $result = $db->query($query);
            if($result)
                echo $db->affected_rows." книг(а, и) добавлено в базу данных.";
            
    ?>
            
        </div>        
    </div>
    </body>
</html>


