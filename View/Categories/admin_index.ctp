<div class="categories index">
	<h2><?php echo __d('Category', 'Categories'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('label'); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('link'); ?></th>
			<th><?php echo $this->Paginator->sort('lft'); ?></th>
			<th><?php echo $this->Paginator->sort('rght'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __d('Category', 'Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($categories as $category): ?>
	<tr>
		<td><?php echo h($category['Category']['id']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['parent_id']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['label']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['slug']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['link']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['lft']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['rght']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['created']); ?>&nbsp;</td>
		<td><?php echo h($category['Category']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__d('Category', 'View'), array('action' => 'view', $category['Category']['id'])); ?>
			<?php echo $this->Html->link(__d('Category', 'Edit'), array('action' => 'edit', $category['Category']['id'])); ?>
			<?php echo $this->Form->postLink(__d('Category', 'Delete'), array('action' => 'delete', $category['Category']['id']), array(), __d('Category', 'Are you sure you want to delete # %s?', $category['Category']['id'])); ?>
			<?php echo $this->Html->link(__d('Category', 'Mode Up'), array('action' => 'move_up', $category['Category']['id'], '1')); ?>
			<?php echo $this->Html->link(__d('Category', 'Mode Down'), array('action' => 'move_down', $category['Category']['id'], '1')); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __d('Category', 'Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __d('Category', 'previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__d('Category', 'next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __d('Category', 'Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__d('Category', 'New Category'), array('action' => 'add')); ?></li>
	</ul>
</div>
