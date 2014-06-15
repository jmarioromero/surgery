<?php $class = isset($class) ? $class : ''; ?>
<?php $id = isset($id) ? $id : ''; ?>
<?php $label = isset($label) ? lang($label) : ''; ?>
<?php $name = isset($name) ? $name : ''; ?>
<?php $value = isset($value) ? $value : date(DATEPICKER_FORMAT); ?>

<div class="input-group date date-wrapper" 
    data-date-format="dd-mm-yyyy" data-date-viewmode="years">
    <span class="input-group-addon add-on glyphicon glyphicon-calendar"></span>
    
    <?php if($label): ?>
    
        <span class="input-group-addon add-on labeltext"><?php echo $label; ?></span>
    
    <?php endif; ?>
    
    <input id="<?php echo $id; ?>" 
        class="span2 inputdate form-control <?php echo $class; ?>" 
        size="16" type="text" readonly="" value="<?php echo $value; ?>" 
        name="<?php echo $name; ?>" />
</div>
