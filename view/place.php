<?php
//		echo '<pre>'; print_r($places); echo '</pre>';
?>
<div class="container">
<?php
    if(!empty($places)){
		$p = $places;
		//foreach($places as $p){
?>

	<div class="allplaces col-md-8">
		
		
		<div id="parentHorizontalTab">
            <ul class="resp-tabs-list hor_1">
                <li>Home</li>
                <li>Address</li>
                <li>Facilities</li>
                <li>Location</li>
            </ul>
            <div class="resp-tabs-container hor_1">
                <div>
                    <div class="row">
					  <div class="col-xs-6 col-md-4"><strong>Contact Person:</strong></div>
					  <div class="col-xs-12 col-md-8"><?=$p['contact_person']?></div>
					</div>
                    
                    <div class="row">
					  <div class="col-xs-6 col-md-4"><strong>Organisation Name:</strong></div>
					  <div class="col-xs-12 col-md-8"><?=$p['organisation']?></div>
					</div>
                </div>
				
				
                <div>
                   
                   <div class="row">
					  <div class="col-xs-6 col-md-4"><strong>Email Id:</strong></div>
					 <div class="col-xs-12 col-md-8"><?=$p['email']?></div>
					</div>
                    
					<div class="row">
					  <div class="col-xs-6 col-md-4"><strong>Phone No:</strong></div>
					  <div class="col-xs-12 col-md-8"><?=$p['mobile']?></div>
					</div>
	
					<div class="row">
					  <div class="col-xs-6 col-md-4"><strong>Landline:</strong></div>
					  <div class="col-xs-12 col-md-8"><?=$p['landline']?></div>
					</div>

					<div class="row">
					  <div class="col-xs-6 col-md-4"><strong>Address:</strong></div>
					  <div class="col-xs-12 col-md-8"><?=$p['address']?></div>
					</div>
					<div class="row">
					  <div class="col-xs-6 col-md-4"><strong>Description:</strong></div>
					  <div class="col-xs-12 col-md-8"><?=$p['description']?></div>
					</div>
	
					
                </div>
				
                
				<div>
						
					<div class="row">
					  <div class="col-xs-6 col-md-4"><strong>Facilities :</strong></div>
					  <div class="col-xs-12 col-md-8"><?=$p['facilities']?></div>
					</div>
	
					<div class="row">
					  <div class="col-xs-6 col-md-4"><strong>Number of room :</strong></div>
					  <div class="col-xs-12 col-md-8"><?=$p['rooms']?></div>
					</div>
                </div>
				
				
				
				<div>
					<div class="row">
					  <div class="col-xs-6 col-md-4"><strong>City:</strong></div>
					  <div class="col-xs-12 col-md-8"><?=$p['city_name']?></div>
					</div>
					
					<div class="row">
					  <div class="col-xs-6 col-md-4"><strong>State:</strong></div>
					  <div class="col-xs-12 col-md-8"><?=$p['state_name']?></div>
					</div>
	
					<div class="row">
					  <div class="col-xs-6 col-md-4"><strong>Country:</strong></div>
					  <div class="col-xs-12 col-md-8"><?=$p['country_name']?></div>
					</div>
                </div>
				
            </div>
        </div>
		
		
	<?php /*	<h4><?=$p->placename?></h4>
		<p><heading>Contact Person : </heading><?=$p->contact_person?></p>
		<p><heading>Organisation : </heading><?=$p->organisation?></p>
		<p><heading>Phone : </heading><?=$p->phone?></p>
		<p><heading>Rooms Available: </heading><?=$p->rooms?></p>
		<p><heading>Facilities : </heading><?=$p->facilities?></p>
		<p><heading>Address : </heading><?=$p->address?></p>
		<p><heading>Description : </heading><?=$p->description?></p>
		<p><heading>City : </heading><?=$p->CityName?></p>
		<p><heading>State : </heading><?=$p->StateName?></p>
		<p><heading>Country : </heading><?=$p->countryName?></p>
		*/?>
	</div>
	<div class="col-md-4">	  
	  <?php if(!empty($p['image'])){ ?>
	  <a href="<?=Base_url()?>uploads/<?=$p['image']?>" class="user_image" >
		<img class="img-thumbnail" src="<?=Base_url()?>uploads/<?=$p['image']?>" class="img-responsive">
		</a>
	  <?php } else{?>
	   <a href="<?=Base_url()?>assets/images/no-image.jpg" class="user_image" >
	  <img class="user_image img-thumbnail" src="<?=Base_url()?>assets/images/no-image.jpg" class="img-responsive">
	  </a>
	  <?php } ?>
	  
	</div>
<?php //} //endforeach 
} else{
	echo $noFound;
}?>
<hr class="clearfix">
</div><!--(end)container-->
<hr class="clearfix">









		