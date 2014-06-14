<?php $label = isset($label) ? lang($label) : ''; ?>
<?php $id = isset($id) ? $id : ''; ?>
<?php $class = isset($class) ? $class : ''; ?>
<?php $date_at = isset($date_at) ? $date_at : date('d-m-Y'); ?>

<div class="input-group date date-wrapper" 
    data-date-format="dd-mm-yyyy" data-date-viewmode="years">

    <span class="input-group-addon add-on glyphicon glyphicon-calendar"></span>
    
    <?php if($label): ?>
    
        <span class="input-group-addon add-on labeltext"><?php echo $label; ?></span>
    
    <?php endif; ?>
    
    <input id="<?php echo $id; ?>" 
        class="span2 inputdate form-control <?php echo $class; ?>" 
        size="16" type="text" readonly="" value="<?php echo $date_at; ?>" />
        
</div>

<?php unset_at([$id, $class, $date_at]); ?>
