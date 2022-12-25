<?php echo view('header'); ?>
	<title>Login</title>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5 col-md-5">
				<?php if(session()->getFlashdata('loginError')):?>
                    <div class="alert alert-warning">
                       <?= session()->getFlashdata('loginError') ?>
                    </div>
                <?php endif;?>
				<?php echo form_open('loginAuth'); ?>
					<div class="form-group text-center">
						<h1>Login</h1>
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
						<label for="submit" class="form-label"></label>
						<?php
							echo form_input([
							    'id'    => 'btn_login',
							    'type'  => 'submit',
							    'value'	=> 'login',
							    'class' => 'form-control btn-primary'
							]);
						?>
					</div>
				<?php echo form_close(); ?>
				<p><a href="/register">Register</a></p>
			</div>
		</div>
	</div>
<?php echo view('footer'); ?>