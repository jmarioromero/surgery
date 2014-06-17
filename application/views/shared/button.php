<?php $id = isset($id) ? $id : ''; ?>
<?php $class = isset($class) ? $class : ''; ?>
<?php $icon = isset($icon) ? $icon : ''; ?>
<?php $text = isset($text) ? lang($text) : ''; ?>

<button data-style="expand-left" 
    id="<?php echo $id; ?>" class="btn ladda-button <?php echo $class; ?>"
    type="button">
    
    <?php if($icon): ?>

        <span class="glyphicon <?php echo $icon; ?>"></span>
    
    <?php endif; ?>
    
    <?php echo $text; ?>
    
</button>
