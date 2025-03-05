<?php
require 'calucalatorLib/evalmath.class.php';
$calculator = new EvalMath;
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = file_get_contents('php://input');
    $json = json_decode($data, true);

    if ($json && isset($json['term'])) {
        $term = $json['term'];
        $res = $calculator->evaluate($term);
        $ans = ['term' => $res];
        echo json_encode($ans);
    } else {
        echo json_encode(['error' => 'Данные не переданы или неверный формат.']);
    }
} else {
    echo json_encode(['error' => 'Метод запроса не POST.']);
}
?>