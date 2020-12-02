<?php
function setColorValue($value)
{
  switch ($value) {
    case $value >= 70:
      return "<span style='color: #f21919;'><i class='fas fa-circle'></i></span>";
    case $value >= 40:
      return "<span style='color: #f77575;'><i class='fas fa-circle'></i></span>";
    case $value >= 20:
      return "<span style='color: #fbbaba;'><i class='fas fa-circle'></i></span>";
    case $value <= -70:
      return "<span style='color: #1919F2;'><i class='fas fa-circle'></i></span>";
    case $value <= -40:
      return "<span style='color: #7575f7;'><i class='fas fa-circle'></i></span>";
    case $value <= -20:
      return "<span style='color: #d1d1fc;'><i class='fas fa-circle'></i></span>";
    default:
      return "<span style='color: white;'><i class='fas fa-circle'></i></span>";
  }
}

function tableCorrelations($datas)
{
?>
  <table class="table table-sm table-hover" id="tableCorrelations">
    <thead>
      <tr>
        <th scope="col">Phénotype</th>
        <th scope="col"></th>
        <th scope="col">Corrélation Phénotype</th>
        <th scope="col"></th>
        <th scope="col">Corrélation Génétique</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($datas as $data) {
      ?>
        <tr>
          <td title="<?php echo $data['id2'] ?>"><?php echo strlen($data['id2']) > 60 ? substr($data['id2'], 0, 36) . " ..." : $data['id2'] ?></td>
          <td><?php echo setColorValue(number_format($data['rpheno'] * 100, 1)) ?></td>
          <td>
            <?php echo number_format($data['rpheno'] * 100, 1) ?>%
          </td>
          <td><?php echo setColorValue(number_format($data['rg'] * 100, 1)) ?></td>
          <td>
            <?php echo number_format($data['rg'] * 100, 1) ?>%
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
<?php
}
?>