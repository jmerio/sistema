use sysacademy;

SELECT a.id_alumno as 'Carnet', CONCAT(p.primero_nombre, ' ', p.segundo_nombre, ' ',  p.primer_apellido, ' ', p.segundo_apellido)as 'Nombres' 
FROM alumno a Inner Join persona p;

/*
  INICIO VISTA PARA OBTENER LOS AÑOS LECTIVOS
*/
--Vista listado de años lectivos registrados
create view vistaALectivo as 
select anio_lectivocol from anio_lectivo;
/*
  FIN VISTA PARA OBTENER LOS AÑOS LECTIVOS
*/

/*
  INICIO VISTA PARA OBTENER ESTADO DE ALUMNOS
*/
--Vista listado de estado de alumnos
create view vistaEstadoAlumnos as 
select al.id_alumno,per.primero_nombre,per.primer_apellido,
al.estado from alumno as al inner join persona as per on
al.fk_persona = per.id_persona;
/*
  FIN VISTA PARA OBTENER ESTADO DE ALUMNOS
*/

/*
  INICIO VISTA PARA OBTENER ESTADO DE PROFESORES
*/
--Vista listado estado de profesores
create view vistaEstadoProfesor as
select pro.id_profesor, per.primero_nombre,per.primer_apellido,
pro.estado from profesor as pro inner join persona as per on 
pro.fk_persona = per.id_persona;
/*
  INICIO VISTA PARA OBTENER ESTADO DE PROFESORES
*/
--Prodcedimientos 
/*
  INICIO PROCEDIMIENTO ALMACENADO PARA INGRESAR ALUMNOS
*/
delimiter //
create procedure sp_ingresarAlumno(
in n1 varchar(45),in n2 varchar(45),in a1 varchar(45),in a2 varchar(45),
in mail varchar(45),in fecha date, in genero varchar(45), in direccion varchar(150),
in numero varchar(45), in telefono varchar(45), in estado bit(1))
begin
  insert into persona values(n1,n2,a1,a2,mail,fecha,genero);
  insert into alumno values(direccion,numero,telefono,estado,func_ultimoid());
end//
delimiter;

/*
  FIN PROCEDIMIENTO ALMACENADO PARA INGRESAR ALUMNOS
*/

/*
  INICIO PROCEDIMIENTO ALMACENADO PARA INGRESAR DOCENTES
*/
delimiter //
create procedure sp_ingresarProfesor(
in n1 varchar(45),in n2 varchar(45),in a1 varchar(45),in a2 varchar(45),
in mail varchar(45),in fecha date, in genero varchar(45), 
in numero varchar(45),in estado bit(1))
begin
  insert into persona values(n1,n2,a1,a2,mail,fecha,genero);
  insert into profesor value(estado,func_ultimoid(),numero);
end//
delimiter;

/*
  FIN PROCEDIMIENTO ALMACENADO PARA INGRESAR DOCENTES
*/

/*
  INICIO PROCEDIMIENTO ALMACENADO PARA OBTENER LOS CORREOS DE LOS ALUMNOS
*/

DROP procedure if exists sp_damelistacorreo;

CREATE PROCEDURE sp_damelistacorreo(pi_idstore INTEGER(10))
    NOT DETERMINISTIC
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN

  DECLARE vb_termina BOOL DEFAULT FALSE;
  DECLARE VV_LISTACORREOS VARCHAR(21800) default '';
  DECLARE VV_TmpEmail varchar(250) default '';

   DECLARE CR_Correos CURSOR 
       FOR  select p.correo                                
              from persona p Inner JOIN alumno a on p.id_persona = a.fk_persona;

           
   DECLARE CONTINUE HANDLER 
       FOR SQLSTATE '02000'
       SET vb_termina = TRUE;

  OPEN CR_Correos;
   Recorre_Cursor: LOOP
        FETCH CR_Correos INTO VV_TmpEmail;

        IF vb_termina THEN
            LEAVE Recorre_Cursor;
        END IF;

        set VV_LISTACORREOS = concat(VV_TmpEmail,';',VV_LISTACORREOS);

    END LOOP;
  CLOSE CR_Correos;

  SELECT VV_LISTACORREOS CORREOS;  

END;

call sp_damelistacorreo(1);
/*
  FIN PROCEDIMIENTO ALMACENADO PARA OBTENER LOS CORREOS DE LOS ALUMNOS
*/
--Funciones

--Funcion obtener ultimo id persona
delimiter //
create procedure func_ultimoid (out id int)
begin
  select max(id_persona) into id from persona;
end//
delimiter;



/*
  INICIO PROCEDIMIENTO ALMACENADO PARA OBTENER LOS DATOS DE LOS ALUMNOS
*/

DROP procedure if exists sp_damelistaAlumno;

CREATE PROCEDURE sp_damelistaAlumno()
    NOT DETERMINISTIC
    SQL SECURITY DEFINER
    COMMENT ''
BEGIN

  DECLARE vb_termina BOOL DEFAULT FALSE;
  DECLARE VV_LISTAAlumnos VARCHAR(21800) default '';
  DECLARE VV_TmpAlumno varchar(250) default '';

   DECLARE CR_Alumnos CURSOR 
       FOR  SELECT  CONCAT(p.primero_nombre, ' ', p.segundo_nombre, ' ',  p.primer_apellido, ' ', p.segundo_apellido)as 'Nombres' 
            FROM alumno a Inner Join persona p;

           
   DECLARE CONTINUE HANDLER 
       FOR SQLSTATE '02000'
       SET vb_termina = TRUE;

  OPEN CR_Alumnos;
   Recorre_Cursor: LOOP
        FETCH CR_Alumnos INTO VV_TmpAlumno;

        IF vb_termina THEN
            LEAVE Recorre_Cursor;
        END IF;

        set VV_LISTAAlumnos = concat(VV_TmpAlumno,'/',VV_LISTAAlumnos);

    END LOOP;
  CLOSE CR_Alumnos;

  SELECT VV_LISTAAlumnos ALUMNOS;  

END;

call sp_damelistaAlumno();