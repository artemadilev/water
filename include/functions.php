<?php // Файл с функциями 

function all($link)
    {
        // Запрос
        $query =  "SELECT * FROM orders";
        $result = mysqli_query($link, $query);
        
        if(!$result)
            die(mysqli_error($link));
        
        // Извлечение из БД
        $n = mysqli_num_rows($result);
        $orders = array();
        for($i = 0; $i < $n; $i++)
        {
            $row = mysqli_fetch_assoc($result);
            $orders[] = $row;
        }
        return $orders;
    }

?>