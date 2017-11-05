<?php
    // Создать короткое имя переменной
$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>

<html>
<head><title>eSpring - Заказы клиентов</title>
    <meta charset="utf-8" />
    </head>
<body>
    
    <h1>Система очистки воды eSpring</h1>
    <h2>Заказы клиентов</h2>
    
    <?php
        @ $fp = fopen("orders/orders.txt", 'rb');
        if (!$fp)
        {
            echo '<p><strong>Нет ожидающих заказов.'
                .'Пожалуйста, попытайтесь позже.</strong></p>';
            exit;
        }
    
    while (!feof($fp))
    {
        $order = fgets($fp, 999);
        echo $order. '<br />';
    }
    
    fclose($fp);
    ?>
    
</body>
</html>