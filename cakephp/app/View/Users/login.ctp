<div class="users form">
<?php echo $this->Flash->render('auth'); ?>
<?php echo $this->Form->create('User'); ?>
<?php
echo $this->Form->input('username', array(
  'label' => false,
  'div' => false,
  'placeholder' => 'ユーザー名'
));
echo $this->Form->input('password', array(
  'label' => false,
  'div' => false,
  'placeholder' => 'パスワード'
));
?>
<style>
.submit input {
background-color:#0060C0;
}
</style>
<?php echo $this->Form->end(__('Login'), array(
  'class' => 'submit',
  'div' => false
)); ?>
</div>
