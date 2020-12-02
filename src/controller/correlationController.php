<?php
include_once 'src/view/part/_header.php';
include_once 'src/model/Correlation.php';
include_once 'src/model/Phenotype.php';

$phenotypes = Phenotype::getAll();

if (isset($_POST['get_correlation'])) {
  $attrs = array();
  $values = array();
  foreach ($_POST as $key => $value) {
    if (strpos($key, 'switch') === 0) {
      array_push($values, $_POST[$key]);
      array_push($attrs, 'id1');
    }
  }
  $results = Correlation::getBy($attrs, $values);

  $resultSend = array();
  $phenotype1 = Phenotype::getBy('id', $values);

  foreach ($results as $res) {
    $t = array();
    foreach ($phenotypes as $ph) {
      if ($res->getId2() == $ph->getId()) {
        $t['id2'] = $ph->getName();
      }
    }
    $t['rpheno'] = $res->getRpheno();
    $t['rg'] = $res->getRg();
    array_push($resultSend, $t);
  }

  $_SESSION['datas'] = $resultSend;
  $_SESSION['phenotype1'] = $phenotype1[0]->getName();
  header('Location:' . $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['get_ajax'])) {
  echo json_encode($_SESSION['datas']);
}
