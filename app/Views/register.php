<?php echo view('header'); ?>
	<title>Register</title>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5 col-md-5">
				<?php echo form_open('store'); ?>
					<div class="form-group text-center">
						<h1>Registraion</h1>
					</div>
					<div class="form-group">
						<label for="name" class="form-label">Name</label>
						<?php
							echo form_input([
							    'name'        => 'name',
							    'id'          => 'name',
							    'placeholder' => 'Enter Name',
							    'type'        => 'text',
							    'class'       => 'form-control',
							    'required'    => true,
							]);
						?>
					</div>
					<div class="form-group">
						<label for="email" class="form-label">Email</label>
						<?php
							echo form_input([
							    'name'        => 'email',
							    'id'          => 'email',
							    'placeholder' => 'Enter email',
							    'type'        => 'text',
							    'class'       => 'form-control',
							    'required'    => true,
							]);
						?>
					</div>

					<div class="form-group">
						<label for="password" class="form-label">Password</label>
						<?php
							echo form_input([
							    'name'        => 'password',
							    'id'          => 'password',
							    'placeholder' => 'Enter password',
							    'type'        => 'password',
							    'class'       => 'form-control',
							    'required'    => true,
							]);
						?>
					</div>

					<div class="form-group">
						<label for="confirmpassword" class="form-label">confirmpassword</label>
						<?php
							echo form_input([
							    'name'        => 'confirmpassword',
							    'id'          => 'confirmpassword',
							    'placeholder' => 'Confirm password',
							    'type'        => 'password',
							    'class'       => 'form-control',
							    'required'    => true,
							]);
						?>
					</div>

					<div class="form-group">
						<label for="submit" class="form-label"></label>
						<?php
							echo form_input([
							    'id'     => 'btn_register',
							    'type'   => 'submit',
							    'value'	 => 'Register',
							    'class'  => 'form-control btn-primary'
							]);
						?>
					</div>
				<?php echo form_close(); ?>
				<p><a href="/login">Login</a></p>
			</div>
		</div>
	</div>
<?php echo view('footer'); ?>