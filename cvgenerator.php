<?php 
include 'db_conn.php';
//librerias to pdf
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;


require_once __DIR__ . '/vendor/autoload.php';

Sentry\init(['dsn' => 'https://a6d1e246d11c4903886843ceeb006ed4@o888768.ingest.sentry.io/5838436' ]);



try {
    $this->functionFailsForSure();
} catch (\Throwable $exception) {
    \Sentry\captureException($exception);
}

//declaracion de variables // captura de datos desde el formulario
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$perfil = $_POST['perfil'];
$formacion = $_POST['formacion'];
$experiencia = $_POST['experiencia'];
$idiomas = $_POST['idiomas'];

//insertar en la base de datos

$query = "INSERT INTO datos_personales (nombres,apellidos,correo,telefono,direccion,perfil,formacion,experiencia,idiomas)
          VALUES ('$nombres','$apellidos','$correo','$telefono','$direccion','$perfil','$formacion','$experiencia','$idiomas')";

$result = mysqli_query($db,$query);

//creacion del pdf
$htmlPdf = '<!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="css/bootstrap.min.css"><!-- bootstrap -->
                    <title>Hoja de Vida</title>
                </head>
                <body>
                    <header class="d-print-none">
                        <div class="container text-center text-lg-left">
                        <div class="py-3 clearfix">
                            <h1 class="site-title mb-0">'.$nombres.' '.$apellidos.'</h1>
                            <div class="site-nav">
                            <nav role="navigation">
                                <h2>'.$correo.'</h2>
                            </nav>
                            </div>
                        </div>
                        </div>
                    </header>

                    <div class="container">
                        <h3>'.$nombres.'</h3> 
                        <h3>'.$apellidos.'</h3>
                        <h3>'.$correo.'</h3>
                        <h3>'.$telefono.'</h3>
                        <h3>'.$direccion.'</h3>
                        <h3>'.$perfil.'</h3>
                        <h3>'.$formacion.'</h3>
                        <h3>'.$experiencia.'</h3>
                        <h3>'.$idiomas.'</h3>
                    </div>
                    <script src="scripts/bootstrap.bundle.min.js"></script>
                </body>
                </html>';

//habilitamos las opciones de dompdf
$pdfOptions = new Options();
$pdfOptions->set('isRemoteEnabled',TRUE);

//creamos el pdf
$dompdf = new Dompdf();
$dompdf = new Dompdf();

$dompdf->loadHtml($htmlPdf);
$dompdf->setPaper('letter', 'portrait');
$dompdf->render();
$dompdf->stream();

?>