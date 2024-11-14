<?php
require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_ALUMNO.php";

ejecutaServicio(function () {
    $lista = select(pdo: Bd::pdo(), from: ALUMNO, orderBy: ALUM_NOMBRE);
    
    // Inicia la lista de descripción con clases de Bootstrap
    $render = "<dl class='row'>";
    
    foreach ($lista as $modelo) {
        $encodeId = urlencode($modelo[ALUM_ID]);
        $id = htmlentities($encodeId);
        $nombre = htmlentities($modelo[ALUM_NOMBRE]);
        $apellido_p = htmlentities($modelo[ALUM_APELLIDO_P]);
        $apellido_m = htmlentities($modelo[ALUM_APELLIDO_M]);
        $matricula = htmlentities($modelo[ALUM_MATRICULA]);
        $carrera = htmlentities($modelo[ALUM_CARRERA]);
        
        $render .= "
            <div class='col-12'>
               <dt>
               <a href='modifica.html?id=$id'>$nombre $apellido_p $apellido_m</a>
               </dt>
               <dd><a href='modifica.html?id=$id'>$matricula, $carrera</a></dd>
            </div>
            <button class='btn btn-secondary col-12 my-2' disabled>────────────</button>
        ";
    }

    $render .= "</dl>"; // Cerrar el <dl> de la lista

    devuelveJson(["tabla" => ["innerHTML" => $render]]);
});
