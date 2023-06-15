<div class="modal fade" id="exampleModal<?php echo $row_q['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel"  aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<form method="POST" action="update_status.php">
				<div class="bg-light modal-header">
					<h4 class="text-primary">Resolve the Query</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="col-md-8">
						<div class="form-group">
							
							<input type="hidden" name="id" value="<?php echo $row_q['id']?>"/>
                            <label>Employee ID : &nbsp;</label><?php echo $row_q['author']?><br />
                            <label>Query Date : &nbsp;</label><?php echo $row_q['date']?><br />
                        	<label>Status :</label>
                           <select name="status" class=""> 
                           <option value="#">Select</option>
                            <option value="1">Solve</option>
                          </select>
						</div>
					</div>
				</div>
				<div style="clear:both;"></div>
				<div class="modal-footer">
					<button name="update" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Update</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				</div>
				</div>
			</form>
		</div>
	</div>
</div>