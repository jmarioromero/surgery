<?php $class = isset($class) ? $class : ''; ?>
<?php $default = isset($default) ? $default : ''; ?>
<?php $id = isset($id) ? $id : ''; ?>
<?php $label = isset($label) ? lang($label) : $label; ?>
<?php $name = isset($name) ? $name : ''; ?>
<?php $options = isset($options) ? $options : array(); ?>

<div class="input-group">
    <span class="input-group-addon"><?php echo $label; ?></span>
    <select id="<?php echo $id; ?>" 
        class="form-control selectpicker show-tick <?php echo $class; ?>" 
        data-width="100%" data-container="body"
        name="<?php echo $name; ?>" >
        
        <?php if(count($options)): ?>
        
            <?php foreach($options as $key => $val): ?>
                
                <?php $text = lang($val); $text = empty($text) ? $val : $text; ?>
                <?php $selected = ($default == $key ? 'selected' : ''); ?>
                
                <option <?php echo $selected; ?> 
                    value="<?php echo $key; ?>"><?php echo $text; ?></option>
                
            <?php endforeach; ?>

        <?php endif; ?>

    </select>    
</div>
