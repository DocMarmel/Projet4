<?php
require 'includes/db_connect.php';
global $db;

function createTicket(){

}

function readTicketsList(){
  $tickets = $db->query("SELECT * FROM chapitres ORDER BY id DESC");

}

function readTicket($id){
  $ticket = $db->query("SELECT * FROM chapitres WHERE id=$id");

}

function updateTicket(){

}

function deleteTicket($id){

}
