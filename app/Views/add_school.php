<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<title>Login</title>
</head>
<body>
	<div class="container my-4">
		<?php echo form_open('school/store'); ?>
		<form class="g-3" id="register_form">
			<div class="row justify-content-center">
				<div class="col-md-6">
					<input type="hidden" class="form-control" id="school_id" placeholder="school_id" name="school_id" value="<?php echo isset($id) ? $id : ''; ?>">
				</div>
			</div>
			<div class="row justify-content-center">										
				<div class="col-md-6">
					<label for="school_name" class="form-label">School Name <span class="text-danger">*</span></label>
					<?php echo form_input([
							    'name'        => 'school_name',
							    'id'          => 'school_name',
							    'placeholder' => 'Enter school name',
							    'type'        => 'text',
							    'class'       => 'form-control',
							    'value'		  => isset($name) ? $name : '',
							    'required'    => true,
							]); ?>
					<span class="text-danger error-text error_pschool_name"></span>
				</div>
				<div class="col-md-6">
					<label for="school_location" class="form-label">School Location <span class="text-danger">*</span></label>
					<?php echo form_input([
							    'name'        => 'school_location',
							    'id'          => 'school_location',
							    'placeholder' => 'Enter school location',
							    'type'        => 'text',
							    'class'       => 'form-control',
							    'value'		  => isset($location) ? $location : '',
							    'required'    => true,
							]); ?>
					<span class="text-danger error-text error_school_location"></span>
				</div>
			</div>
			<br/>
			<div class="modal-footer">
				<a href="/"><button type="button" class="btn btn-secondary" id="btn_close" data-bs-dismiss="modal">back</button></a>
				<button type="submit" class="btn btn-primary" id="btn_save">Save</button>
			</div>
		<?php echo form_close(); ?>
	</div>
</body>
</html>