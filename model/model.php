<?php

// Renvoie la liste de tous les billets, triés par id décroissant
function getTickets(){
  $db = getDb();
  $tickets = $db->query("SELECT * FROM chapitres ORDER BY id DESC");
  return $tickets;
}

// Connexion à la BDD
function getDb(){
    $db = new PDO('mysql:host=localhost;dbname=blog', 'forteroche', 'J.ForterocheBlog', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $db;
}
