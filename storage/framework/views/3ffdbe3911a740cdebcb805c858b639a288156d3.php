<?php $__env->startComponent('mail::message'); ?>
# Novo usuário no Tracking Celebryts

Olá <?php echo e($dataUser->name); ?>, tudo bem?

Parabéns você acaba de ser cadastrado na Tracking Celebryts, os seus dados acesso seguem abaixo:

E-mail: <?php echo e($dataUser->email); ?>


Senha: Tracking2017$

Importante! 
Você poderá alterar sua senha no perfil do usuário na plataforma.

Att.
Equipe Tracking

<?php $__env->startComponent('mail::button', ['url' => PATH_URL]); ?>
Ir para o Tracking Celebryts
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
