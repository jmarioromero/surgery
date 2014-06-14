<?php $label = isset($label) ? lang($label) : ''; ?>
<?php $id = isset($id) ? $id : ''; ?>
<?php $class = isset($class) ? $class : ''; ?>
<?php $placeholder = isset($placeholder) ? $placeholder : $label; ?>
<?php $maxlength = isset($maxlength) ? $maxlength : 10; ?>

<div class="input-group">
    <span class="input-group-addon"><?php echo $label; ?></span>
    <input id="<?php echo $id; ?>" 
        type="text" class="form-control <?php echo $class; ?>" 
        placeholder="<?php echo $placeholder; ?>" 
        maxlength="<?php echo $maxlength; ?>" />
        
</div>

<?php unset_at([$label, $id, $class, $placeholder, $maxlength]); ?>
