<?php
//print_r($updateRec);
?>
<div class="container">
	
	<div class="profileArea">
		<form method="post" action="<?=Base_url()?>myaccount/myprofile/<?=$this->uri->segment(3)?>" enctype="multipart/form-data" id="add_places">
		
			<div class="row">
			
				<div class="col-md-6">
					<input type="text" name="contact_person" placeholder="Contact Person Name" class="form-control" value="<?=@$updateRec['contact_person']?>">
				</div>
				<div class="col-md-6">
				
					<input value="<?=@$updateRec['organisation']?>" class="form-control" name="organisation" placeholder="Organisation Name">
				
				</div>
			
			</div> <!--(end)row -->


			<div class="row">
			
				<div class="col-md-6">
					<select name="place_typeID" class="form-control">
						<option value="">--Choose Organisation Type --</option>
						<?php foreach($placetype as $ptype) { ?>
						<option <?php if(isset($updateRec) && $updateRec['place_typeID'] == $ptype['pID']) echo 'selected = "selected"'; ?> value="<?=$ptype['pID']?>"><?=$ptype['type_name']?></option>
						<?php } //endforeach ?>					
					</select>
				</div>
				<div class="col-md-6">
				</div>
			
			</div> <!--(end)row -->
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
				
			
			</div><!--(end)row-->
			<div class="row">	
				<div class="col-md-6">
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
				</div>
				<div class="col-md-6">
					<textarea name="address" class="form-control" placeholder="Enter Place Address"><?=@$updateRec['address']?></textarea>
				</div>
				
			</div><!--(end)row-->
			
			<div class="row">				
				<div class="col-md-12">
				<div class="place_image_div">
				<?php if(!empty($updateRec['picture']) && $updateRec['picture'] !=''){?>
<img src="<?php echo base_url()?>uploads/<?php echo $updateRec['picture'];?>" class='img-responsive' height="100px" width="100px" class="place_image"/>
	<i id="<?=$updateRec['fm_ID']?>" class="glyphicon glyphicon-trash place-action deleteImage"></i>
				<?php /*?>?<a href="<?php echo base_url()?>myaccount/deleteImage/<?php echo $updateRec['fm_ID'] ?>">Delete Image</a><?php */?>
				<?php } ?></div>
					<input name="userfile" type="file">
					
				</div>
			
			
			</div><!--(end).row-->
			
			<div class="row">
				<div class="col-md-6">
					<input class="form-control" name="rooms_available" placeholder="Rooms Available" type="text" value="<?=@$updateRec['rooms']?>" >
				</div>
				<div class="col-md-6">
					<textarea name="facilities" class="form-control" placeholder="Facilities"><?=@$updateRec['facilities']?></textarea>
				</div>
			
			
			</div><!--(end).row-->

			<div class="row">
				<div class="col-md-6">
					<input class="form-control" name="mobile" placeholder="mobile" type="text" value="<?=@$updateRec['mobile']?>" >
				</div>
				<div class="col-md-6">
					<input class="form-control" name="landline" placeholder="landline" type="text" value="<?=@$updateRec['landline']?>" >					
				</div>
			
			
			</div><!--(end).row-->
			
			<div class="row">
				
				<div class="col-md-12">
				<textarea name="description" class="form-control" placeholder="Give Some Description"><?=@$updateRec['description']?></textarea>
				</div>
			
			</div>
			
			<input type="submit" class="btn btn-block btn-primary" name="add_place" value="Submit">
		
		</form>
	
	</div><!--(end)profileArea-->
	

</div> <!--(end)container -->
 
