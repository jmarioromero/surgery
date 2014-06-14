<?php $id = isset($id) ? $id : ''; ?>
<?php $class = isset($class) ? $class : ''; ?>
<?php $icon = isset($icon) ? $icon : ''; ?>
<?php $text = isset($text) ? lang($text) : ''; ?>

<button type="button" id="<?php echo $id; ?>" class="btn <?php echo $class; ?>">
    
    <?php if($icon): ?>

        <span class="glyphicon <?php echo $icon; ?>"></span>
    
    <?php endif; ?>
    
    <?php echo $text; ?>
    
</button>
