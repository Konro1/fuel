<h2>Login CRM</h2>
<br>

<?php echo Form::open(array("class"=>"form-horizontal")); ?>
<fieldset>
	<div class="control-group">
		<?php echo Form::label('Login', 'username', array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo Form::input('username',Input::post('username', isset($login) ? $login->login : ''), array('class' => 'span4', 'placeholder'=>'Login')) ?>
		</div>
	</div>
	<div class="control-group">
		<?php echo Form::label('Password', 'password', array('class'=>'control-label')); ?>
		<div class="controls">
			<?php echo Form::password('password',null, array('class' => 'span4', 'placeholder'=>'******')) ?>
		</div>
	</div>
	<div class="control-group">
		<label class='control-label'>&nbsp;</label>
		<div class='controls'>
			<?php echo Form::submit('submit', 'Login', array('class' => 'btn btn-primary')); ?>			
		</div>
	</div>
</fieldset>
<?php echo Form::close(); ?>
