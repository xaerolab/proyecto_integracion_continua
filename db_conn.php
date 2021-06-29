<?php  
    $servername = 'localhost';
    $password = '';
    $username = 'root';
    $data_base = 'hojas_de_vida';

    error_reporting(0);

    $db = mysqli_connect($servername, $username, $password, $data_base);

    if (!$db) {
        $error_conexion = ['error' => false,
                        'msj' => 'error de conexion'
                            ];
        die(json_encode($error_conexion));
    }

    mysqli_set_charset($db,"utf8");

?>