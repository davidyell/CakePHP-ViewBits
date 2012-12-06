<div class="viewbit edit">
    <?php echo $this->Form->create('ViewBit');?>
    <fieldset>
        <legend><?php echo __('Admin Edit Content'); ?></legend>
        <?php
        echo $this->Form->input('name');
        echo $this->Form->input('route', array('after'=>'<span class="label label-info">You can use * to load on all pages</span>'));
        echo $this->Form->input('content', array('class'=>'ckeditor'));
        echo $this->Form->input('status_id');
        ?>
    </fieldset>
    <?php echo $this->Form->end('Save');?>
</div>