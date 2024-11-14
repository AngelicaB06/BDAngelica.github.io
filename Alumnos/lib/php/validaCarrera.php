<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaCarrera(false|string $carrera)
{
    if ($carrera === false) {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Falta la Carrera.",
            type: "/error/faltacarrera.html",
            detail: "La solicitud no tiene el valor de Carrera."
        );
    }

    $trimCarrera = trim($carrera);

    if ($trimCarrera === "") {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Carrera en blanco.",
            type: "/error/carrerablanca.html",
            detail: "Pon texto en el campo Carrera."
        );
    }

    if (strlen($trimCarrera) < 3) {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Carrera demasiado corta.",
            type: "/error/carreracorta.html",
            detail: "La Carrera debe tener mínimo 3 caracteres."
        );
    }

    return $trimCarrera;
}
