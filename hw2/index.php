<?php 

$headers = get_headers('https://httpbin.org/post');


echo 'Ваши заголовки:';
print_r($headers);

?>