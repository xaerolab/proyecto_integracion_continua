<?php
$a =  array(
            array(
                  'nombre'=>'pepito',
                  'apellido' => 'perez',
                  'pais' => 'mexico',
                  'genero' => 'masculino',
                  'estatura' => '170cm'
            ),
            array(
                  'nombre'=>'carlos',
                  'apellido' => 'duty',
                  'pais' => 'colombia',
                  'genero' => 'masculino',
                  'estatura' => '175cm'
            ),
            array(
                  'nombre'=>'andrea',
                  'apellido' => 'jaramillo',
                  'pais' => 'españa',
                  'genero' => 'femenino',
                  'estatura' => '162cm'

            ),
            array(
                  'nombre'=>'hannibal',
                  'apellido' => 'lecter',
                  'pais' => 'estados unidos',
                  'genero' => 'masculino',
                  'estatura' => '185cm'
            )
      );

if($_SERVER['REQUEST_METHOD'] == 'POST'){
      echo json_encode($a,JSON_UNESCAPED_UNICODE);
}


?>