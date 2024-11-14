<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaApellidoM(false|string $apellidoM)
{
    if ($apellidoM === false) {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Falta el apellido_materno.",
            type: "/error/faltaapellidom.html",
            detail: "La solicitud no tiene el valor de apellido_materno."
        );
    }

    $trimApellidoM = trim($apellidoM);

    if ($trimApellidoM === "") {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "apellido_materno en blanco.",
            type: "/error/apellidomblanco.html",
            detail: "Pon texto en el campo apellido_materno."
        );
    }

    if (strlen($trimApellidoM) <= 2) {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "apellido_materno demasiado corto.",
            type: "/error/apellidomcorto.html",
            detail: "El apellido_materno debe tener mínimo 3 caracteres."
        );
    }

    return $trimApellidoM;
}
