<form  role="form">

    <h2><?php echo lang('authorization.singup_form'); ?></h2>
    <hr/>

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">
                <span><?php echo lang('authorization.name_label'); ?></span>
            </span>
            <input type="text" class="form-control" placeholder="<?php echo lang('authorization.name_placeholder'); ?>">
        </div>
    </div>                

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">
                <span class="atsymbol">&#64;</span>
            </span>
            <input type="text" class="form-control" placeholder="<?php echo lang('authorization.email_placeholder'); ?>">
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
            </span>
            <input type="text" class="form-control" placeholder="<?php echo lang('authorization.username_placeholder'); ?>">
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

    <div class="form-group">
        <div class="checkbox">
            <label>
                <input type="checkbox"> <?php echo lang('authorization.terms_of_use'); ?>
            </label>
        </div>
    </div>

    <hr/>

    <div class="align_center">
        <button type="button" class="btn btn-warning"><?php echo lang('authorization.signup_button'); ?></button>
    </div>
    
    <br />

</form>
