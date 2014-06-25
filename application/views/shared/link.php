<?php $id = isset($id) ? $id : ''; ?>
<?php $class = isset($class) ? $class : ''; ?>
<?php $class = (strpos($class, 'btn-') === FALSE) ? "btn-default {$class}" : $class; ?>
<?php $href = isset($href) ? $href : '#'; ?>
<?php $icon = isset($icon) ? $icon : ''; ?>
<?php $text = isset($text) ? lang($text) : ''; ?>

<a href="<?php echo $href; ?>" id="<?php echo $id; ?>" 
    class="btn <?php echo $class; ?>">
    
    <?php if($icon): ?>

        <span class="glyphicon <?php echo $icon; ?>"></span>
    
    <?php endif; ?>
    
    <?php echo $text; ?>
    
</a>
