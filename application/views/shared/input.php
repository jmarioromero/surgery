<?php $class = isset($class) ? $class : ''; ?>
<?php $id = isset($id) ? $id : ''; ?>
<?php $label = isset($label) ? lang($label) : ''; ?>
<?php $maxlength = isset($maxlength) ? $maxlength : 10; ?>
<?php $name = isset($name) ? $name : ''; ?>
<?php $placeholder = isset($placeholder) ? $placeholder : $label; ?>
<?php $value = isset($value) ? $value : ''; ?>

<div class="input-group">
    <span class="input-group-addon"><?php echo $label; ?></span>
    <input id="<?php echo $id; ?>" 
        type="text" class="form-control <?php echo $class; ?>" 
        placeholder="<?php echo $placeholder; ?>" 
        maxlength="<?php echo $maxlength; ?>"
        name="<?php echo $name; ?>" 
        value="<?php echo $value; ?>" />
</div>
