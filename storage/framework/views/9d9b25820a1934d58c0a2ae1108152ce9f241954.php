<?php $__env->startComponent('mail::message'); ?>
# Alteração da senha de acesso

Boa tarde <?php echo e($dataUser->name); ?>, foi gerado uma senha temporária para possibilitar o seu acesso a plataforma. Você poderá alterar
a sua senha no peril de usuário.

Senha temporária: <?php echo e($dataUser->newPassword); ?>


Obrigado :)

<?php $__env->startComponent('mail::button', ['url' => PATH_URL]); ?>
Ir para o Tracking Celebryts
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
