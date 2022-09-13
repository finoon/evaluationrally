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
			<h2 class="col-12 text-center" style="color:white;">Ajouter un tarif</h2>
		</div>
		<section class="content" >

	<div class="box">
		<div class="box-header">
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-3 col-md-offset-2">
					<!--<?php //echo validation_errors() ;?>-->
					<form action="<?=site_url('admin/addTarif')?>" method="post">
                        <div class="form-group">
							<label for="">Duree:</label>
							<input type="time" min="200" name="duree" value="" class="form-control" placeholder="duree">
						</div>
						<div class="form-group">
							<label for="">Montant du tarif (Ar):</label>
							<input type="number" min="200" name="montant" value="" class="form-control" placeholder="montant">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-flat">Ajouter</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
    <h3 style="color:white;">Liste des tarifs existants</h3>
    <div class="box-body table-responsive">
			<table class="table table-bordered ">
				<thead>
					<tr>
						<th style="color:white;">ID</th>
						<th style="color:white;">Duree</th>
                        <th style="color:white;">Montant</th>
					</tr>
				</thead>
				<tbody>
                <?php if(count($listeTarifs)>0) { foreach ($listeTarifs as $row){?>
                    <tr>
                        <td style="color:white;"><?=$row->id?></td>
                        <td style="color:white;"><?=$row->duree?> min</td>
                        <td style="color:white;"><?=$row->prix?> Ar</td>
                    </tr>
                <?php }}else{ echo '<span style="color:white;">Aucun tarif pour le moment.</span>';} ?>    
				</tbody>
			</table>
		</div>

</section>
</div>
			
			</div>
</body>
</html>