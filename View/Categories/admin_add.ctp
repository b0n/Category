<div class="categories form">
<?php echo $this->Form->create('Category'); ?>
	<fieldset>
		<legend><?php echo __d('category', 'Admin Add Category'); ?></legend>
	<?php
		echo $this->Form->input('parent_id', array('options' => $parentCategories, 'empty' => true));
		echo $this->Form->input('label');
		echo $this->Form->input('slug');
	?>
	</fieldset>
<?php echo $this->Form->end(__d('category', 'Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __d('category', 'Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__d('category', 'List Categories'), array('action' => 'index')); ?></li>
	</ul>
</div>
