<h2>Viewing <span class='muted'>#<?php echo $category->id; ?></span></h2>

<p>
	<strong>Title:</strong>
	<?php echo $category->title; ?></p>
<p>
	<strong>Alias:</strong>
	<?php echo $category->alias; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $category->description; ?></p>
<p>
	<strong>Status:</strong>
	<?php echo $category->status; ?></p>

<?php echo Html::anchor('category/edit/'.$category->id, 'Edit'); ?> |
<?php echo Html::anchor('category', 'Back'); ?>