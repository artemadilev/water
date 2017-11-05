<?php

        // Добавление пробелов в число, пример 10 000 вместо 10000
    function space($totalamount){
        $price = number_format($totalamount, 0, '.', ' ');
        return $price;
    }

?>