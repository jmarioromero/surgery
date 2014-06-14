<!-- Main component for a primary marketing message or call to action -->
<div class="jumbotron">
    <h1><?php echo lang('frontpage.text'); ?></h1>
    
    <?php $cur_lang = $this->lang->lang(); ?>
    <?php $cur_lang = ($cur_lang === 'es') ? 'en' : 'es'; ?>
    
    <p>
        <?php echo anchor($this->lang->switch_uri($cur_lang), lang('frontpage.anchortext')); ?>
    </p>
    <p>This example demonstrates using the offcanvas plugin with the navbar.</p>
</div>

<p>
    By default the navbar is show on the right side of the screen. You can show it on the left side instead by
    adding <code>.navmenu-fixed-left</code> to the <code>.navbar-offcanvas</code>.
</p>