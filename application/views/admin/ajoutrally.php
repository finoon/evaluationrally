<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ajouter un rallye</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<h2 class="col-12 text-center" style="color:white;">Ajouter un rallye</h2>
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
							<p>Un evenement peut-etre ajouter s'il y en a.</p> 
						</div>
						<div class="form-group">
							<label for="">Votre role:</label>
							<p>Ajouter un rallye avec le nom et le coefficient.</p> 
						</div>
					<form action="<?=site_url('admin/addrally')?>" method="post">
                        <div class="form-group <?=form_error('modrallye') ? 'has-error':null?>">
							<label for="">Mode de rallye:</label>
							<input type="text" name="modrally" value="<?=set_value('modrally')?>" class="form-control">
							<span class="help-block"><?=form_error('modrallye')?></span> 
						</div>
						<div class="form-group <?=form_error('coefficient') ? 'has-error':null?>">
							<label for="">Coefficient:</label>
							<input type="number" name="coefficient" value="<?=set_value('coefficient')?>" class="form-control">
							<span class="help-block"><?=form_error('coefficient')?></span> 
						</div>
                        <div class="form-group <?=form_error('journ') ? 'has-error':null?>">
							<label for="">Nombres de jours:</label>
							<input type="number" name="journ" value="<?=set_value('journ')?>" class="form-control">
							<span class="help-block"><?=form_error('journ')?></span> 
						</div>
                        <div class="form-group">
                            <label for="">Categorie:</label>
                                <div class="form-select" id="default-select">
                                    <select id="idcategory" name="idcategory">
                                        <option value ="0" >choisir</option>
                                            <?php foreach($category as $row) { ?>
                                        <option value="<?php echo $row->id?>"><?php echo $row->category?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                        </div>
						<div class="form-group <?=form_error('ladate') ? 'has-error':null?>">
							<label for="">Date:</label>
							<input type="date" name="ladate" value="<?=set_value('ladate')?>" class="form-control">
							<span class="help-block"><?=form_error('ladate')?></span> 
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-flat">Ajouter</button>
						</div>
					</form>
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
