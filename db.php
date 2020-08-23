<?php
$Connection = null;

function db()
{
    global $aConnection;
    if ($aConnection == null) 
    {
        $adresse = "localhost";
        $benutzer = "sbot";
        $passwort = getenv("sdbpwd");
        $dbName = "blog";
        
        $aConnection =
            new mysqli($adresse, $benutzer, $passwort, $dbName);
        
        if ($aConnection->connect_error)
        {
            echo "Connection error: " . $aConnection->connect_error;
            exit();
        }
    }
    
    return $aConnection;
}
$aConnection = null;

function adb()
{
    global $aConnection;
    if ($aConnection == null) 
    {
        $adresse = "localhost";
        $benutzer = "abot";
        $passwort = getenv("adbpwd");
        $dbName = "blog";
        
        $aConnection =
            new mysqli($adresse, $benutzer, $passwort, $dbName);
        
        if ($aConnection->connect_error)
        {
            echo "Connection error: " . $aConnection->connect_error;
            exit();
        }
    }
    
    return $aConnection;
}
$test= db();
?>