
<?php if(session()->has('alert-success')): ?>
    <div class="alert alert-info alert-dismyissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            ×
        </button>

        <?php echo session('alert-success'); ?>

    </div>
<?php endif; ?>


<?php if(session()->has('alert-warning')): ?>
    <div class="alert alert-warning alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            ×
        </button>

        <?php echo session('alert-warning'); ?>

    </div>
<?php endif; ?>


<?php if(session()->has('alert-danger')): ?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            ×
        </button>

        <?php echo session('alert-danger'); ?>

    </div>
<?php endif; ?>