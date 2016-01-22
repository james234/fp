<div class="container">
	<div class="searchPlace_Container">
		<div class="row">			
		<form method="post" action="<?=Base_url()?>home/listPlaces">
		<input type="hidden" name="fid" value="<?=isset($type) ? $type : ''?>">
		
			<div class="row">
					<select name="country" class="form-control" id="country">
						<option value="">--Please Select Country --</option>						
						<option value="101">India</option>						
						</select>
			</div> <!--(end)row-->		
			<div class="row">
					<select name="state" class="form-control" id="state">					
						<option value="">--Choose State --</option>			
								
					</select>
			</div> <!--(end)row-->
			<div class="row">	
					<select name="city" class="form-control" id="city">					
						<option value="">--Choose City --</option>						
					</select>
			
			</div>
			
			<div class="row">
				<input type="submit" class="btn btn-block btn-primary" name="add_place" value="Submit">
			</div> <!--(end).row -->
		</form>
	
	<?php //echo '<pre>'; print_r($detail); echo '</pre>';?>
	
<!--	<div class="detailed_place">
			
		<div class="row">
			<div class="col-md-3 hding">Address</div>
			<div class="col-md-8 detail_cntent"><?=$detail['address']?></div>
		</div>

		<div class="row">
			<div class="col-md-3 hding">City</div>
			<div class="col-md-8 detail_cntent"><?=$detail['CityName']?></div>
		</div>

		<div class="row">
			<div class="col-md-3 hding">State</div>
			<div class="col-md-8 detail_cntent"><?=$detail['StateName']?></div>
		</div>

		<div class="row">
			<div class="col-md-3 hding">Country</div>
			<div class="col-md-8 detail_cntent"><?=$detail['countryName']?></div>
		</div>
			
		<div class="row">
			<div class="col-md-3 hding">About: </div>
			<div class="col-md-8 detail_cntent"><?=$detail['description']?></div>
		</div>
		
	</div> <!--(end).detailed_place -->
</div> <!--row>-->
</div> <!--row>-->

	<div class="detailed_place">
		<?php  if(!empty($places)){
			foreach($places as $p){?>	
		<div class="row">
			<div class="col-md-2 hding">ad space</div>	
				<div class="col-md-8 hding">					
					  <div class="col-xs-12 col-md-8">
						<p class="text-left"><strong>Organisation Name: </strong></p><p class="text-left"><?=$p->organisation?></p>
						<p class="text-left"><strong> Phone:</strong><?=$p->mobile?></p>
						<p class="text-left"><strong> Address:</strong><?=$p->address?></p>
						<p class="text-left"> <a href="<?php echo base_url()?>home/detail/<?php echo $p->id;?>">Read More..</a></p>
					</div>	
					  <div class="col-xs-12 col-md-4">
					 <?php if(!empty($p->image)){ ?>
						<img src="<?=Base_url()?>uploads/<?=$p->image?>" class="img-responsive">
					  <?php } else{?>
					  <img src="<?=Base_url()?>assets/images/no-image.jpg" class="img-responsive">
					  <?php } ?></div>					
				</div>								
			<div class="col-md-2 hding">ad space</div>			
		</div><!--row -->
		<?php  }
			}
			else{ ?>
			<div class="row">
			<div class="col-md-2 hding">ad space</div>	
				<div class="col-md-8 text-center">
					<h3>No Result Found</h3>
			</div>								
			<div class="col-md-2 hding">ad space</div>			
		</div><!--row -->	
		<?php  }?>
	</div> <!--detailed_place -->	
	
</div><!--(end).container -->
