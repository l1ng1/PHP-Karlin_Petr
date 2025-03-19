<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="get">
    <label for="">Ваша дата рождения</label>    
    <input name="DoB" type="date">
    <button type="submit">Отправить</button>
    </form>
</body>
</html>

<?php 

if(!isset($_COOKIE['DoB'])){//Проверям,зада ли у нас куки ,в которой храниться информация о дне рождения пользователя
    if(isset($_GET['DoB'])){//Если ее нет,то ожидаем get зпрос с параметром DoB(Дата рождения)
        setcookie('DoB',$_GET['DoB'],time()+3600,'/');//Если у нас есть этот параметр,то 
                                                            // создаем новые куки,где будет храниться дата рождения пользователя
        $birthday = $_GET['DoB'];//Выполняем вычисление дней оставшихя до дня рождения
        $today = new DateTime();//
        $birthdayThisYear = new DateTime($birthday);//
        if ($today > $birthdayThisYear) {//
            $birthdayThisYear->modify('+1 year');//
        }//
        $interval = $today->diff($birthdayThisYear);//
        echo "Количество дней оставшихся до вашего дня рождения: " . $interval->days;//Выводим информацию
    }
    else{//Если кук нет,и параметра DoB в get Запросе нет,то выводим сообщение ниже
        echo 'Вы не ввели дату рождения';
    }
}
else{//Если у нас есть информация о дате рождения пользователя,то выполняем код ниже
    $birthday = $_COOKIE['DoB'];//Выполняем вычисление дней оставшихя до дня рождения
    $today = new DateTime();//
    $birthdayThisYear = new DateTime($birthday);//
    if ($today > $birthdayThisYear) {//
        $birthdayThisYear->modify('+1 year');//
    }//
    $interval = $today->diff($birthdayThisYear);//
    echo "Количество дней оставшихся до вашего дня рождения: " . $interval->days;//Выводим информацию
}




?>