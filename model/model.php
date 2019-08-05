<?php

// Connexion à la BDD
function getDb(){
    $db = new PDO('mysql:host=localhost;dbname=blog', 'forteroche', 'J.ForterocheBlog', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $db;
}

// Renvoie la liste de tous les billets, triés par id décroissant
function getTickets(){
  $db = getDb();
  $tickets = $db->query("SELECT * FROM chapitres ORDER BY idChap DESC");
  return $tickets;
}

// Renvoie les informations d'un billet
function getTicket($idTicket){
  $db = getDb();
  $ticket = $db->prepare("SELECT * FROM chapitres WHERE idChap=?");
  $ticket->execute(array($idTicket));

  if($ticket->rowCount() == 1){
    return $ticket->fetch();
  }else{
    throw new Exception("Aucun billet ne correspond à l'identifiant '$ticket'");
  }
}

// Renvoie la liste des commentaires du billet
function getComments($idTicket){
  $db = getDb();
  $comments = $db->prepare("SELECT * FROM commentaires WHERE idChap=?");
  $comments->execute(array($idTicket));
  return $comments;
}
