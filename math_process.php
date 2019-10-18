<?php
include 'MathClass.php';

if (isset($_POST['a']) && isset($_POST['a1']) && isset($_POST['a2'])) {
    $apple = new Hitung((int)$_POST['a1'], (int)$_POST['a2'], $_POST['a']);
    echo json_encode($apple->get(), JSON_PRETTY_PRINT);
}
