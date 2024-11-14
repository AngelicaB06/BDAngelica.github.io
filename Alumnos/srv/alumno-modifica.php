<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/validaApellidoP.php";
require_once __DIR__ . "/../lib/php/validaApellidoM.php";
require_once __DIR__ . "/../lib/php/validaMatricula.php";
require_once __DIR__ . "/../lib/php/validaCarrera.php";
require_once __DIR__ . "/../lib/php/update.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_ALUMNO.php";

ejecutaServicio(function () {

 $id = recuperaIdEntero("id");
 $nombre = recuperaTexto("nombre");
 $apellido_p = recuperaTexto("apellido_p");
 $apellido_m = recuperaTexto("apellido_m");
 $matricula = recuperaTexto("matricula");
 $carrera = recuperaTexto("carrera");

 $nombre = validaNombre($nombre);
 $apellido_p = validaApellidoP($apellido_p);
 $apellido_m = validaApellidoM($apellido_m);
 $matricula = validaMatricula($matricula);
 $carrera = validaCarrera($carrera);

 update(
  pdo: Bd::pdo(),
  table: ALUMNO,
  set: [
    ALUM_NOMBRE => $nombre,
    ALUM_APELLIDO_P => $apellido_p,
    ALUM_APELLIDO_M => $apellido_m,
    ALUM_MATRICULA => $matricula,
    ALUM_CARRERA => $carrera
  ],
  where: [ALUM_ID => $id]
 );

 devuelveJson([
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "apellido_p" => ["value" => $apellido_p],
  "apellido_m" => ["value" => $apellido_m],
  "matricula" => ["value" => $matricula],
  "carrera" => ["value" => $carrera],
 ]);
});
