# proyectBD
Proyecto de Bases de datos.

Descripcion del problema:

Departamento de informática
Carrera: Ingeniería en Informática. Curso 2019-2020
PROYECTO DE CURSO. SGBD
Nombre del proyecto 6:

Una empresa que trabaja las 24 horas del día quiere automatizar el control de la asistencia diaria del personal obrero con la finalidad de poder realizar el cálculo del salario semanalmente. Este cálculo se efectúa sobre la base del número de horas trabajadas en la semana.

Los obreros trabajan en turnos de 8h que cubren las 24 horas del día de la siguiente manera:

Horario	Costo por hora
8 A.M. - 3 P.M.	    10
3 P.M. - 11 P.M. 	12
11 P.M. - 7 A.M.	14

Existe un pago adicional por horas extras trabajadas, que es remunerada de la siguiente manera:

Horas Extras Trabajadas	Costo por hora extra
Las tres primeras	        10% del costo por hora
De la tercera a la quinta	15% del costo por hora
De la quinta a séptima	    20% del costo por hora

Si el obrero trabaja día domingo o feriado se le incrementa en un 50% el costo por hora de un día normal. El día de su cumpleaños el personal obrero recibe un día libre con derecho a pago.

Las tardanzas se descuentan en 5% el costo de la hora por minuto.

Finalmente, ningún obrero debe hacer horas extras en día domingo o feriado. De hacerlo el sistema no pagará por este concepto.

El sistema debe ser capaz de arrojar las siguientes consultas para facilitar la labor de los usuarios del área de personal

1.	Consulta del personal que cumplió años en la semana

Los datos que debe contener este consulta son las siguientes:

•	Código de Obrero
•	Nombre y Apellidos del Obrero
•	Día de nacimiento
•	Nombre de Área

La información debe presentarse de manera ordenada ascendentemente por código de área y por día de nacimiento
 
2.	Consulta de tardanzas por rango de fechas

Los datos que debe contener esta consulta son las siguientes:

•	Código de Obrero
•	Nombre y Apellidos
•	Fecha
•	Nro. de  minutos

3.	Consulta del personal con número de minutos acumulados por área en un rango de fechas

Los datos que debe contener esta consulta son las siguientes:

•	Código de Área
•	Nombre de Área
•	Código del Obrero
•	Nombre y apellidos del Obrero
•	Nro. de minutos acumulados

Ordenado por código de área ascendentemente y por minutos  acumulados en forma descendente.

4.	Consulta del personal que no presenta faltas ni tardanzas por área en un rango de fechas

Los datos que debe contener este consulta son las siguientes:

•	Código de Área
•	Nombre de Área
•	Código del Obrero
•	Nombre y apellidos del Obrero

Ordenado por Código de área y alfabéticamente.

5.	Listado de días domingos y feriados en el año

Los datos que debe contener este consulta son las siguientes:

•	Año
•	Fecha
•	Indicador (D si es domingo o F si es feriado)


6.	Consulta de Abono a Bancos

Los datos que debe contener este consulta son las siguientes:

•	Banco
•	Nro. de Cuenta de Ahorros
•	Nombre y Apellido del Obrero
•	Monto

Los datos deben ser ordenados por banco y número de cuenta

7.	Consulta histórica de pagos al personal por rango se semanas
	
Los datos que debe contener este consulta son las siguientes:

•	Código de Obrero
•	Nombre y Apellido del Obrero
•	Fecha de inicio de la semana
•	Fecha de fin de la semana
•	Monto pagado en la semana

8.	Consulta Consolidada de netos por Centro de Costo

Tomando en cuenta que una o más áreas pueden pertenecer al mismo Centro de Costos. Los datos que debe contener este consulta son los siguientes:

•	Código de Centro de Costo
•	Centro de Costo
•	Área del Obrero
•	Sumatoria de Montos

Los datos que deben ser ordenados por código de Centro de Costo y por código de Área

