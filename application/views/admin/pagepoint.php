<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gestion de point</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<h2 class="col-12 text-center" style="color:white;">Choisir une categorie et un mode de rallye</h2>
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
							<p>On peut ajouter un point pour les vehicules a chaque course.</p> 
						</div>
						<div class="form-group">
							<label for="">Votre role:</label>
							<p>Ajouter un point a chaque jour pour un rally .</p> 
						</div>
                        <div class="form-group">
							<a href="<?=site_url('admin/gestPoint4RM')?>"><button type="submit" class="btn btn-success btn-flat">Point final par rallye</button></a>
						</div>    
						<div class="form-group">
                        <a href="<?=site_url('admin/gestPoint2RM')?>"><button type="submit" class="btn btn-success btn-flat">Point par rallye et par jour</button></a>
						</div>
				</div>
			</div>
		</div>
	</div>

</section>
<script>
            $(document).ready(function(){  
	
	        $("#username").change(function() {    
		    var ids = $(this).find(":selected").val();   
		    $.ajax({
                method: "GET",
                url: '<?php echo base_url()?>user/getData/'+ids,
                dataType: "json",
                
                success: function(response) {
                if(response) {				
                        $("#nom").text(response.pseudo);
                    }
                } 
		    });
 	        }) 
            });
        </script>
	</div>
			
    </div>
 
</body>
</html>
