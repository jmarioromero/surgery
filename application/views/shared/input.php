<?php $class = isset($class) ? $class : ''; ?>
<?php $id = isset($id) ? $id : ''; ?>
<?php $label = isset($label) ? lang($label) : ''; ?>
<?php $maxlength = isset($maxlength) ? $maxlength : 10; ?>
<?php $innergroup = isset($innergroup) ? $innergroup : TRUE; ?>
<?php $name = isset($name) ? $name : ''; ?>
<?php $placeholder = isset($placeholder) ? lang($placeholder) : $label; ?>
<?php $value = isset($value) ? $value : ''; ?>

<?php if ($innergroup): ?>

<div class="input-group">
    
<?php endif; ?>
    
    <?php if ($label): ?>

    <span class="input-group-addon"><?php echo $label; ?></span>
    
    <?php endif; ?>
    
    <input id="<?php echo $id; ?>" 
        type="text" class="form-control <?php echo $class; ?>" 
        placeholder="<?php echo $placeholder; ?>" 
        maxlength="<?php echo $maxlength; ?>"
        name="<?php echo $name; ?>" 
        value="<?php echo $value; ?>" />
        
<?php if ($innergroup): ?>

</div>

<?php endif; ?>
