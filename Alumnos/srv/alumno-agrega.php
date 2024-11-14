<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/validaApellidoP.php";
require_once __DIR__ . "/../lib/php/validaApellidoM.php";
require_once __DIR__ . "/../lib/php/validaMatricula.php";
require_once __DIR__ . "/../lib/php/validaCarrera.php";
require_once __DIR__ . "/../lib/php/insert.php";
require_once __DIR__ . "/../lib/php/devuelveCreated.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_ALUMNO.php";

ejecutaServicio(function () {

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

 $pdo = Bd::pdo();
 insert(pdo: $pdo, into: ALUMNO, values: [
   ALUM_NOMBRE => $nombre,
   ALUM_APELLIDO_P => $apellido_p,
   ALUM_APELLIDO_M => $apellido_m,
   ALUM_MATRICULA => $matricula,
   ALUM_CARRERA => $carrera
 ]);
 $id = $pdo->lastInsertId();

 $encodeId = urlencode($id);
 devuelveCreated("/srv/alumno.php?id=$encodeId", [
  "id" => ["value" => $id],
  "nombre" => ["value" => $nombre],
  "apellido_p" => ["value" => $apellido_p],
  "apellido_m" => ["value" => $apellido_m],
  "matricula" => ["value" => $matricula],
  "carrera" => ["value" => $carrera],
 ]);
});
