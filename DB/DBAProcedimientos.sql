

/*PROCEDIMIENTOS ALMACENADOS*/
/*PROCEDIMIENTO PARA REGISTRAR EL LUGAR TURISTICO*/
DELIMITER $$
CREATE PROCEDURE regLugarTuristico
(
	_titulo VARCHAR(30),
	_descripcion TEXT,
	_imgLugar MEDIUMBLOB,
	_Provincia VARCHAR(20),
	_fecha DATE
)
BEGIN
	DECLARE _idLugar CHAR(4);
	DECLARE _idUbicacion CHAR(4);
	SET _idLugar = (SELECT (CONCAT('L',RIGHT(CONCAT('00000000',(LTRIM(CAST((COUNT(*)+1)AS CHAR)))),3)))FROM LugarTuristico); -- GENERAR CODIGO DE ID DEL LUGAR TURISTICO

	IF _idLugar != '' THEN

		SET _idUbicacion = (SELECT DISTINCT idUbicacion FROM ProvinciaUbicacion WHERE Provincia = _Provincia);
		IF _idUbicacion != '' THEN

			INSERT INTO LugarTuristico (idLugar,titulo,descripcion,imgLugar,idUbicacion,fecha)
			VALUES (_idLugar,_titulo,_descripcion,_imgLugar,_idUbicacion,_fecha);

		END IF;
	END IF;
END $$
DELIMITER ;


/*REGISTRO DE PERSONAS*/
DELIMITER $$
CREATE PROCEDURE regPersona
(
	_correo VARCHAR(20), -- TIENE QUE SER UNICO
	_contraseña VARCHAR(20),
	_nombres VARCHAR(20),
	_apPaterno VARCHAR(20),
	_apMaterno VARCHAR(20),
	_dni CHAR(8), -- DNI UNICO POR PERSONA
	_celular CHAR(9), -- SE NECESITA PARA REALIZAR CHARLA PERSONAL
	_sexo CHAR(1),
	_tipo VARCHAR(20)
)
BEGIN
	DECLARE _idPersona CHAR(5);
	DECLARE _idUsuario CHAR(5);
	DECLARE _obtIdPersona CHAR(5); -- OBTENEMOS EL ID DE LA PERSONA
	DECLARE _validarDni CHAR(8);
	SET _idPersona = (SELECT (CONCAT('P',RIGHT(CONCAT('00000000',(LTRIM(CAST((COUNT(*)+1)AS CHAR)))),4)))FROM Persona); -- GENERAR CODIGO DE ID DE PERSONA
	SET _idUsuario = (SELECT (CONCAT('U',RIGHT(CONCAT('00000000',(LTRIM(CAST((COUNT(*)+1)AS CHAR)))),4)))FROM usuarioPersona); -- GENERAR CODIGO DE ID DE USUARIO DE LA PERSONA
	SET _obtIdPersona = (SELECT DISTINCT idPersona FROM Persona WHERE dni = _dni); -- OBTENEMOS EL ID DE LA PERSONA
	SET _validarDni = (SELECT DISTINCT dni FROM Persona WHERE dni = _dni); -- OBTENEMOS EL DNI LA PERSONA PARA VERIFICAR SI YA SE ENCUENTRA REGISTRADA

		IF _validarDni = _dni THEN
			SELECT 'EL USUARIO YA SE ENCUENTRA REGISTRADO';
		ELSE
			IF _idPersona != '' THEN
				INSERT INTO Persona (idPersona,nombres,apPaterno,apMaterno,dni,correo,celular,sexo)
				VALUES (_idPersona,_nombres,_apPaterno,_apMaterno,_dni,_correo,_celular,_sexo);

				CALL regusuarioEmpresa (_obtIdPersona,_idPersona,_correo,_contraseña,_tipo);
			END IF;
		END IF;

END $$
DELIMITER ;



/*PROCEDIMIENTO PARA LISTAR LUGAR - VENTANA PRINCIPAL*/
DELIMITER $$
CREATE PROCEDURE listar_lugarTuristico ()
BEGIN
	SELECT titulo, imgLugar, descripcion FROM LugarTuristico;
END $$
DELIMITER ;

