<?php

class Bd
{
 private static ?PDO $pdo = null;

 static function pdo(): PDO
 {
  if (self::$pdo === null) {

   self::$pdo = new PDO(
    // cadena de conexión
    "sqlite:srvbd.db",
    // usuario
    null,
    // contraseña
    null,
    // Opciones: pdos no persistentes y lanza excepciones.
    [PDO::ATTR_PERSISTENT => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
   );

   // Crear la tabla ALUMNO
   self::$pdo->exec(
    "CREATE TABLE IF NOT EXISTS ALUMNO (
      ALUM_ID INTEGER,
      ALUM_NOMBRE TEXT NOT NULL,
      ALUM_APELLIDO_P TEXT NOT NULL,
      ALUM_APELLIDO_M TEXT NOT NULL,
      ALUM_MATRICULA TEXT NOT NULL,
      ALUM_CARRERA TEXT NOT NULL,

      CONSTRAINT ALUM_PK
       PRIMARY KEY(ALUM_ID),

      CONSTRAINT ALUM_NOM_UNQ
       UNIQUE(ALUM_NOMBRE),

      CONSTRAINT ALUM_NOM_NV
       CHECK(LENGTH(ALUM_NOMBRE) > 0),
       
      CONSTRAINT ALUM_APELLIDO_P_NV
       CHECK(LENGTH(ALUM_APELLIDO_P) > 0),
       
      CONSTRAINT ALUM_APELLIDO_M_NV
       CHECK(LENGTH(ALUM_APELLIDO_M) > 0),
       
      CONSTRAINT ALUM_MATRICULA_NV
       CHECK(LENGTH(ALUM_MATRICULA) > 0),

      CONSTRAINT ALUM_CARRERA_NV
       CHECK(LENGTH(ALUM_CARRERA) > 0)
     )"
   );
  }

  return self::$pdo;
 }
}
