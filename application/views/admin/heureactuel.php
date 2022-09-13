<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Parking</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>
	<div class="container">
		<div class="row">
			<h2 class="col-12 text-center" style="color:white;">Modifiez l'heure actuel!</h2>
		</div>
		<section class="content" >

	<div class="box">
		<div class="box-header">
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-3 col-md-offset-2">
					<!--<?php //echo validation_errors() ;?>-->
					<div class="form-group">
							<label for="">Description:</label>
							<p>Vous pouvez modifiez l'heure actuel</p> 
						</div>
						<div class="form-group">
							<label for="">Votre role:</label>
							<p>Modifiez l'heure une place.</p> 
						</div>
					<form action="<?php echo base_url()?>admin/changerHeure" method="post">
						<div class="form-group">
                            <label for=""></label>
                            <input type="datetime-local" name="heureActuelle"  step = 1 value="<?php echo $heureActuelle?>">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-warning btn-flat">Modifier</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</section>
	</div>
			
    </div>
 
</body>
</html>
