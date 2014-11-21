<div class="categories view">
<h2><?php echo __d('Category', 'Category'); ?></h2>
	<dl>
		<dt><?php echo __d('Category', 'Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('Category', 'Parent Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['parent_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('Category', 'Label'); ?></dt>
		<dd>
			<?php echo h($category['Category']['label']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('Category', 'Slug'); ?></dt>
		<dd>
			<?php echo h($category['Category']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('Category', 'Link'); ?></dt>
		<dd>
			<?php echo h($category['Category']['link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('Category', 'Lft'); ?></dt>
		<dd>
			<?php echo h($category['Category']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('Category', 'Rght'); ?></dt>
		<dd>
			<?php echo h($category['Category']['rght']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('Category', 'Created'); ?></dt>
		<dd>
			<?php echo h($category['Category']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('Category', 'Modified'); ?></dt>
		<dd>
			<?php echo h($category['Category']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __d('Category', 'Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__d('Category', 'Edit Category'), array('action' => 'edit', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__d('Category', 'Delete Category'), array('action' => 'delete', $category['Category']['id']), array(), __d('Category', 'Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('Category', 'List Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('Category', 'New Category'), array('action' => 'add')); ?> </li>
	</ul>
</div>
