<?php

//company's server info
$servernameCompany = "";
$usernameCompany = "";
$passwordCompany = "";
$dbnameCompany = "";
$dbportCompany = 3306;

//connect to company’s server
$connCompany = mysqli_connect($servernameCompany, $usernameCompany, $passwordCompany, $dbnameCompany, $dbportCompany);
if (!$connCompany) {
  die("Connection failed - COMPANY: " . mysqli_connect_error());
}

//CLIENT info 
$servernameClient = "";
$usernameClient = "";
$passwordClient = "";
$dbnameClient = "";
$dbportClient = 3306;

//Connect to client’s server
$connClient = mysqli_connect($servernameClient, $usernameClient, $passwordClient, $dbnameClient, $dbportClient);
if (!$connClient) die("Connection failed - CLIENT: " . mysqli_connect_error());





//ADMIN FUNCTIONS
function getTables($connection, $database){
    $showtables= mysqli_query($connection, "SHOW TABLES FROM " . $database);
    $tablename = array();
    while($table = mysqli_fetch_array($showtables)) {
        $val = strval($table[0]);
        array_push($tablename, $val);
    }    
    return $tablename;
}


function deleteTables($connection, $databse){
    $tables = getTables($connection, $databse);
    foreach($tables as $table){
        mysqli_query($connection, "DROP TABLE " . $table);
    }
}

//convert characters to latin1
function utf($connection, $header){
    $return = mysqli_fetch_array(mysqli_query($connection, "SET @var = CONVERT(CAST(CONVERT( strval($header) USING latin1) AS BINARY) USING utf8); SELECT @var;"));
    return $return[1];
}

//GET headers
function headers($connection, $table){
    $headers = array();
    $result = mysqli_query($connection, "SHOW COLUMNS FROM $table ");
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($headers, $row[Field]);
        }
    }    
    return $headers;
}