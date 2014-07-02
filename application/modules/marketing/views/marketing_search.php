<form class="searchform" role="form">
    <div class="align_center polltext-wrapper">
        <p><?php echo lang('marketing.search_text'); ?></p>
        <br />    
        <div class="input-group">
        
            <?php input(array(
                'id' => 'search',
                'innergroup' => FALSE,
                'placeholder' => 'marketing.search_title',
                'value' => isset($search) ? $search : ''
            )); ?>
            
            <span class="input-group-btn">
    
                <?php button(array(
                    'class' => 'btn-warning search-btn',
                    'icon' => 'glyphicon-search',
                    'text' => 'marketing.search_button'
                )); ?>
            
            </span>
        </div>
    </div>
    
    <hr/>
    
    <div class="list-data">
        <?php //echo '<pre>'.print_r($list, true).'</pre>'; ?>
        
        <?php if($list && count($list) > 0): ?>
        
        <table class="footable table">
        	<thead>
        		<tr>
        			<th><?php echo lang('marketing.name_th'); ?></th>
        			<th><?php echo lang('marketing.document_th'); ?></th>
        			<th data-hide="all"><?php echo lang('marketing.celphone_th'); ?></th>
        			<th data-hide="all"><?php echo lang('marketing.phone_th'); ?></th>
        		</tr>
        	</thead>
            <tbody>         
            
            <?php foreach($list as $row): ?>
            
            <tr>
                <td><?php echo $row->FULL_NAME; ?></td>
                <td><?php echo $row->DOCUMENT; ?></td>
                <td><?php echo $row->JSON_DATA->celphone; ?></td>
                <td><?php echo $row->JSON_DATA->phone; ?></td>
            </tr>
            
            <?php endforeach; ?>
            
            </tbody>
         </table>
         
         <?php else: ?>
         
            <p><?php echo lang('marketing.nodata_text'); ?></p>
         
         <?php endif; ?>
         
    </div>
    
</form>
