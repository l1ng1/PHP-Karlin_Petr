<?php 
// Задачи на preg_match[_all] Задачи не всегда можно решить с помощью одной 
// только регулярки. Может понадобится еще что-нибудь дописать на PHP 
// (не всегда, но такое может быть). С помощью preg_match узнайте является 
// ли строка числом, длиной до 12 цифр.

$str = '123456789';//входная строка
$ptrn = '/^[0-9]{1,12}$/';//регуляроне выражение

if(preg_match($ptrn,$str) == 1){//проверка на существование строки подходящей под регулярное выражение
    echo('Строка является числом длинною от 1 до 12 символов<br><br>');// вывод
}
else{
    echo 'Строка содержит буквы или длинна числа больше 12<br><br>';// вывод
}


//Задачи на preg_match[_all] Задачи не всегда можно решить с помощью 
// одной только регулярки. Может понадобится еще что-нибудь дописать 
// на PHP (не всегда, но такое может быть). С помощью preg_match определите, 
// что переданная строка является емэйлом. Примеры емэйлов для тестирования 
// mymail@mail.ru, my.mail@mail.ru, my-mail@mail.ru, my_mail@mail.ru, mail@mail.com, mail@mail.by, mail@yandex.ru.


$pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';//регулярное выражение
$emails = ["mymail@mail.ru", "my.mail@mail.ru", "my-mail@mail.ru", "my_mail@mail.ru", "mail@mail.com", "mail@mail.by", "mail@yandex.ru."];
//массив с входными строками

foreach($emails as $email){//проходимся по массиву со строками
    if (preg_match($pattern, $email)) {//проверка на существование строки подходящей под регулярное выражение
        echo "Строка является емэйлом.  ".$email.'<br>';//вывод
    } else {
        echo "Строка не является емэйлом.   ".$email.'<br>';//вывод
    }
}
echo '<br><br><br>';

//На обратный слеш \ Дана строка 'a\a a\a a\\\a'. Напишите регулярку, которая заменит строку 'a\\a' на '!'.

$str2 = 'a\a a\a a\\\a';
$ptrn2 = '/a\\\{2}a/';

echo(preg_replace($ptrn2,'!',$str2));
echo '<br><br>';

//На preg_replace_callback Дана строка с целыми числами. 
// С помощью регулярки преобразуйте строку так, 
// чтобы вместо этих чисел стояли их квадраты.

function repSq($str){
    echo $str.'- исоходная строка<br><br>';
    $ptr = '/\d+/';
    $finalStr =$str;
    preg_match_all($ptr,$str,$nums);
    foreach ($nums[0] as $key => $value) {
        $finalStr = str_replace($value, $value**2, $finalStr);
    }
    echo $finalStr;
}

repSq('44 машины и 2 пешки<br><br>');


//На '^', '$' Дана строка 'aaa aaa aaa'. Напишите регулярку, которая заменит последнее 'aaa' на '!'.

function repA($str){
$ptrn = '/a{3}$/';
echo(preg_replace($ptrn,'!',$str));
}
repA('aaa aaa aaa');




?>