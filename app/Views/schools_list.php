<?php echo view('header'); ?>
	<div class="modal fade" id="ExtralargeModal" tabindex="-1">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Register Form</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form class="g-3" id="register_form">
						<div class="row justify-content-center">
							<div class="col-md-6">
								<input type="hidden" class="form-control" id="school_id" placeholder="school_id" name="school_id" value="">
							</div>
						</div>
						<div class="row justify-content-center">										
							<div class="col-md-6">
								<label for="school_name" class="form-label">School Name <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="school_name" placeholder="Enter school name" name="school_name" required>
								<span class="text-danger error-text error_pschool_name"></span>
							</div>
							<div class="col-md-6">
								<label for="school_location" class="form-label">School Location <span class="text-danger">*</span></label>
								<input type="text" class="form-control" id="school_location" placeholder="Enter school location" name="school_location" required>
								<span class="text-danger error-text error_school_location"></span>
							</div>
						</div>
						<br/>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" id="btn_close" data-bs-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="btn_save">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<!-- End Extra Large Modal-->

	<div class="container p-2">

		<button type="button" class="btn btn-primary py-2 my-3" id="btn_add" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">
			<i class="bi bi-plus-square-fill"></i> <span>Add New School</span>
		</button>
		<table class="table table-striped" style="width:100%" id="myTable">
			<thead>
				<tr>
					<th>Name</th>
					<th>Location</th>
					<th class="action" align="center">Action</th>
				</tr>
			</thead>
			<tbody></tbody>
			<tfoot></tfoot>
		</table>
	</div>

	<?php echo view('scripts'); ?>

	<script type="text/javascript">
		$('#btn_add').click(function(){
			$('#school_id').val('');
			$('#register_form')[0].reset();
			$('#ExtralargeModal').modal('show');
		});

		$('#btn_save').on('click',function(e){
			e.preventDefault();
	        $('span.error-text').text('');
			$.ajax({
				url: 'school/store',
				type: 'POST',
				data:$('#register_form').serialize()+'&redirect='+true,
				success: function(data) {
					$('#register_form')[0].reset();
					$("#btn_close").click();
					prepare_data();
				}
			});
		});

		$(function() {
			prepare_data();
		});

		function prepare_data() {
			$('#myTable').DataTable().destroy();
			$('#myTable').DataTable( {
				processing: true,
        		serverSide: true,
				ajax: {
					url: 'fetch_list',
					type: 'POST',
				},
				columns: [
					{ data: 1 },
					{ data: 2 },
					{ data: 0 },
				],
				columnDefs: [
				    {
				    	targets: "action",
				    	render: function(data, type, row, meta){
				    		html = '<div class="d-flex">';
				    		html += '<div class="col"><button id="'+data+'" class="btn btn-info edit"><i class="bi bi-pencil-square"></i>Edit</button></div>';
				    		html += '<div class="col"><button id="'+data+'" class="btn btn-danger remove"><i class="bi bi-trash-fill"></i>Delete</button></div>';
				    		html += '</div>';
							return html;
						}
					}
				]
			});
		}

		$('#myTable tbody').on( 'click', 'button.edit', function (e) {
			e.preventDefault();
			$.ajax({
				url:'fetch_school',
				type:'POST',
				dataType:'json',
				data:{id:this.id},
				// headers: csrf,
				success : function(data) {
					console.log(data);
					$('#register_form')[0].reset();
					$('#school_id').val(data.id);
					$('#school_name').val(data.name);
					$('#school_location').val(data.location);
					$('#ExtralargeModal').modal('show');
				}
			});
		});

		$('#myTable tbody').on( 'click', 'button.remove', function (e) {
			e.preventDefault();
			$.ajax({
				url:'school/delete',
				type:'POST',
				dataType:'json',
				data:{id:this.id, redirect:true}
			});

			prepare_data();
		});
	</script>
	
<?php echo view('footer'); ?>