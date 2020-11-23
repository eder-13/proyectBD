
#1- ok
        SET @fechaI =DATE_FORMAT(
        (
                SELECT date.weekstart FROM date WHERE date.date = DATE_FORMAT(
                NOW(),'%y-%m-%d')
        ),'%y-%m-%d'
        );
        SET @fechaF = DATE_ADD(@fechaI, INTERVAL 6 DAY );
        SET @fechaI = DATE_FORMAT(@fechaI, "%m-%d");
        SET @fechaF = DATE_FORMAT(@fechaF, "%m-%d");
        SELECT obrero.CodO,obrero.nameO,obrero.lastnameO,obrero.birth,area.nameA 
        FROM obrero,area 
        WHERE (DATE_FORMAT(obrero.birth,"%m-%d") BETWEEN @fechaI AND @fechaF) AND obrero.CodA = area.CodA
        ORDER BY area.CodA ASC, obrero.birth ASC 
#########################################################

#2- ok
        SET @fechaI = "2020-11-16";#php variable given by the user
        SET @fechaF = "2020-11-18";#same as @fechaI
        SELECT obrero.CodO,obrero.nameO,obrero.lastnameO,trabajo.date,trabajo.min 
        FROM obrero,trabajo 
        WHERE (trabajo.date BETWEEN @fechaI AND @fechaF ) 
                AND trabajo.CodO=obrero.CodO
                AND trabajo.min>0;
#########################################################

#3- ok
        SET @fechaI = "2020-11-16";#php variable given by the user
        SET @fechaF = "2020-11-20";#same as @fechaI
        SELECT area.CodA,area.nameA,obrero.CodO,obrero.nameO,obrero.lastnameO,SUM(trabajo.min) 
        FROM obrero,trabajo, area 
        WHERE (trabajo.date BETWEEN @fechaI AND @fechaF ) 
                AND trabajo.CodO=obrero.CodO
                AND obrero.CodA=area.CodA
                AND trabajo.min>0
        GROUP BY trabajo.CodO
        ORDER BY area.CodA ASC, SUM(trabajo.min) DESC ;
#########################################################

#4- ok 
        SET @fechaI = "2020-11-16";#php variable given by the user
        SET @fechaF = "2020-11-18";#same as @fechaI
        SELECT area.CodA,area.nameA,obrero.CodO,obrero.nameO, obrero.lastnameO
        FROM area, obrero, trabajo
        WHERE trabajo.date BETWEEN @fechaI AND @fechaF 
                AND obrero.CodO = trabajo.CodO
                AND obrero.CodA = area.CodA
                AND trabajo.min = 0
        ORDER BY area.CodA ASC, obrero.lastnameO ASC; 

#########################################################

#5- ok
        SELECT DATE_FORMAT(date.date,"%Y"), DATE_FORMAT(date.date, "%M %d"), date.ind
        FROM date
        WHERE date.ind = "A" 
                OR date.ind ="F"
                OR date.ind ="D";
#########################################################

#6- ok

        #begin and end of the week
        SET @fechaI =DATE_FORMAT(
        (
                SELECT date.weekstart FROM date WHERE date.date = DATE_FORMAT(
                NOW(),'%y-%m-%d')
        ),'%y-%m-%d'
        );
        SET @fechaF = DATE_ADD(@fechaI, INTERVAL 6 DAY );

        #general SELECT 
        SELECT CodB,nroCuenta,nameO,lastnameO,SUM(MONTO) 
        FROM (

        #regular day
        SELECT obrero.CodB,obrero.nroCuenta,obrero.nameO,obrero.lastnameO, SUM(
                8 * turno.costoT + trabajo.horasExtras*(turno.costoT*horasextras.costoHExtra)/100 - (trabajo.min*(turno.costoT/20))) AS MONTO
        FROM banco,obrero,trabajo,turno,horasextras,date
        WHERE   trabajo.CodO = obrero.CodO
                AND trabajo.CodT = turno.CodT
                AND trabajo.horasExtras = horasextras.cantHExtra
                AND trabajo.date = date.date
                AND date.ind = "X"
                AND trabajo.date BETWEEN @fechaI AND @fechaF
                AND trabajo.date <> obrero.birth
                AND trabajo.min < 480
        GROUP BY obrero.nroCuenta

        UNION 

        #hollidays and sundays
        SELECT obrero.CodB,obrero.nroCuenta,obrero.nameO,obrero.lastnameO, 8*(turno.costoT + (0.5 * turno.costoT) ) - (trabajo.min * (turno.costoT + 0.5 * turno.costoT)/20) AS MONTO2
        FROM obrero,trabajo,date,turno
        WHERE trabajo.CodO = obrero.CodO
                AND trabajo.date = date.date
                AND trabajo.CodT = turno.CodT
                AND trabajo.date BETWEEN @fechaI AND @fechaF
                AND date.ind <> "X"
                AND trabajo.min < 480
        GROUP BY obrero.nroCuenta

        UNION 

        #birthday
        SELECT obrero.CodB, obrero.nroCuenta,obrero.nameO,obrero.lastnameO, 80 AS MONTO3  
        FROM obrero
        WHERE (DATE_FORMAT(obrero.birth,"%m-%d") BETWEEN DATE_FORMAT(@fechaI , "%m-%d") AND DATE_FORMAT(@fechaF , "%m-%d") )
        GROUP BY obrero.nroCuenta

        ) TOTAL

        GROUP BY nroCuenta
        ORDER BY CodB,nroCuenta

