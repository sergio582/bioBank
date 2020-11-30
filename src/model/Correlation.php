<?php
class Correlation
{
  private $id1;
  private $id2;
  private $rpheno;
  private $rg;
  private $rg_se;
  private $rg_intercept;
  private $rg_intercept_se;

  public function __construct($id1, $id2, $rpheno, $rg, $rg_se, $rg_intercept, $rg_intercept_se)
  {
    $this->id1 = $id1;
    $this->id2 = $id2;
    $this->rpheno = $rpheno;
    $this->rg = $rg;
    $this->rg_se = $rg_se;
    $this->rg_intercept = $rg_intercept;
    $this->rg_intercept_se = $rg_intercept_se;
  }

  public static function getAll()
  {
    $sql = SQL('SELECT * FROM correlation');
    $obj = array();
    foreach ($sql as $s) {
      array_push($obj, new self($s['id1'], $s['id2'], $s['rpheno'], $s['rg'], $s['rg_se'], $s['rg_intercept'], $s['rg_intercept_se']));
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
    $sql = SQL("SELECT * FROM correlation WHERE " . implode(" $logic ", $cond));
    $obj = array();
    foreach ($sql as $s)
      array_push($obj, new self($s['id1'], $s['id2'], $s['rpheno'], $s['rg'], $s['rg_se'], $s['rg_intercept'], $s['rg_intercept_se']));
    return $obj;
  }

  /**
   * Set the value of id1
   *
   * @return  self
   */
  public function setId1($id1)
  {
    $this->id1 = $id1;

    return $this;
  }

  /**
   * Set the value of id2
   *
   * @return  self
   */
  public function setId2($id2)
  {
    $this->id2 = $id2;

    return $this;
  }

  /**
   * Set the value of rpheno
   *
   * @return  self
   */
  public function setRpheno($rpheno)
  {
    $this->rpheno = $rpheno;

    return $this;
  }

  /**
   * Set the value of rg
   *
   * @return  self
   */
  public function setRg($rg)
  {
    $this->rg = $rg;

    return $this;
  }

  /**
   * Set the value of rg_se
   *
   * @return  self
   */
  public function setRg_se($rg_se)
  {
    $this->rg_se = $rg_se;

    return $this;
  }

  /**
   * Set the value of rg_intercept
   *
   * @return  self
   */
  public function setRg_intercept($rg_intercept)
  {
    $this->rg_intercept = $rg_intercept;

    return $this;
  }

  /**
   * Set the value of rg_intercept_se
   *
   * @return  self
   */
  public function setRg_intercept_se($rg_intercept_se)
  {
    $this->rg_intercept_se = $rg_intercept_se;

    return $this;
  }

  /**
   * Get the value of id1
   */
  public function getId1()
  {
    return $this->id1;
  }

  /**
   * Get the value of id2
   */
  public function getId2()
  {
    return $this->id2;
  }

  /**
   * Get the value of rpheno
   */
  public function getRpheno()
  {
    return $this->rpheno;
  }

  /**
   * Get the value of rg
   */
  public function getRg()
  {
    return $this->rg;
  }

  /**
   * Get the value of rg_se
   */
  public function getRg_se()
  {
    return $this->rg_se;
  }

  /**
   * Get the value of rg_intercept
   */
  public function getRg_intercept()
  {
    return $this->rg_intercept;
  }

  /**
   * Get the value of rg_intercept_se
   */
  public function getRg_intercept_se()
  {
    return $this->rg_intercept_se;
  }
}
