<?php 

/* 

CIS in Europe MVP 
11/20/15 connection.php Deliverable

Designer / Developer: Alejandro Quesada

*/

//  These five lines are VERY important: they connect your web page to your database, 
//  allowing you to either pull from or insert to items stored inside the database -MM
        $server="WIN-QOHUEU95C1L";
        $user="user";
        $password="colecarey";
        $database="DB";
        $connection = odbc_connect("Driver={SQL Server Native Client 10.0};Server=$server;Database=$database; Trusted_Connection = yes",$user,$password); //connection string

?> 