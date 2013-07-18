<div class="viewBits form">
<?php echo $this->Form->create('ViewBit'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add View Bit'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('route');
		echo $this->Form->input('content');
		echo $this->Form->input('order');
	?>
	</fieldset>
<?php echo $this->Form->button('Save', array('type' => 'submit', 'class' => 'btn btn-success')); ?>
<?php echo $this->Html->link('Cancel', array('action' => 'index'), array('class' => 'btn')); ?>
<?php echo $this->Form->end(); ?>
</div>