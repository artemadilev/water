<html>
    <head>
        <meta charset="utf-8">
        <title>Панель администратора</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div>
            <a href="index.php?action=add">Добавить статью</a>
            <table border="1">
                <tr>
                    <th>Дата</th>
                    <th>Заголовок</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach($articles as $a); ?>
                <tr>
                    <td><?php=$a['date']?></td>
                    <td><?php=$a['title']?></td>
                    <td><a href="index.php?action=edit&id=><?php=$a['id']?>">Редактировать</a></td>
                    <td><a href="index.php?action=delete&id=><?php=$a['id']?>">Удалить</a></td>
                </tr>
                <?php endforeach ?>
            </table>
        </div>
    </body>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
</html>