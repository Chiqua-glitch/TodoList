<?php
session_start();
try {
    $base = new PDO('mysql:host=127.0.0.1;dbname=todo_list', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE todo_info SET item_name = :item_name WHERE id = :id";
    $resultat = $base->prepare($sql);
    $resultat->execute(array("item_name" => htmlentities($_POST["update"]), "id" => $_POST["id"]));
    header("Location: ../index.php");
    $resultat->closeCursor();
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