/*PROCEDIMIENTO PARA REGISTRAR LAS PROVINCIAS DE LA REGION ICA*/
DELIMITER $$
CREATE PROCEDURE regProvincia
(
	_Provincia VARCHAR(20)
)
BEGIN
	DECLARE _idUbicacion CHAR(4); -- ALMACENAR EL ID DEL LUGAR

	SET _idUbicacion = (SELECT (CONCAT('L',RIGHT(CONCAT('00000000',(LTRIM(CAST((COUNT(*)+1)AS CHAR)))),3)))FROM ProvinciaUbicacion); -- GENERAR CODIGO DE LA EMPRESA

	IF _Provincia != '' THEN
		IF _idUbicacion != '' THEN
			INSERT INTO ProvinciaUbicacion (idUbicacion,Provincia)
			VALUES (_idUbicacion,_Provincia);
		ELSE
			SELECT 'ERROR EN LA BASE DE DATOS';
		END IF;
	ELSE
		SELECT 'VALOR NO INGRESADO';
	END IF;
END $$
DELIMITER ;




/*REGISTRO DE USUARIO DE LA EMPRESA*/
DELIMITER $$
CREATE PROCEDURE regusuarioEmpresa
(
	_obtidEmpresa CHAR(5),
	_idEmpresa CHAR(5),
	_correoEmpresa VARCHAR(20),
	_contraseñaEmpresa VARCHAR(20),
	_tipo VARCHAR(20)
)
BEGIN

	DECLARE _idusuario CHAR(5);

	SET _idusuario = (SELECT (CONCAT('U',RIGHT(CONCAT('00000000',(LTRIM(CAST((COUNT(*)+1)AS CHAR)))),4)))FROM usuario); -- GENERAR CODIGO DEL USUARIO DE LA EMPRESA

	IF _idusuario != '' THEN
		INSERT INTO usuario (idUsuario,idObtenido,usuarioCorreo,contraseña,tipo)
		VALUES (_idusuario,_idEmpresa,_correoEmpresa,_contraseñaEmpresa,_tipo);
	END IF;

END$$
DELIMITER ;


/*REGISTRO DE LA EMPRESA*/
DELIMITER $$
CREATE PROCEDURE regEmpresa
(
	_correoEmpresa VARCHAR(20),
	_contraseñaEmpresa VARCHAR(20),
	_nombreEmpresa VARCHAR(20),
	_razonSocial VARCHAR(20),
	_ruc CHAR(11),
	_dirrecion VARCHAR(30),
	_descripcion TEXT,
	_celular CHAR(9),
	_fijo CHAR(9),
	_tipo VARCHAR(20),
	_empreImg MEDIUMBLOB
)
BEGIN
	DECLARE _idEmpresa CHAR(5);
	DECLARE _idusuario CHAR(5);
	DECLARE _obtidEmpresa CHAR(5); -- OBTENEMOS EL ID DE LA EMPRESA
	DECLARE _evaluarRuc CHAR(11); -- EVALUAR SI LA EMPRESA EXISTE O NO

	SET _idEmpresa = (SELECT (CONCAT('E',RIGHT(CONCAT('00000000',(LTRIM(CAST((COUNT(*)+1)AS CHAR)))),4)))FROM Empresa); -- GENERAR CODIGO DE LA EMPRESA
	SET _idusuario = (SELECT (CONCAT('U',RIGHT(CONCAT('00000000',(LTRIM(CAST((COUNT(*)+1)AS CHAR)))),4)))FROM usuario); -- GENERAR CODIGO DEL USUARIO DE LA EMPRESA
	SET _obtidEmpresa = (SELECT DISTINCT idEmpresa FROM Empresa WHERE ruc = _ruc); -- OBTENEMOS EL ID DE LA EMPRESA MEDIANTE EL RUC
	SET _evaluarRuc = (SELECT DISTINCT ruc FROM Empresa WHERE ruc = _ruc); -- OBTENEMOS EL RUC PARA VERIFICAR SI LA EMPRESA YA SE ENCUENTRA REGISTRADA

	IF _evaluarRuc = _ruc THEN
		SELECT 'LA EMPRESA SE ENCUENTRA REGISTRADA';
	ELSE
		IF _idEmpresa <> '' THEN

			INSERT INTO Empresa (idEmpresa,nombreEmpresa,razonSocial,ruc,correoEmpresa,dirrecion,descripcion,celular,fijo,EmpresaImage)
			VALUES (_idEmpresa,_nombreEmpresa,_razonSocial,_ruc,_correoEmpresa,_dirrecion,_descripcion,_celular,_fijo,_empreImg);
			
			CALL regusuarioEmpresa (_obtidEmpresa,_idEmpresa,_correoEmpresa,_contraseñaEmpresa,_tipo);
			
		END IF;
	END IF;
END$$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE lisProvinciaUbicacion 
(
)
BEGIN
	SELECT Provincia FROM ProvinciaUbicacion;
END $$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE lisEmpresas
(
)
BEGIN
	SELECT EmpresaImage, nombreEmpresa, razonSocial, ruc, celular, fijo, dirrecion, descripcion FROM Empresa;
END $$
DELIMITER ;