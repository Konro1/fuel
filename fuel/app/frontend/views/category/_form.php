<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="control-group">
			<?php echo Form::label('Title', 'title', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('title', Input::post('title', isset($category) ? $category->title : ''), array('class' => 'span4', 'placeholder'=>'Title')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Alias', 'alias', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::input('alias', Input::post('alias', isset($category) ? $category->alias : ''), array('class' => 'span4', 'placeholder'=>'Alias')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::textarea('description', Input::post('description', isset($category) ? $category->description : ''), array('class' => 'span8', 'rows' => 8, 'placeholder'=>'Description')); ?>

			</div>
		</div>
		<div class="control-group">
			<?php echo Form::label('Status', 'status', array('class'=>'control-label')); ?>

			<div class="controls">
				<?php echo Form::checkbox('status', 1,Input::post('status', isset($category) && $category->status == 1 ? true : '')); ?>

			</div>
		</div>
		<div class="control-group">
			<label class='control-label'>&nbsp;</label>
			<div class='controls'>
				<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>			</div>
		</div>
	</fieldset>
<?php echo Form::close(); ?>