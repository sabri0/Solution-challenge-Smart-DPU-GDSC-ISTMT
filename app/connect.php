<?php

$pdo = new PDO(
  'mysql:host=localhost;dbname=neuro;charset=UTF8',
  'root',
  'Admin123',
  array(
    PDO::ATTR_ERRMODE             => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_ASSOC,
  )
);

// Pour que DATE_FORMAT renvoie la date en français
$pdo -> query("SET lc_time_names = 'fr_FR';");
