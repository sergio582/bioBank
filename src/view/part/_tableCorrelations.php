<?php
function setColorValue($value)
{
  switch ($value) {
    case $value >= 50:
      return "width:55px; background-color: #f21919; border-radius:5px;";
    case $value >= 36:
      return "width:55px; background-color: #f77575; border-radius:5px;";
    case $value >= 22:
      return "width:55px; background-color: #fbbaba; border-radius:5px;";
    case $value <= -22:
      return "width:55px; background-color: #d1d1fc; border-radius:5px;";
    case $value <= -36:
      return "width:55px; background-color: #7575f7; border-radius:5px;";
    case $value <= -50:
      return "width:55px; background-color: #1919F2; border-radius:5px;";
    default:
      return "width:50px;";
  }
}
function tableCorrelations($datas)
{
?>
  <table class="table table-sm table-hover" id="tableCorrelations">
    <thead>
      <tr>
        <th scope="col">Phénotype 1</th>
        <th scope="col">Phénotype 2</th>
        <th scope="col">Corrélation Phénotype</th>
        <th scope="col">Corrélation Génétique</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($datas as $data) {
      ?>
        <tr>
          <th title="<?php echo $data['id1'] ?>"><?php echo strlen($data['id1']) > 26 ? substr($data['id1'], 0, 26) . " ..." : $data['id1'] ?></th>
          <td title="<?php echo $data['id2'] ?>"><?php echo strlen($data['id2']) > 60 ? substr($data['id2'], 0, 36) . " ..." : $data['id2'] ?></td>
          <td>
            <div class="text-center" style="<?php echo setColorValue(number_format($data['rpheno'] * 100, 1)) ?>"><?php echo number_format($data['rpheno'] * 100, 1) ?>%</div>
          </td>
          <td>
            <div class="text-center" style="<?php echo setColorValue(number_format($data['rg'] * 100, 1)) ?>"><?php echo number_format($data['rg'] * 100, 1) ?>%</div>
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