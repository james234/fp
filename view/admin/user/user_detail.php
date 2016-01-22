<?php 
//print_r($detail);
?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
	    <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">User Details</h3>
                </div><!-- /.box-header -->
               <div class="box-body table-responsive no-padding">	
                <table id="user_list" class="table table-hover table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>User Id</th>
						<th>User Name</th>
						<th>Email</th>							
						<th>address</th>
						<th>Photo</th>
						<th>avail</th>
						<th>Action</th>
						
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($userDetails as $key => $table_data){?>
					  <tr>
							<td><?php echo $table_data['user_id']?></td>
							<td><?php echo $table_data['username'];?></td>
							<td><?php echo $table_data['email'];?></td>
							<td><?php echo $table_data['address'];?></td>
							<td><img src="<?php echo base_url()?>uploads/profile/"<?php echo $table_data['image'];?></td>
							<td><?php if($table_data['avail'] =='Y'){?>
							Approved
							<?php }else{?>
							Pending
							<?php }?></td>
							 <td>
									<a type="button" class="btn btn-primary navbar-btn"
									   href="<?php echo base_url() . 'admin/quotes_for_state/' .'/'.$table_data['id']; ?>"><i
											class="fa fa-edit"></i> Edit</a>
									<a type="button" class="btn btn-danger navbar-btn" href="<?php echo base_url() . 'admin/delete_quotes/'.$table_data['id'] ?>"><i class="fa fa-trash-o"></i> Delete</a>
									<?php if($table_data['avail'] =='Y'){?>
									<a type="button" class="btn btn-success navbar-btn" href="<?php echo base_url() . 'admin/changestatus/'.$table_data['id'].'/N'?>"> Disable</a>
									<?php }else{?>
									<a type="button" class="btn btn-success navbar-btn" href="<?php echo base_url() . 'admin/changestatus/'.$table_data['id'].'/Y'?>"> Enable</a>
									<?php }?>
                                </td>
                      </tr>                      
                      <?php }?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			  </div><!-- /.col -->
          </div><!-- /.row -->
       </section><!-- /.content -->
	   </div><!-- /.content-wrapper -->