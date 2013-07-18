<div class="viewBits index">
    <h2><?php echo __('View Bits'); ?></h2>
    <?php echo $this->Html->link('New', array('action'=>'add'), array('title'=>'Add new','class'=>'btn add-button'));?>

    <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
        <tr>
                                <th><?php echo $this->Paginator->sort('id'); ?></th>
                                        <th><?php echo $this->Paginator->sort('name'); ?></th>
                                        <th><?php echo $this->Paginator->sort('route'); ?></th>
                                        <th><?php echo $this->Paginator->sort('content'); ?></th>
                                        <th><?php echo $this->Paginator->sort('modified'); ?></th>
                                        <th><?php echo $this->Paginator->sort('order'); ?></th>
                                <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($viewBits as $viewBit): ?>
	<tr>
		<td><?php echo h($viewBit['ViewBit']['id']); ?>&nbsp;</td>
		<td><?php echo h($viewBit['ViewBit']['name']); ?>&nbsp;</td>
		<td><?php echo h($viewBit['ViewBit']['route']); ?>&nbsp;</td>
                <td><?php echo $this->Text->truncate($viewBit['ViewBit']['content']); ?>&nbsp;</td>
		<td><?php echo $this->Time->niceShort($viewBit['ViewBit']['modified']);?></td>
		<td><?php echo h($viewBit['ViewBit']['order']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Actions->actions($viewBit['ViewBit']['id'], array('e','d'));?>
		</td>
	</tr>
<?php endforeach; ?>
    </table>
    <p>
        <?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>    </p>
    <div class="paging">
        <?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
    </div>
</div>
