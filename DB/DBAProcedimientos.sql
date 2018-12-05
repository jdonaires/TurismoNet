

/*PROCEDIMIENTOS ALMACENADOS*/
/*PROCEDIMIENTO PARA REGISTRAR EL LUGAR TURISTICO*/
DELIMITER $$
CREATE PROCEDURE regLugarTuristico 
(
	_titulo VARCHAR(30),
	_descripcion TEXT,
	_imgLugar MEDIUMBLOB,
	_idUbicacion VARCHAR(4),
	_fecha DATE
)
BEGIN
	DECLARE _idLugar CHAR(4);
	DECLARE _idUbicacion CHAR(4);
	SET _idLugar = (SELECT (CONCAT('L',RIGHT(CONCAT('00000000',(LTRIM(CAST((COUNT(*)+1)AS CHAR)))),3)))FROM LugarTuristico); -- GENERAR CODIGO DE ID DEL LUGAR TURISTICO
	
	IF _idLugar <> NULL THEN
		
		SET _idUbicacion = (SELECT DISTINCT idUbicacion FROM ProvinciaUbicacion WHERE Provincia = _Provincia);
		IF _idUbicacion <> NULL THEN
		
			INSERT INTO LugarTuristico (idLugar,titulo,descripcion,imgLugar,idUbicacion,fecha)
			VALUES (_idLugar,_titulo,_descripcion,_imgLugar,_idUbicacion,fecha);
		
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
	_sexo CHAR(1)
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
		IF _idPersona <> NULL THEN
			INSERT INTO Persona (idPersona,nombres,apPaterno,apMaterno,dni,correo,celular,sexo)
			VALUES (_idPersona,_nombres,_apPaterno,_apMaterno,_dni,_correo,_celular,_sexo);
			IF _idUsuario <> NULL THEN
				INSERT INTO usuarioPersona (idUsuario,idPersona,usuarioCorreo,contrasseña)
				VALUES (_idUsuario,_obtIdPersona,_correo,_contraseña);
			END IF;
		END IF;
	END IF;
	
END $$
DELIMITER ;


/*REGISTRO DE USUARIO DE EMPRESA*/
DELIMITER $$
CREATE PROCEDURE regusuarioEmpresa 
(
	_correoEmpresa VARCHAR(20),
	_contraseñaEmpresa VARCHAR(20),
	_nombreEmpresa VARCHAR(20),
	_razonSocial VARCHAR(20),
	_ruc CHAR(11),
	_dirrecion VARCHAR(30),
	_descripcion TEXT,
	_celular CHAR(9),
	_fijo CHAR(9)
)
BEGIN,
	DECLARE _idEmpresa CHAR(5);
	DECLARE _idusuarioEmpresa CHAR(5);
	DECLARE _obtidEmpresa CHAR(5); -- OBTENEMOS EL ID DE LA EMPRESA
	DECLARE _evaluarRuc CHAR(11); -- EVALUAR SI LA EMPRESA EXISTE O NO
	
	SET _idEmpresa = (SELECT (CONCAT('E',RIGHT(CONCAT('00000000',(LTRIM(CAST((COUNT(*)+1)AS CHAR)))),4)))FROM Empresa); -- GENERAR CODIGO DE LA EMPRESA
	SET _idusuarioEmpresa = (SELECT (CONCAT('U',RIGHT(CONCAT('00000000',(LTRIM(CAST((COUNT(*)+1)AS CHAR)))),4)))FROM usuarioEmpresa); -- GENERAR CODIGO DEL USUARIO DE LA EMPRESA
	SET _obtidEmpresa = (SELECT DISTINCT idEmpresa FROM Empresa WHERE ruc = _ruc); -- OBTENEMOS EL ID DE LA EMPRESA MEDIANTE EL RUC
	SET _evaluarRuc = (SELECT DISTINCT ruc FROM Empresa WHERE ruc = _ruc); -- OBTENEMOS EL RUC PARA VERIFICAR SI LA EMPRESA YA SE ENCUENTRA REGISTRADA
	
	IF _evaluarRuc = _ruc THEN
		SELECT 'LA EMPRESA SE ENCUENTRA REGISTRADA';
	ELSE 
		IF _idEmpresa <> NULL THEN
	
			INSERT INTO Empresa (idEmpresa,nombreEmpresa,razonSocial,ruc,correoEmpresa,dirrecion,descripcion,celular,fijo)
			VALUES (_idEmpresa,_nombreEmpresa,_razonSocial,_ruc,_correoEmpresa,_dirrecion,_descripcion,_celular,_fijo);
		
			IF _idusuarioEmpresa <> NULL THEN
			
				INSERT INTO usuarioEmpresa (idusuarioEmpresa,idEmpresa,empresaCorreo,contraseñaEmpresa)
				VALUES (_idusuarioEmpresa,_obtidEmpresa,_correoEmpresa,_contraseñaEmpresa);
			END IF;
		
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