<?php
//print_r($updateRec);
?>
<div class="container">
	
	<div class="profileArea">
		<form method="post" action="<?=Base_url()?>myaccount/myprofile/<?=$this->uri->segment(3)?>" enctype="multipart/form-data" id="add_places">
		
			<div class="row">
			
				<div class="col-md-6">
				 <label for="contact_person"> Contact Person Name</label>
					<input type="text" name="contact_person" placeholder="Contact Person Name" class="form-control" value="<?=@$updateRec['contact_person']?>">
				</div>
				<div class="col-md-6">
					 <label for="organisation"> Organisation Name</label>
					<input value="<?=@$updateRec['organisation']?>" class="form-control" name="organisation" placeholder="Organisation Name">
				
				</div>
			
			</div> <!--(end)row -->


			<div class="row">
			
				<div class="col-md-6">
				<label for="place_type_id"> Organisation Type</label>
					<select name="place_type_id" class="form-control">
						<option value="">--Choose Organisation Type --</option>
						<?php foreach($placetype as $ptype) { ?>
						<option <?php if(isset($updateRec) && $updateRec['place_type_id'] == $ptype['pID']) echo 'selected = "selected"'; ?> value="<?=$ptype['pID']?>"><?=$ptype['type_name']?></option>
						<?php } //endforeach ?>					
					</select>
				</div>
				<div class="col-md-6">
				</div>
			
			</div> <!--(end)row -->
			
						
		<div id="loc" class="geo-details">
		  <div class="row">
			<div class="col-md-6">
			 <label for="location"> Yours Or Near By Location</label>
				<input type="text" name="location" value="<?=@$updateRec['location']?>" class="form-control location" id="location">
			  </div>
			<?php /*?><div class="col-md-6">
			<label for="country"> Country</label>
			<input type="text" data-geo="country"  value="<?=@$updateRec['country']?>" class="form-control location"  id="setting_country" name="country" ></td>
			 
		   </div><?php */?>
		   	<div class="col-md-6">
					<label for="country"> Country</label>
					<select name="country" class="form-control" id="country">
						<option value="">--Choose Country --</option>						
						<?php foreach($country as $cnt) { ?>
						<option <?php if(isset($updateRec) && $updateRec['country'] == $cnt['id']) echo 'selected = "selected"'; ?>  value="<?=$cnt['id']?>"><?=$cnt['name']?></option>
						<?php } //endforeach ?>
					</select>
				</div>
				
			
		   
		   
		   </div> <!--(end)row -->
		    <div class="row">
			<div class="col-md-6">
			<label for="country_code"> Country Code</label>
			<input type="text" class="form-control location" data-geo="country_short" value="<?=@$updateRec['country_code']?>" id="setting_country_short" name="country_code" value="<?=@$updateRec['country_code']?>" ></td>
			 </div>

			 <div class="col-md-6">
						<label for="state"> State </label>
					<select name="state" class="form-control" id="state">
						<option value="">--Choose State --</option>			
						<?php	if(isset($state)){									
									foreach($state as $s){
						?>
						<option <?php if($updateRec['state'] == $s->id) echo 'selected = "selected"'; ?> value="<?=$s->id?>"><?=$s->name?></option>
						<?php
									} //endforeach									
								}//endif							
						?>
								
					</select>
				</div>
			<?php /*?><div class="col-md-6">
			<label for="state"> State</label>
				 <input type="text" data-geo="administrative_area_level_1"  class="form-control location" value="<?=@$updateRec['state']?>" id="setting_state" name="state"></td>
			 </div><?php */?>
		   </div> <!--(end)row -->
		   <div class="row">
			
			<div class="col-md-6">
			<label for="state_code"> State Code</label>
				 <input type="text" data-geo="administrative_area_level_1_short"  class="form-control location" value="<?=@$updateRec['state_code']?>" id="setting_state_short" name="state_code" ></td>
		    </div>
			
			
				
			<div class="col-md-6">
			<label for="city"> City</label>
				   <?php /*?><input type="text" data-geo="administrative_area_level_2" class="form-control" value="<?=@$updateRec['city']?>" id="setting_city" name="city" class="location"><?php */?>
				   <select name="city" class="form-control" id="city">
						<option value="">--Choose City --</option>						
						<?php
								if(isset($city)){									
									foreach($city as $c){
						?>
									<option <?php if($updateRec['city'] == $c->id) echo 'selected = "selected"'; ?> value="<?=$c->id?>"><?=$c->name?></option>
						<?php
									} //endforeach
								}//endif							
						?>
					</select>
			 </div>
			</div> <!--(end)row -->
	    <div class="row">
	 	<div class="col-md-6">
			<label for="latitude"> Latitude</label>
				   <input type="text" data-geo="lat" value="<?=@$updateRec['latitude']?>"   class="form-control" id="setting_latitude" name="latitude" class="location">
	   </div>
	     <div class="col-md-6">
			<label for="longitude"> Longitude</label>
				   <input type="text" data-geo="lng" value="<?=@$updateRec['longitude']?>" id="setting_longitude"  class="form-control" name="longitude" class="location">
	     </div>
  	 </div> <!--(end)row -->

						</div>
			
			<?php /* 
			<div class="row">
				<div class="col-md-6">
					<select name="countryID" class="form-control" id="country">
						<option value="">--Choose Country --</option>						
						<?php foreach($country as $cnt) { ?>
						<option <?php if(isset($updateRec) && $updateRec['countryID'] == $cnt['countryID']) echo 'selected = "selected"'; ?>  value="<?=$cnt['countryID']?>"><?=$cnt['countryName']?></option>
						<?php } //endforeach ?>
					</select>
				</div>
				<div class="col-md-6">
					<select name="StateID" class="form-control" id="state">
						<option value="">--Choose State --</option>			
						<?php
								if(isset($state)){
									
									foreach($state as $s){
						?>
									<option <?php if($updateRec['StateID'] == $s->StateID) echo 'selected = "selected"'; ?> value="<?=$s->StateID?>"><?=$s->StateName?></option>
						<?php
									} //endforeach
									
								}//endif
							
						?>
								
					</select>
				</div>
			</div> <!--(end)row-->
			<div class="row">
			
				<div class="col-md-6">
					<input class="form-control" name="lon"placeholder="Longitude" value="<?=@$updateRec['lon']?>" >
				</div>
				<div class="col-md-6">
					<input class="form-control" name="lat" placeholder="Latitude" value="<?=@$updateRec['lat']?>">
				</div>
				
			
			</div><!--(end)row--> <?php */?>
			<div class="row">	
				<?php /*?><div class="col-md-6">
					<select name="cityID" class="form-control" id="city">
						<option value="">--Choose City --</option>						
						<?php
								if(isset($city)){
									
									foreach($city as $c){
						?>
									<option <?php if($updateRec['cityID'] == $c->CityID) echo 'selected = "selected"'; ?> value="<?=$c->CityID?>"><?=$c->CityName?></option>
						<?php
									} //endforeach
									
								}//endif
							
						?>
					</select>
				</div><?php */?>
				<div class="col-md-6">
					<label for="rooms"> Rooms</label>
					<input class="form-control" name="rooms" placeholder="Rooms" type="text" value="<?=@$updateRec['rooms']?>" >
				</div>
				
						
				<div class="col-md-6">
				<label for="place_image"> Upload Image</label>
				<div class="place_image_div col-md-3">
				<?php if(!empty($updateRec['image']) && $updateRec['image'] !=''){?>
<img src="<?php echo base_url()?>uploads/<?php echo $updateRec['image'];?>" class='img-responsive' height="100px" width="100px" class="place_image"/>
	<i id="<?=$updateRec['id']?>" class="glyphicon glyphicon-trash place-action deleteImage"></i>
				<?php /*?>?<a href="<?php echo base_url()?>myaccount/deleteImage/<?php echo $updateRec['fm_ID'] ?>">Delete Image</a><?php */?>
				<?php } ?></div>
				   
					<input name="userfile" type="file">
					
				</div>
			
			
			</div><!--(end).row-->
			
			<div class="row">
				<div class="col-md-6">
			       <label for="Address"> Address</label>
					<textarea name="address" class="form-control" placeholder="address"><?=@$updateRec['address']?></textarea>
			
				</div>
				<div class="col-md-6">
				<label for="facilities"> Facilities</label>
					<textarea name="facilities" class="form-control" placeholder="Facilities"><?=@$updateRec['facilities']?></textarea>
				</div>
			
			
			</div><!--(end).row-->

			<div class="row">
				<div class="col-md-6">					
					<label for="mobile"> Mobile</label>
					<input class="form-control" name="mobile" placeholder="mobile" type="text" value="<?=@$updateRec['mobile']?>" >
				</div>
				<div class="col-md-6">
					<label for="landline"> Landline</label>
					<input class="form-control" name="landline" placeholder="landline" type="text" value="<?=@$updateRec['landline']?>" >					
				</div>
			
			
			</div><!--(end).row-->
			
			<div class="row">
				
				<div class="col-md-12">
				<label for="description"> Description</label>
				<textarea name="description" class="form-control" placeholder="Description"><?=@$updateRec['description']?></textarea>
				</div>
			
			</div>
			
			
			
  		<div class="row">			
			<div class="col-md-6">
				<a href="<?php echo base_url()?>myaccount/myprofile/<?php echo $this->uri->segment(3);?>" class="btn btn-block btn-primary" > Cancel </a>				
			</div>
			<div class="col-md-6">
				<input type="submit" class="btn btn-block btn-success" name="add_place" value="Submit">
			</div>
			</div><!--(end).row-->
		</form>
	
	</div><!--(end)profileArea-->
	

</div> <!--(end)container -->
