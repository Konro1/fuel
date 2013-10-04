<h2>Listing <span class='muted'>Categories</span></h2>
<br>
<?php if ($categories): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Alias</th>
			<th>Description</th>
			<th>Status</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($categories as $category): ?>		<tr>

			<td><?php echo $category->title; ?></td>
			<td><?php echo $category->alias; ?></td>
			<td><?php echo $category->description; ?></td>
			<td><?php echo $category->status; ?></td>
			<td>
				<?php echo Html::anchor('news/index/'.$category->id, '<i class="icon-folder-open" title="Items"></i>'); ?> |
				<?php echo Html::anchor('category/view/'.$category->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('category/edit/'.$category->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('category/delete/'.$category->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Categories.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('category/create', 'Add new Category', array('class' => 'btn btn-success')); ?>

</p>
