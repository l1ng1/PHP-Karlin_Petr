<?php 
if (!isset($_COOKIE['count'])) {//Проверям если куки с именем 'count' у нашего пользователя
    setcookie('count', '1', time() + 3600, '/');//если их нет,то создаем новые со значением 1 и временем жизни 1 час
    echo "Вы посетили наш сайт впервые!";
} else {
    $newCount = $_COOKIE['count'] + 1;//если они есть,то увеличиваем их значение на 1
    setcookie('count', $newCount, time() + 3600, '/');//создаем новые куки с таким же именем,то есть заменяем
    echo $_COOKIE['count'].(' - количество ваших посещений этого сайта');//Выводим значение посещений(куки['count'])
}
?>