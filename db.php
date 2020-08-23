<?php
$Connection = null;

function db()
{
    global $aConnection;
    if ($aConnection == null) 
    {
        $adresse = "localhost";
        $benutzer = "sbot";
        $passwort = $_ENV["sdbpwd"];
        $dbName = "blog";
        
        $aConnection =
            new mysqli($adresse, $benutzer, $passwort, $dbName);
        
        if ($aConnection->connect_error)
        {
            echo "Verbindungsfehler: " . $aConnection->connect_error;
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
        $passwort = $_ENV["adbpwd"];
        $dbName = "blog";
        
        $aConnection =
            new mysqli($adresse, $benutzer, $passwort, $dbName);
        
        if ($aConnection->connect_error)
        {
            echo "Verbindungsfehler: " . $aConnection->connect_error;
            exit();
        }
    }
    
    return $aConnection;
}
$test= db();
?>