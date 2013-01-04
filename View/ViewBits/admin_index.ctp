<div class="view_bits index">
    <h2>View Bits</h2>

    <table cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('route'); ?></th>
                <th><?php echo $this->Paginator->sort('order'); ?></th>
                <th><?php echo $this->Paginator->sort('status_id'); ?></th>
                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                <th>Actions</th>
            </tr>
            <?php foreach($bits as $item):?>
                <tr>
                    <td><?php echo $item['ViewBit']['id'];?></td>
                    <td><?php echo $item['ViewBit']['name'];?></td>
                    <td><?php echo $item['ViewBit']['route'];?></td>
                    <td><?php echo $item['ViewBit']['order'];?></td>
                    <td><?php echo $this->StatusLights->status($item['ViewBit']['status_id']);?></td>
                    <td><?php echo $this->Time->niceShort($item['ViewBit']['modified']);?></td>
                    <td class="actions">
                        <?php echo $this->Actions->actions($item['ViewBit']['id']);?>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>

</div>