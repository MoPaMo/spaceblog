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
/*$test= adb()->query('INSERT INTO posts(title, short, content, author, image) VALUES ("546573743230303030","746573746573746573746573", "3c703e7465737465737465737465733c2f703e","4d6f50614d6f", "");');
$res2=$test->fetch_all(MYSQLI_ASSOC);
  if(count($res2)>0){
    print_r($res2[0]);
  }*/
?>