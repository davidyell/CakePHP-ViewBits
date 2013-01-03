<div class="viewbit edit">
    <?php echo $this->Form->create('ViewBit');?>
    <fieldset>
        <legend><?php echo __('Admin Edit Content'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('name');
        echo $this->Form->input('route', array('after'=>'<span class="label label-info">You can use * to load on all pages</span>'));
        echo $this->Form->input('content', array('class'=>'ckeditor'));
        echo $this->Form->input('status_id');
        ?>
    </fieldset>
    <?php echo $this->Form->end('Save');?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ViewBit.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ViewBit.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List ViewBits'), array('action' => 'index')); ?></li>
	</ul>
</div>