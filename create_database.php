<?php
	$con = mysql_connect("localhost", "root");
	if (!$con)
		die('Could not connect: ' . mysql_error());

		
	// Create database
	if (mysql_query("CREATE DATABASE atm",$con))
		echo "Database created";
	else
		die ("Error creating database: " . mysql_error());
	
	
	mysql_select_db("atm", $con);
	
	
	// Create tables
	mysql_query("CREATE TABLE produs 
				(
					nume varchar(15) NOT NULL,
					PRIMARY KEY(nume),
					um varchar(15) NOT NULL,
					numar int NOT NULL,
					pret int NOT NULL
				)" );
				
	mysql_query("CREATE TABLE log_produs
				(
					categorie int NOT NULL,
					nume varchar(15) NOT NULL,
					bucati int NOT NULL,
					data date NOT NULL
				)" );
				
	
	// Insert values to database
	mysql_query("INSERT INTO produs (nume, um, numar, pret)
				 VALUES ('pantaloni', 'buc', 10, 99)");
				 
	mysql_query("INSERT INTO produs (nume, um, numar, pret)
				 VALUES ('tricou', 'buc', 100, 23)");
				 
	mysql_query("INSERT INTO produs (nume, um, numar, pret)
				 VALUES ('fier', 'kg', 80, 3)");
				 
	mysql_query("INSERT INTO produs (nume, um, numar, pret)
				 VALUES ('teava', 'm', 50, 2)");
				 
		 
	mysql_query("INSERT INTO log_produs (categorie, nume, bucati, data)
				 VALUES (1, 'pantaloni', 7, 2010-03-05)");
				 
	mysql_query("INSERT INTO log_produs (categorie, nume, bucati, data)
				 VALUES (0, 'pantaloni', 2, 2011-10-08)");
				 
	mysql_query("INSERT INTO log_produs (categorie, nume, bucati, data)
				 VALUES (1, 'pantaloni', 8, 2012-11-25)");
				 
	mysql_query("INSERT INTO log_produs (categorie, nume, bucati, data)
				 VALUES (0, 'pantaloni', 3, 2012-02-16)");
		
	
	// Close connection
	mysql_close($con);
?> 