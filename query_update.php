<div class="modal fade" id="update_modal<?php echo $row_q['id']?>" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action="update_status.php">
				<div class="modal-header">
									</div>
				<div class="modal-body">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="form-group">
							
							<input type="hidden" name="id" value="<?php echo $row_q['id']?>"/>
                            <label>Employee ID : &nbsp;</label><?php echo $row_q['author']?><br />
                            <label>Query Date : &nbsp;</label><?php echo $row_q['date']?><br />
                                       
                      	
                        	<strong>Status :</strong> &nbsp;
                           <select name="status" class="form-control"> 
                           <option value="#">Select</option>
                            <option value="1">Solve</option>
                          </select>
						 					
						</div>
						
					</div>
				</div>
				<div style="clear:both;"></div>
				<div class="modal-footer">
					<button name="update" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Update</button>
					<button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
				</div>
				</div>
			</form>
		</div>
	</div>
</div>