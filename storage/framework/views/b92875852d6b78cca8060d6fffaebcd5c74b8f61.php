
<?php if(session()->has('alert-success')): ?>
    <div class="alert alert-success alert-dismyissable alert-php">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            ×
        </button>

        <?php echo session('alert-success'); ?>

    </div>
<?php endif; ?>


<?php if(session()->has('alert-warning')): ?>
    <div class="alert alert-warning alert-dismissable alert-php">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            ×
        </button>

        <?php echo session('alert-warning'); ?>

    </div>
<?php endif; ?>


<?php if(session()->has('alert-danger')): ?>
    <div class="alert alert-danger alert-dismissable alert-php">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            ×
        </button>

        <?php echo session('alert-danger'); ?>

    </div>
<?php endif; ?>


<?php if(session()->has('alert-info')): ?>
    <div class="alert alert-info alert-dismissable alert-php">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            ×
        </button>

        <?php echo session('alert-info'); ?>

    </div>
<?php endif; ?>