<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>EcoSphere - Shop</title>
        <meta name="viewport" content="width=device-width">
        <link href="View/style/general.css" rel="stylesheet" type="text/css">
        <!-- Font -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Glegoo" rel="stylesheet">
        <!-- Icon -->
        <link href="./View/img/monthlyBox.jpg" rel="icon">
    </head>
    <body>
    <?php
        require_once('Model/connection.php');
        $pdoBuilder = new Connection();
        $db = $pdoBuilder->getDb();

        if (
            ( isset($_GET['ctrl']) && !empty($_GET['ctrl']) ) &&
            ( isset($_GET['action']) && !empty($_GET['action']) )
        ) {
            $ctrl = $_GET['ctrl'];
            $action = $_GET['action'];
        }
        else {
            $ctrl = 'default';
            $action = 'display';
        }

        require_once('./Controller/' . $ctrl  . 'Controller.php');

        $ctrlName = $ctrl . 'Controller';
        $controller = new $ctrlName($db);
        $controller->$action();
    ?>
    </body>
</html>