<div class="poll-personaldata">
    <div class="row">
        <div class="col-md-6">
            <h3 class="subtitle subtitle-poll"><?php echo lang('marketing.personaldata_title'); ?></h3>
        </div>
        <div class="col-md-6">
        
            <?php datepicker(array(
                'label' => 'marketing.pollform_date',
                'name' => 'polldate'
            )); ?>

        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            
                <?php input(array(
                    'label' => 'marketing.docid_label',
                    'class' => 'numeric',
                    'maxlength' => '30',
                    'name' => 'document'
                )); ?>
            
            </div>                
        </div>
        <div class="col-md-6">
            <div class="form-group">
            
                <?php select($document_select); ?>
            
            </div>                
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            
                <?php input(array(
                    'label' => 'marketing.name_label',
                    'class' => 'onlyletters',
                    'maxlength' => '25',
                    'name' => 'name'
                )); ?>
            
            </div>                
        </div>
        <div class="col-md-6">
            <div class="form-group">
            
                <?php input(array(
                    'label' => 'marketing.lastname_label',
                    'class' => 'onlyletters',
                    'maxlength' => '25',
                    'name' => 'lastname'
                )); ?>
            
            </div>                
        </div>
    </div>
    <div class="row last-row">
        <div class="col-md-6">
            <div class="form-group">
            
                <?php datepicker(array(
                    'label' => 'marketing.birthdate_label',
                    'maxlength' => '16',
                    'name' => 'birthday'
                )); ?>
            
            </div>                
        </div>
        <div class="col-md-6">
        </div>
    </div>
    <hr />
</div>
