<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaApellidoP(false|string $apellidoP)
{
    if ($apellidoP === false) {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Falta el apellido_paterno.",
            type: "/error/faltaapellidop.html",
            detail: "La solicitud no tiene el valor de apellido_paterno."
        );
    }

    $trimApellidoP = trim($apellidoP);

    if ($trimApellidoP === "") {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "apellido_paterno en blanco.",
            type: "/error/apellidopblanco.html",
            detail: "Pon texto en el campo apellido_paterno."
        );
    }

    if (strlen($trimApellidoP) <= 2) {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "apellido_paterno demasiado corto.",
            type: "/error/apellidopcorto.html",
            detail: "El apellido_paterno debe tener mínimo 3 caracteres."
        );
    }

    return $trimApellidoP;
}