######################################################### 

#7- ok

        #begin and end of the week
        SET @fecha = "2020-11-18";#given by the user
        SET @fechaI =DATE_FORMAT(
        (
                SELECT date.weekstart FROM date WHERE date.date = @fecha
        ),'%y-%m-%d'
        );
        SET @fechaF = DATE_ADD(@fechaI, INTERVAL 6 DAY );

        #general SELECT 
        SELECT CodO,nameO,lastnameO,@fechaI , @fechaF , SUM(MONTO) 
        FROM (

        #regular day
        SELECT obrero.CodO,obrero.nameO,obrero.lastnameO, SUM(
                8 * turno.costoT + trabajo.horasExtras*(turno.costoT*horasextras.costoHExtra)/100 - (trabajo.min*(turno.costoT/20))) AS MONTO
        FROM banco,obrero,trabajo,turno,horasextras,date
        WHERE   trabajo.CodO = obrero.CodO
                AND trabajo.CodT = turno.CodT
                AND trabajo.horasExtras = horasextras.cantHExtra
                AND trabajo.date = date.date
                AND date.ind = "X"
                AND trabajo.min < 480
                AND trabajo.date BETWEEN @fechaI AND @fechaF
                AND trabajo.date <> obrero.birth
        GROUP BY obrero.nroCuenta

        UNION 

        #hollidays and sundays
        SELECT obrero.CodO,obrero.nameO,obrero.lastnameO, 8*(turno.costoT + (0.5 * turno.costoT) ) - (trabajo.min * (turno.costoT + 0.5 * turno.costoT)/20) AS MONTO2
        FROM obrero,trabajo,date,turno
        WHERE trabajo.CodO = obrero.CodO
                AND trabajo.date = date.date
                AND trabajo.CodT = turno.CodT
                AND trabajo.date BETWEEN @fechaI AND @fechaF
                AND date.ind <> "X"
                AND trabajo.min < 480
        GROUP BY obrero.nroCuenta

        UNION 

        #birthday
        SELECT obrero.CodO,obrero.nameO,obrero.lastnameO, 80 AS MONTO3  
        FROM obrero
        WHERE (DATE_FORMAT(obrero.birth,"%m-%d") BETWEEN DATE_FORMAT(@fechaI , "%m-%d") AND DATE_FORMAT(@fechaF , "%m-%d") )
        GROUP BY obrero.nroCuenta

        ) TOTAL

        GROUP BY CodO

#########################################################

#8- ok
        #begin and end of the week
        SET @fechaI =DATE_FORMAT(
        (
                SELECT date.weekstart FROM date WHERE date.date = DATE_FORMAT(
                NOW(),'%y-%m-%d')
        ),'%y-%m-%d'
        );
        SET @fechaF = DATE_ADD(@fechaI, INTERVAL 6 DAY );

        #general SELECT 
        SELECT CodCC,nameCC,CodA,SUM(MONTO) 
        FROM (

        #regular day
        SELECT centroc.CodCC,centroc.nameCC,area.CodA, SUM(
                8 * turno.costoT + trabajo.horasExtras*(turno.costoT*horasextras.costoHExtra)/100 - (trabajo.min*(turno.costoT/20))) AS MONTO
        FROM banco,obrero,trabajo,turno,horasextras,date,centroc,area
        WHERE   trabajo.CodO = obrero.CodO
                AND trabajo.CodT = turno.CodT
                AND trabajo.horasExtras = horasextras.cantHExtra
                AND trabajo.date = date.date
                AND date.ind = "X"
                AND trabajo.date BETWEEN @fechaI AND @fechaF
                AND trabajo.date <> obrero.birth
                AND obrero.CodA = area.CodA
                AND area.CodCC = centroc.CodCC
                AND trabajo.min < 480
        GROUP BY area.CodA

        UNION 

        #hollidays and sundays
        SELECT centroc.CodCC,centroc.nameCC,area.CodA, 8*(turno.costoT + (0.5 * turno.costoT) ) - (trabajo.min * (turno.costoT + 0.5 * turno.costoT)/20) AS MONTO2
        FROM obrero,trabajo,date,turno,centroc,area
        WHERE trabajo.CodO = obrero.CodO
                AND trabajo.date = date.date
                AND trabajo.CodT = turno.CodT
                AND trabajo.date BETWEEN @fechaI AND @fechaF
                AND date.ind <> "X"
                AND obrero.CodA = area.CodA
                AND area.CodCC = centroc.CodCC
                AND trabajo.min < 480
        GROUP BY area.CodA

        UNION 

        #birthday
        SELECT centroc.CodCC,centroc.nameCC,area.CodA, SUM(80) AS MONTO3  
        FROM obrero,area,centroc
        WHERE (DATE_FORMAT(obrero.birth,"%m-%d") BETWEEN DATE_FORMAT(@fechaI , "%m-%d") AND DATE_FORMAT(@fechaF , "%m-%d") )
                AND obrero.CodA = area.CodA
                AND area.CodCC = centroc.CodCC
        GROUP BY area.CodA

        ) TOTAL

        GROUP BY CodA
        ORDER BY CodCC,CodA
#########################################################

