<?php $label = isset($label) ? lang($label) : $label; ?>
<?php $id = isset($id) ? $id : ''; ?>
<?php $class = isset($class) ? $class : ''; ?>
<?php $options = isset($options) ? $options : array(); ?>

<div class="input-group">
    
    <span class="input-group-addon"><?php echo $label; ?></span>
    
    <select id="<?php echo $id; ?>" 
        class="form-control selectpicker show-tick <?php echo $class; ?>" 
        data-width="100%" data-container="body">
        
        <?php if(count($options)): ?>
        
            <?php foreach($options as $key => $val): ?>
                
                <?php $text = lang($val); $text = empty($text) ? $val : $text; ?>
                
                <option value="<?php echo $key; ?>"><?php echo $text; ?></option>
                
            <?php endforeach; ?>
            
        <?php endif; ?>
            
    </select>
    
</div>

<?php unset_at([$label, $id, $class, $options]); ?>