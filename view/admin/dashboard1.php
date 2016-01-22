<?php	//	echo "<pre>";print_r($detail);	?>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">       
        <!-- left menu starts -->
        <!-- left menu ends -->
        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts --><div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Users</a>
            </li>
        </ul>
    </div>
	<?php if($this->session->flashdata('avail')!=''){ ?>
									<p><?php echo $this->session->flashdata('avail'); ?></p>  
							<?php } ?> 
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Users Listing</h2>

        <div class="box-icon">
            
            <a href="#" class="btn btn-minimize btn-round btn-default">
			<i class="glyphicon glyphicon-chevron-up"></i></a>
            
        </div>
    </div>
    <div class="box-content">
  <br/>
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
        <th>User Nane</th>
        <th>Email</th>	
        <th>organisation_name</th>
        <th>organisation_type</th>
        <th>Contact No</th>
        <th>landline</th>
        <th>address</th>
        <th>city</th>
        <th>state</th>
        <th>country</th>
        <th>Number Of Room</th>
        <th>facilities</th>
        <th>Photo</th>
        <th>avail</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
		<?php
		if(@$detail)
		{
			foreach($detail as $d)
			{
			?>
    <tr>
        <td class="center"><?php echo $d['username'];?></td>
        <td class="center"><?php echo $d['email'];?></td>
        <td class="center"><?php echo $d['organisation_name'];	?></td>
        <td class="center"><?php 
		
		switch($d['organisation_name']){
		    case '1' : echo "Hotel"; break;
			case '2' : echo "Dharamshala"; break;
			case '3' : echo "Guest House"; break;
			case '4' : echo "Tour & Travels"; break;
			case '5' : echo "Famous Places"; break;
			default :
			 echo "Hotel"; 
		}

		?></td>
        <td class="center"><?php echo $d['mobile'];?></td>
        <td class="center"><?php echo $d['landline'];?></td>
        <td class="center"><?php echo $d['address'];?></td>
        <td class="center"><?php echo $d['city'];?></td>
        <td class="center"><?php echo $d['state'];?></td>
        <td class="center"><?php echo $d['country'];?></td>
        <td class="center"><?php echo $d['number_of_room'];?></td>
        <td class="center"><?php echo $d['facilities'];?></td>
        <td class="center">
		
		 <a class="btn btn-success btn-sm group1"  href="<?php //echo base_url(); ?>../../images/registration/<?php echo $d["photo1"]; ?>" data-id="<?php echo $d['photo1'];?>">
               Images
            </a>
		</td>
        <td class="center">
			<?php
			if($d['avail']=='N')
			{
			?>
			  <span class="label-default label">Inactive</span>
			<?php	
			}
			else
			{
			?>
			  <span class="label-success label label-default">Active</span>
			<?php 
			}
          ?>
        </td>
        <td class="center">
            <a class="btn btn-success inlinex"  href="#inline_content" data-id="<?php echo $d['userid'];?>" data-status="<?php echo $d['avail'];?>" data-idproof="<?php echo $d['avail'];?>">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                View Details
            </a>
			<a class="btn btn-success" target="_blank" href="viewSingleUserMedia/<?php echo $d['userid'];?>" data-id="<?php echo $d['userid'];?>" data-status="<?php echo $d['avail'];?>" data-idproof="<?php echo $d['avail'];?>">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                View Media
            </a>
          
        </td>		
    </tr>
    <?php
	}
	}
    ?>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->
    </div><!--/row-->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->    <hr> 
    <footer class="row">     </footer>
</div><!--/.fluid-container-->
	<!-- This contains the hidden content for inline calls -->
		<div style="display:none;">
			<div id='inline_content' style='padding:10px; background:#fff;'>
	<form name="form10" id="form10" method="post" action="<?php echo base_url(); ?>admin/changeavail" enctype="multipart/form-data">
			<aside class="back_office_right">
			
<div id="singleUserDetail">
	<div class="container">
  <h2>User Details </h2>
  <table class="table table-bordered">
	<thead>
	  <tr>
		<th>Name</th>
		<th>Facebook</th>
		<th>Email</th>
		<th>Address</th>
		<th>Mobile</th>
		<th>Image</th>
		<th>avail</th>
	  </tr>
	</thead>
	<tbody>
	  <tr>
		<td id="name"></td>
		<td id="facebook_id"></td>
		<td id="email"></td>
		<td id="home_address"></td>
		<td id="mobile"></td>
		<td ><img id="profile_image" height="100" width="100" /></td>
		<td id="ajax_avail"></td>

	  </tr>      
	</tbody>
  </table>
</div>
</div>
			
							
								<div alt="" id="image"><br />
									<input type="hidden" id="id" name="id">
									<input type="hidden" id="avail" name="avail">
								<input type="submit" value="Change avail" id="text" >
		<a type="button" href="deleteUser"  id="deleteUserid" class="btn-danger btn-lg">Delete User</a>
								
							</aside>
		</form>
			</div>				
			</div>




                            
                            