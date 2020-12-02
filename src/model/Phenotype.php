<?php
class Phenotype
{
  private $id;
  private $name;

  public function __construct($id, $name)
  {
    $this->id = $id;
    $this->name = $name;
  }

  public static function getAll()
  {
    $sql = SQL('SELECT * FROM phenotype ORDER BY name ASC');
    $obj = array();
    foreach ($sql as $s) {
      array_push($obj, new self($s['id'], $s['name']));
    }
    return $obj;
  }

  public static function getAllFr()
  {
    $sql = SQL('SELECT * FROM phenotypefr ORDER BY name ASC');
    $obj = array();
    foreach ($sql as $s) {
      array_push($obj, new self($s['id'], $s['name']));
    }
    return $obj;
  }

  public static function getBy($attr, $value, $operator = '=', $logic = "AND")
  {
    $attr = is_array($attr) ? $attr : array($attr);
    $value = is_array($value) ? $value : array($value);
    $operator = is_array($operator) ? $operator : array($operator);
    $cond = array();
    foreach ($attr as $key => $a)
      array_push($cond, $a . $operator[min($key, count($operator) - 1)] . "'" . $value[$key] . "'");
    $sql = SQL("SELECT * FROM phenotype WHERE " . implode(" $logic ", $cond));
    $obj = array();
    foreach ($sql as $s)
      array_push($obj, new self($s['id'], $s['name']));
    return $obj;
  }

  public static function getByFr($attr, $value, $operator = '=', $logic = "AND")
  {
    $attr = is_array($attr) ? $attr : array($attr);
    $value = is_array($value) ? $value : array($value);
    $operator = is_array($operator) ? $operator : array($operator);
    $cond = array();
    foreach ($attr as $key => $a)
      array_push($cond, $a . $operator[min($key, count($operator) - 1)] . "'" . $value[$key] . "'");
    $sql = SQL("SELECT * FROM phenotypefr WHERE " . implode(" $logic ", $cond));
    $obj = array();
    foreach ($sql as $s)
      array_push($obj, new self($s['id'], $s['name']));
    return $obj;
  }

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of name
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set the value of name
   *
   * @return  self
   */
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }
}
