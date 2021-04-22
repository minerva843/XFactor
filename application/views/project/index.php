    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="col-md-12" style="width:100%">
					<table id="example" class="display" style="width:100%">
						<thead>
							<tr>
								<th>S.no</th>
								<th>Project Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1;foreach($projects as $pr)
							{?>
								<tr>
									<td><?php echo $i;?></td>
									<td><?php echo $pr->name; ?></td>
									<td><a href="<?php echo base_url('project/edit/'.$pr->id);?>">Edit</a></td>
									<td><a href="<?php echo base_url('project/delete/'.$pr->id);?>">Delete</a></td>
								</tr>
							<?php $i++; }?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>