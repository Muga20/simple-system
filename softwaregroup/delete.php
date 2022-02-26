<?php
require "./db.php";

$id = $_POST['id'] ?? null;

if (!$id) {
  header("Location: index.php");
  exit;
}

$statement = $pdo->prepare("DELETE FROM MEMBERS  WHERE MEMBERSID = :id");
$statement->bindValue(":id", $id);
$statement->execute();

header("Location: index.php");
