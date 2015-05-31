<?php

// database connection config
$dbHost = 'localhost'; //database host address
$dbUser = 'root'; //username and password of database
$dbPass = 'root';
$dbName = 'test'; //database name to be connected
//this creates you a mysql $dbName database with the configuration as provided above
$dbConn = mysql_connect ($dbHost, $dbUser, $dbPass) or die ('MySQL connect failed. ' .
mysql_error());
mysql_select_db($dbName) or die('Cannot select database. ' . mysql_error());
//Function dbQuery accepts a query string, executes it and returns the resultset
function dbQuery($sql)
{
$result = mysql_query($sql) or die(mysql_error());
return $result;
}
//returns a row from a resultset
function dbFetchAssoc($result)
{
return mysql_fetch_assoc($result);
}
//return number of rows in a resultset
function dbNumRows($result)
{
return mysql_num_rows($result);
}
?>