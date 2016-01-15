<?php	
//	echo '<pre>'; print_r($places); echo '</pre>';
?>
	<div class="place-list">
	<a class="btn btn-primary" href="<?=Base_url()?>myaccount/myprofile/addplace">Add Place</a>
	</br>
	</br>
		<div class="row">
<?php 			foreach($places as $pls){ ?>
				<div class="col-md-4">				
					<div class="place-details">
						<div class="col-xs-10">
							<p><?=$pls->organisation?></p>
						</div> <!--(end)pull-left -->
							
						<div class="col-xs-2">
							<a href="<?=Base_url()?>myaccount/updatePlace/<?=$pls->id?>"><i id="<?=$pls->id?>" class="glyphicon glyphicon-edit place-action edit"></i></a>
							<i id="<?=$pls->id?>" class="glyphicon glyphicon-trash place-action delete"></i>
						</div>
					</div> <!--(end)place-details-->
				</div> <!--(end)place-details -->
<?php }	 // endforeach ?>		
		</div><!--(end)row -->
	</div> <!--(end)place-list -->
