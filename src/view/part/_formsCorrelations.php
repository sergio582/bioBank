<?php
include_once 'src/view/interface/formInterface.php';

function formCorrelation($datas, $collapse = FALSE, $idCollapse = NULL)
{
  is_array($datas) ? $datas : $datas = array($datas);
  $collapse = $collapse ? "class='row collapse' id='$idCollapse'" : "class='row'";
  echo "<form method='post' action='control/correlations'>";
  echo "<button type='submit' class='btn btn-info' name='get_correlation'>Valider</button>";
  echo "<div $collapse>";
  foreach ($datas as $data) {
?>
    <div class="col-xl-4 col-12">
      <?php switchForm($data->getId(), $data->getName()) ?>
    </div>
<?php
  }
  echo "</form>";
  echo "</div>";
}
