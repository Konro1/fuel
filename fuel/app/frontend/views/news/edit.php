<h2>Editing <span class='muted'>News</span></h2>
<br>

<?php echo render('news/_form'); ?>
<p>
	<?php echo Html::anchor('news/view/'.$category->id, 'View'); ?> |
	<?php echo Html::anchor('news', 'Back'); ?></p>
