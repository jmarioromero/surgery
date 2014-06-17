<form class="searchform" role="form">
    <h3 class="subtitle"><?php echo lang('marketing.search_title'); ?></h3>
    <hr/>
    <!--
    <div class="form-group">

        <?php //select($document_select); ?>
        
    </div>
    -->
    <div class="form-group">
    
        <?php input(array(
            'label' => 'marketing.docid_label',
            'class' => 'numeric'
        )); ?>
    
    </div>                
    <div class="form-group">
    
        <?php input(array(
            'label' => 'marketing.name_label',
            'class' => 'onlyletters'
        )); ?>
    
    </div>                
    <hr/>
    <div>
        <table class="table-actions">
            <tbody>
                <tr>
                    <td class="align_left">
                    
                        <?php button(array(
                            'class' => 'btn-default cancelsearch-btn',
                            'text' => 'marketing.cancel_button'
                        )); ?>
                        
                    </td>
                    <td class="align_right">

                        <?php button(array(
                            'class' => 'btn-warning',
                            'icon' => 'glyphicon-search',
                            'text' => 'marketing.search_button'
                        )); ?>
                        
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <br />
</form>
                