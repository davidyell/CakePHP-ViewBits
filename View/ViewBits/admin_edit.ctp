<div class="viewBits form">
<?php echo $this->Form->create('ViewBit'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit View Bit'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('route', array('after' => '<span class="label label-info">Which url should the content be loaded on, should start with /</span>'));
		echo $this->Form->input('content');
		echo $this->Form->input('order');
	?>
	</fieldset>
<?php echo $this->Form->button('Save', array('type' => 'submit', 'class' => 'btn btn-success')); ?>
<?php echo $this->Html->link('Cancel', array('action' => 'index'), array('class' => 'btn')); ?>
<?php echo $this->Form->end(); ?>
</div>