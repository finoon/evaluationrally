<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ajouter un vehicule</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<h2 class="col-12 text-center" style="color:white;">Ajouter un vehicule</h2>
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
							<p>Un vehicule peut-etre ajouter si quelqu'un souhaite participer.</p> 
						</div>
						<div class="form-group">
							<label for="">Votre role:</label>
							<p>Ajouter un vehicule avec le pilote et le copilote.</p> 
						</div>
					<form action="<?=site_url('admin/addvehicule')?>" method="post">
						<div class="form-group">
                            <label for="">Mode de rallye:</label>
                                <div class="form-select" id="default-select">
                                    <select id="rally" name="rally">
                                        <option value ="0" >choisir</option>
                                            <?php foreach($rally as $row) { ?>
                                        <option value="<?php echo $row->id?>"><?php echo $row->nomrally?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                        </div>
						<div class="form-group <?=form_error('jour') ? 'has-error':null?>">
							<label for="">Jour:</label>
							<input type="number" min="1" name="jour" value="<?=set_value('jour')?>" class="form-control">
							<span class="help-block"><?=form_error('designation')?></span> 
						</div>
						<div class="form-group">
                            <label for="">Pilote:</label>
                                <div class="form-select" id="default-select">
                                    <select id="participant" name="participant1">
                                        <option value ="0" >choisir</option>
                                            <?php foreach($participants as $row) { ?>
                                        <option value="<?php echo $row->id?>"><?php echo $row->username?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                        </div>
						<div class="form-group">
                            <label for="">Copilote:</label>
                                <div class="form-select" id="default-select">
                                    <select id="participant" name="participant2">
                                        <option value ="0" >choisir</option>
                                            <?php foreach($participants as $row) { ?>
                                        <option value="<?php echo $row->id?>"><?php echo $row->username?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                        </div>
						<div class="form-group <?=form_error('numero') ? 'has-error':null?>">
							<label for="">Numero du vehicule:</label>
							<input type="text" name="numero" value="<?=set_value('numero')?>" class="form-control">
							<span class="help-block"><?=form_error('numero')?></span> 
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
