<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gestion des points</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<h2 class="col-12 text-center" style="color:white;">Choisir le mode de rally et le jour</h2>
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
							<p>Le mode de rallye et le jour servent a preciser les evenements.</p> 
						</div>
						<div class="form-group">
							<label for="">Votre role:</label>
							<p>Choisir le mode de rallye et le jour.</p> 
						</div>
					<form action="<?=site_url('admin/getrecherche')?>" method="post">
                        <div class="form-group">
                            <label for="">Categorie de vehicule:</label>
                                <div class="form-select" id="default-select">
                                    <select id="cat" name="cat">
                                        <option value ="0" >categorie</option>
                                            <?php foreach($cat as $row) { ?>
                                        <option value="<?php echo $row->id?>"><?php echo $row->category?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                        </div>
						<div class="form-group">
                            <label for="">Mode de rallye:</label>
                                <div class="form-select" id="default-select">
                                    <select id="mod" name="mod">
                                        <option value ="0" >choisir le mode</option>
                                            <?php foreach($modpointrally as $row) { ?>
                                        <option value="<?php echo $row->id?>"><?php echo $row->nomrally?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                        </div>
                        <label for="">Jour:</label>
                                <div class="form-select" id="default-select">
                                    <select id="jo" name="jo">
                                        <option value ="0" >Le jour</option>
                                            <?php for($i=1;$i<4;$i++) { ?>
                                        <option value="<?php echo $i ?>"><?php echo $i?></option>
                                            <?php } ?>
                                    </select>
                                </div>
                        </div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-flat">Rechercher</button>
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
