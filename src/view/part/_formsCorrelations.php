<?php
function switchFormCorrelation($datas, $collapse = FALSE, $idCollapse = NULL)
{
  is_array($datas) ? $datas : $datas = array($datas);
  $collapse = $collapse ? "class='row collapse' id='$idCollapse'" : "class='row'";
  echo "<form method='post' action='control/correlations'>";
  echo "<div $collapse>";
  foreach ($datas as $data) {
?>
    <div class="col-4">
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="<?php echo $data->getId() ?>" name="switch_<?php echo $data->getName() ?>" value="<?php echo $data->getId() ?>">
        <?php $label = strlen($data->getName()) > 40 ? substr($data->getName(), 0, 36) . " ..." : $data->getName() ?>
        <label class="custom-control-label" for="<?php echo $data->getId() ?>" title="<?php echo $data->getName() ?>"><?php echo $label ?></label>
      </div>
    </div>
<?php
  }
  echo "<button type='submit' class='btn btn-primary' name='get_correlation'>Submit</button>";
  echo "</form>";
  echo "</div>";
}
