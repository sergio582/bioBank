<?php
function setColorValue($value)
{
  switch ($value) {
    case $value >= 70:
      return "<span style='color: #78281f;'><i class='fas fa-circle'></i></span>";
    case $value >= 40:
      return "<span style='color: #e74c3c;'><i class='fas fa-circle'></i></span>";
    case $value >= 20:
      return "<span style='color: #f5b7b1;'><i class='fas fa-circle'></i></span>";
    case $value <= -70:
      return "<span style='color: #1b4f72;'><i class='fas fa-circle'></i></span>";
    case $value <= -40:
      return "<span style='color: #2980b9;'><i class='fas fa-circle'></i></span>";
    case $value <= -20:
      return "<span style='color: #a9cce3;'><i class='fas fa-circle'></i></span>";
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