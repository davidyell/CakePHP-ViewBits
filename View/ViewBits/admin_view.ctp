<div class="viewbit view">
    <h2>View</h2>
    <dl>
        <dt>Id</dt>
        <dd>
            <?php echo $bit['ViewBit']['id'];?>
        </dd>
        <dt>Name</dt>
        <dd>
            <?php echo $bit['ViewBit']['name'];?>
        </dd>
        <dt>Route</dt>
        <dd>
            <?php echo $bit['ViewBit']['route'];?>
        </dd>
        <dt>Content</dt>
        <dd class="well">
            <?php echo $bit['ViewBit']['content'];?>
        </dd>
        <dt>Status</dt>
        <dd>
            <?php echo $bit['Status']['name'];?>
        </dd>
        <dt>Created</dt>
        <dd>
            <?php echo $bit['ViewBit']['created'];?>
        </dd>
        <dt>Modified</dt>
        <dd>
            <?php echo $bit['ViewBit']['modified'];?>
        </dd>
    </dl>
</div>
<div class="actions">
    <h3>Actions</h3>
    <ul>
        <li><?php echo $this->Html->link('Edit ViewBit', array('controller'=>'view_bits','action'=>'edit',$bit['ViewBit']['id']));?></li>
        <li><?php echo $this->Form->postLink(__('Delete ViewBit'), array('action' => 'delete', $bit['ViewBit']['id']), null, __('Are you sure you want to delete # %s?', $bit['ViewBit']['id'])); ?> </li>
        <li><?php echo $this->Html->link('List ViewBits', array('action'=>'index'));?></li>
    </ul>
</div>