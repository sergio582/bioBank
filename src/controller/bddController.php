<?php
try {
  global $bdd;
  $HOST_NAME = $_SERVER["DB_HOST"];
  $DB_NAME = $_SERVER["DB_NAME"];
  $DB_USER = $_SERVER["DB_USER"];
  $PASSWORD = $_SERVER["DB_PASSWD"];
  $bdd = new PDO("mysql:host=$HOST_NAME;dbname=$DB_NAME;charset=utf8", $DB_USER, $PASSWORD);
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}

function SQL($req, $return = 'data', $log = true)
{
  global $bdd;
  $reponse = $bdd->query($req);
  if (!$reponse)
    var_dump($req);
  $donnees = $reponse->fetchAll();
  if ($return === 'data')
    return $donnees;
  elseif ($return === 'id')
    return $bdd->lastInsertId();
}

function SQL_update($table, $id, $attr, $value)
{
  $attr = is_array($attr) ? $attr : array($attr);
  $value = is_array($value) ? $value : array($value);
  $mod = array();
  foreach ($attr as $key => $a) {
    if ($value[$key] !== null)
      array_push($mod, $a . " = '" . addslashes($value[$key]) . "'");
  }
  SQL("UPDATE $table SET " . implode(" , ", $mod) . " WHERE id ='$id'");
}

function SQL_add($table, $attr, $value)
{
  $attr = is_array($attr) ? $attr : array($attr);
  $value = is_array($value) ? $value : array($value);
  $strAttr = array();
  $strValu = array();
  foreach ($attr as $key => $a) {
    if ($value[$key] !== null) {
      array_push($strAttr, $a);
      array_push($strValu, "'" . addslashes($value[$key]) . "'");
    }
  }
  return SQL("INSERT INTO $table (" . implode(", ", $strAttr) . ") VALUES (" . implode(", ", $strValu) . ")", 'id');
}

function SQL_getBy($table, $attr = [], $value = [], $operator = '=', $logic = "AND", $end = "")
{
  $attr = is_array($attr) ? $attr : array($attr);
  $value = is_array($value) ? $value : array($value);
  $operator = is_array($operator) ? $operator : array($operator);
  $cond = array();
  foreach ($attr as $key => $a)
    array_push($cond, $a . $operator[min($key, count($operator) - 1)] . "'" . addslashes($value[$key]) . "'");
  $where = count($cond) > 0 ? "WHERE" : '';
  return SQL("SELECT * FROM $table $where " . implode(" $logic ", $cond) . " $end");
}
