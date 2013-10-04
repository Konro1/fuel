<h2>Listing <span class='muted'>News</span></h2>
<br>
<?php if ($news): ?>
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
	<?php foreach ($news as $new): ?>		
		<tr>

			<td><?php echo $new->title; ?></td>
			<td><?php echo $new->alias; ?></td>
			<td><?php echo $new->description; ?></td>
			<td><?php echo $new->status; ?></td>
			<td>
				<?php echo Html::anchor('news/view/'.$new->id, '<i class="icon-eye-open" title="View"></i>'); ?> |
				<?php echo Html::anchor('news/edit/'.$new->id, '<i class="icon-wrench" title="Edit"></i>'); ?> |
				<?php echo Html::anchor('news/delete/'.$new->id, '<i class="icon-trash" title="Delete"></i>', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
	<?php endforeach; ?>	
</tbody>
</table>

<?php else: ?>
<p>No News.</p>

<?php endif; ?><p>
	<?php echo Html::anchor("news/create/$pid", 'Add news', array('class' => 'btn btn-success')); ?>

</p>
