<?php

try
{
    $db = new PDO('mysql:host=localhost;dbname=dej', 'root', '');
}
catch (PDOException $e)
{
    print('Erreur : ' . $e->getMessage() . "<br/>");
}

?>