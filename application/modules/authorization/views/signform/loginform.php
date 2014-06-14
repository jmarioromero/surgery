<form  role="form">

    <h2><?php echo lang('authorization.login_form'); ?></h2>
    <hr/>

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">
                <span class="atsymbol">&#64;</span> &#47; <span class="glyphicon glyphicon-user"></span>
            </span>
            <input type="text" class="form-control" placeholder="<?php echo lang('authorization.email_username_placeholder'); ?>">
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-lock"></span>
            </span>
            <input type="text" class="form-control" placeholder="<?php echo lang('authorization.password_placeholder'); ?>">
        </div>
    </div>                

    <hr/>

    <div class="align_center">
        <button type="button" class="btn btn-success"><?php echo lang('authorization.login_button'); ?></button>
    </div>
    
    <br />

</form>