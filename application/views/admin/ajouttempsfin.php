<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ajouter un temps de fin</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<h2 class="col-12 text-center" style="color:white;">Ajouter un temps de fin</h2>
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
							<p>Un vehicule peut ne pas avoir de temps en cas d'abandon.</p> 
						</div>
						<div class="form-group">
							<label for="">Votre role:</label>
							<p>Ajouter un temps de fin a chaque jour pour un rally .</p> 
						</div>
					<form action="<?=site_url('admin/addtempsfin')?>" method="post">
						<div class="form-group">
                            <label for="">Equipe:</label>
                                <div class="form-select" id="default-select">
                                    <select id="nummod" name="nummod">
                                        <option value ="0" >Numero et mode de rallye</option>
                                            <?php foreach($pointetrally as $row) { ?>
                                        <option value="<?php echo $row->id?>">Numero:<?php echo $row->numerovehicule?> Et Rallye:<?php echo $row->nomrally?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group <?=form_error('temps') ? 'has-error':null?>">
							<label for="">Temps de fin:</label>
							<input type="time" step="0.001" name="temps" value="<?=set_value('temps')?>" class="form-control">
							<span class="help-block"><?=form_error('temps')?></span> 
						</div>
                        <div class="form-group <?=form_error('jour') ? 'has-error':null?>">
							<label for="">Jour:</label>
							<input type="number" min="1" name="jour" value="<?=set_value('jour')?>" class="form-control">
							<span class="help-block"><?=form_error('jour')?></span> 
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
