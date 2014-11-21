<div class="categories view">
<h2><?php echo __d('category', 'Category'); ?></h2>
	<dl>
		<dt><?php echo __d('category', 'Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('category', 'Parent Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['parent_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('category', 'Label'); ?></dt>
		<dd>
			<?php echo h($category['Category']['label']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('category', 'Slug'); ?></dt>
		<dd>
			<?php echo h($category['Category']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('category', 'Link'); ?></dt>
		<dd>
			<?php echo h($category['Category']['link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('category', 'Lft'); ?></dt>
		<dd>
			<?php echo h($category['Category']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('category', 'Rght'); ?></dt>
		<dd>
			<?php echo h($category['Category']['rght']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('category', 'Created'); ?></dt>
		<dd>
			<?php echo h($category['Category']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __d('category', 'Modified'); ?></dt>
		<dd>
			<?php echo h($category['Category']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __d('category', 'Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__d('category', 'Edit Category'), array('action' => 'edit', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__d('category', 'Delete Category'), array('action' => 'delete', $category['Category']['id']), array(), __d('category', 'Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('category', 'List Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__d('category', 'New Category'), array('action' => 'add')); ?> </li>
	</ul>
</div>
