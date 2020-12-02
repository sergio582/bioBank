<?php
function switchForm($id, $name)
{
?>
  <div class="custom-control custom-switch">
    <input type="checkbox" class="custom-control-input" id="<?php echo $id ?>" name="switch_<?php echo $name ?>" value="<?php echo $id ?>">
    <?php $label = strlen($name) > 40 ? substr($name, 0, 36) . " ..." : $name ?>
    <label class="custom-control-label" for="<?php echo $id ?>" title="<?php echo $name ?>"><?php echo $label ?></label>
  </div>
<?php
}
