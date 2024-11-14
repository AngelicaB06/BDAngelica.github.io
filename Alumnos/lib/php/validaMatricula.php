<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaMatricula(false|string $matricula)
{
    if ($matricula === false) {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Falta la Matrícula.",
            type: "/error/faltamatricula.html",
            detail: "La solicitud no tiene el valor de Matrícula."
        );
    }

    $trimMatricula = trim($matricula);

    if ($trimMatricula === "") {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Matrícula en blanco.",
            type: "/error/matriculablanca.html",
            detail: "Pon texto en el campo Matrícula."
        );
    }

    if (strlen($trimMatricula) < 5) {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Matrícula demasiado corta.",
            type: "/error/matriculacorta.html",
            detail: "La Matrícula debe tener mínimo 5 caracteres."
        );
    }

    return $trimMatricula;
}
