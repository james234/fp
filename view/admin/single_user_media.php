<?php   ?>
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
<a class="navbar-brand1" href="<?php echo base_url()?>admin/dashboard"> <img alt="Charisma Logo" src="<?php echo base_url()?>uploads/logo.png" class="hidden-xs"/></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> admin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                   
                  
                    <li><a href="<?php echo base_url();?>admin/index">Logout</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

          


        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>       
						<li ><a class="ajax-link" href="<?php echo base_url().'admin/dashboard'?>" >
						<i class="glyphicon glyphicon-align-justify"></i><span> Users Listing</span></a></li>				
                         
                    </ul>
                  
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->


        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
                <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Media</a>
            </li>
		<span class="box-icon"><i class="glyphicon"></i><?php echo $email['email'];?></span>
        </ul>
    </div>
	
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Media Listing</h2>        
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
        <th>Sr. No.</th>
        <th>Media</th>
        <th>description</th>
        <th>Price</th>
        <th>Photos file</th>
        <th>Videos file</th>
    </tr>
    </thead>
    <tbody>
		<?php
	     $count = 1; $i =0;
		if(@$albums)
		{
			foreach($albums as $d)
			{
			?>
		<tr>
        <td><?php echo $count++;?></td>
        <td><?php echo $d['title'];?></td>
        <td><?php echo $d['description'];?></td>
        <td><?php echo $d['price'];?></td>
        <td><?php $key1=1;
			foreach($medias[$i] as $media){
				if(empty($media['thumbnail'])){  
 ?>
<?php /*?>        <a href="#" data-toggle="modal" data-target="#myModal-<?php echo $media['id']; ?>"><?php echo $media["media_file"]; ?> </a>	
<?php */?>
	   
	     <a class="btn btn-success btn-sm group1"  href="<?php echo base_url(); ?>uploads/media/<?php echo $media["media_file"]; ?>" data-id="<?php echo $media['id'];?>">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                <?php echo "Image".$key1;$key1++;?> 
            </a>
	   
<?php /*?>	
<div class="modal fade" id="myModal-<?php echo $media['id']; ?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $media["media_file"]; ?> </h4>
      </div>
      <div class="modal-body">
       <iframe src='<?php echo base_url(); ?>uploads/media/<?php echo $media["media_file"]; ?>' > </iframe>
      </div>
    </div>
  </div>
</div> <?php */?>

			  
			<?php }	
			}  			
	?></td>
      <td><?php $key2=1;
				foreach($medias[$i] as $media){
				if($media['thumbnail']){ 
	?>

	   <a class="btn btn-success btn-sm" href="javascript:void jQuery.colorbox({width:'70%',height:'70%',html:'
<video width=auto height=auto autoplay=autoplay loop=loop controls style=display:block;margin:auto;height:100%;>
       <source src=<?php echo base_url(); ?>uploads/media/<?php echo $media["media_file"]; ?>></video>'})"><?php echo "Video".$key2;$key2++; ?></a>	
	    <?php }
	  }
	    ?></td>
 	</tr>
    <?php
       ++$i;
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
</div><!--/fluid-row-->  

	<div style="display:none;">
			<div id='inline_content' style='padding:10px; background:#fff;'></div>
	</div>			
			
  <hr> 
    <footer class="row">     </footer>
</div><!--/.fluid-container-->                            
                            
