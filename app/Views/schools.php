<?php echo view('header'); ?>
	<style type="text/css"> 
		a { 
			padding-left: 5px; 
			padding-right: 5px; 
			margin-left: 5px; 
			margin-right: 5px; 
		}
		.pagination li.active {
			background: deepskyblue;
			color: white;
		}
		.pagination li.active a {
			color: white;
			text-decoration: none;
		}
	</style>
	<div class="container py-2">
		<a href="school/edit">
			<button type="button" class="btn btn-primary py-2 my-3" data-bs-toggle="modal" data-bs-target="#ExtralargeModal">
				<i class="bi bi-plus-square-fill"></i> <span>Add New School</span>
			</button>
		</a>
		<form method='get' action="/schools" id="searchForm">
	       <input type='text' name='search' value='<?= $search ?>'> <input type='button' id='btnsearch' value='Submit' onclick='document.getElementById("searchForm").submit();'>
	     </form>
		<table class="table table-striped">
			<thead>
				<th>Sr. No</th>
				<th>Name</th>
				<th>Location</th>
				<th>Opration</th>
			</thead>
			<tbody>
			<?php foreach ($schools as $key => $school) { ?>
				<tr>
					<td><?= $key+1; ?></td>
					<td><?= $school['name']; ?></td>
					<td><?= $school['location']; ?></td>
					<td>
						<a href="<?php echo "school/edit/{$school['id']}" ?>"><button class="btn-success">Edit</button></a>
						<a href="<?php echo "school/delete/{$school['id']}" ?>"><button class="btn-danger">Delete</button></a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
			<tfoot></tfoot>
		</table>
		<div style='margin-top: 10px;'> 
		<?= $pager->links(); ?>
		</div>
	</div>
<?php echo view('footer'); ?>



