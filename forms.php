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
            date_default_timezone_set('Asia/Yekaterinburg');
            $date = date('d.m.Y, H:i');
            
            $filters = $_POST['filters'];     // Создаем короткие имена переменных
            $username = $_POST['username'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $order = ' ';
            $totalamount = 0;
      
            define('FILTER_WAR5_ADD_PRICE', 53700);   // Создаем константы с ценами
            define('FILTER_WAR5_MAIN_PRICE', 53700);
            define('FILTER_WAR2_ADD_PRICE', 48865);
            define('FILTER_WAR2_MAIN_PRICE', 48865);
            define('MOUNT_PRICE', 2415);
            define('PREFILTER_PRICE', 1705);
            define('CARTRIDGE_PRICE', 11940);
            
            $products = array( array( 'eSpring, гарантия 5 лет, доп. кран', 'eSpring, с гарантией 5 лет, подключение к дополнительному крану', '53 700'),
                               array( 'eSpring, гарантия 5 лет, осн. кран', 'eSpring, с гарантией 5 лет, подключение к основному крану', '53 700'),
                               array( 'eSpring, гарантия 2 года, доп. кран', 'eSpring, с гарантией 2 года, подключение к дополнительному крану', '48 865'),
                               array( 'eSpring, гарантия 2 года, осн. кран', 'eSpring, с гарантией 2 года, подключение к основному крану', '48 865'),
                               array( 'Крепление к стене', 'Крепление системы eSpring к стене', '2 415'),
                               array( 'Префильтр', 'Префильтр', '1 705'),
                               array( 'Картридж', 'Сменный картридж', '11 940'));
            
            echo '<p>Заказ обработан в ';
            echo $date;
            echo '</p>';
            
            echo '<p>Ваш заказ: </p>';
            
            switch($filters)         // Вывод информации о заказе
            {
                case 'filter_war5_add':
                    echo '<p>'.$products[0][1].'</p>';
                    echo '<p>К оплате: '.$products[0][2].' руб.</p>';
                    $order = $products[0][0];
                    $totalamount = 53700;
                break;
                case 'filter_war5_main':
                    echo '<p>'.$products[1][1].'</p>';
                    echo '<p>К оплате: '.$products[1][2].' руб.</p>';
                    $order = $products[1][0];
                    $totalamount = 53700;
                break;
                case 'filter_war2_add':
                    echo '<p>'.$products[2][1].'</p>';
                    echo '<p>К оплате: '.$products[2][2].' руб.</p>';
                    $order = $products[2][0];
                    $totalamount = 48865;
                break;
                case 'filter_war2_main':
                    echo '<p>'.$products[3][1].'</p>';
                    echo '<p>К оплате: '.$products[3][2].' руб.</p>';
                    $order = $products[3][0];
                    $totalamount = 48865;
                break;
                case 'mount':
                    echo '<p>'.$products[4][1].'</p>';
                    echo '<p>К оплате: '.$products[4][2].' руб.</p>';
                    $order = $products[4][0];
                    $totalamount = 2415;
                break;
                case 'prefilter':
                    echo '<p>'.$products[5][1].'</p>';
                    echo '<p>К оплате: '.$products[5][2].' руб.</p>';
                    $order = $products[5][0];
                    $totalamount = 1705;
                break;
                case 'cartridge':
                    echo '<p>'.$products[6][1].'</p>';
                    echo '<p>К оплате: '.$products[6][2].' руб.</p>';
                    $order = $products[6][0];
                    $totalamount = 11940;
                break;
            }
            
                                  // Работа с файлами
            
            $outputstring = $date."\t".$order."\t".$totalamount."\t".$username."\t".$phone."\t".$email."\n";
            
            @ $fp = fopen("orders/orders.txt", 'ab');
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
    ?>
            
        </div>        
    </div>
    </body>
</html>
















