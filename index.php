<?php
// Include router class
include('src/model/Route.php');

// pages
Route::add('/', function () {
  include_once('src/view/accueil.php');
});
Route::add('/accueil', function () {
  include_once('src/view/accueil.php');
});

Route::add('/correlations', function () {
  include_once('src/view/correlations.php');
});

// Post
Route::add('/control/correlations', function () {
  include_once('src/controller/correlationController.php');
}, 'post');

// Accept only numbers as parameter. Other characters will result in a 404 error
Route::add('/foo/([0-9]*)/bar', function ($var1) {
  echo $var1 . ' is a great number!';
});

Route::run('/bioBank');
