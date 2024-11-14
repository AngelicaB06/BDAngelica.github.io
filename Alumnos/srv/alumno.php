<?php

require_once __DIR__ . "/../lib/php/NOT_FOUND.php";
require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/selectFirst.php";
require_once __DIR__ . "/../lib/php/ProblemDetails.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_ALUMNO.php";

ejecutaServicio(function () {

 $id = recuperaIdEntero("id");

 $modelo = selectFirst(pdo: Bd::pdo(), from: ALUMNO, where: [ALUM_ID => $id]);

 if ($modelo === false) {
  $idHtml = htmlentities($id);
  throw new ProblemDetails(
   status: NOT_FOUND,
   title: "Alumno no encontrado.",
   type: "/error/alumnonoencontrado.html",
   detail: "No se encontró ningún Alumno con el id $idHtml.",
  );
 }

 devuelveJson([
  "id" => ["value" => $id],
  "nombre" => ["value" => $modelo[ALUM_NOMBRE]],
  "apellido_p" => ["value" => $modelo[ALUM_APELLIDO_P]],
  "apellido_m" => ["value" => $modelo[ALUM_APELLIDO_M]],
  "matricula" => ["value" => $modelo[ALUM_MATRICULA]],
  "carrera" => ["value" => $modelo[ALUM_CARRERA]],
 ]);
});
