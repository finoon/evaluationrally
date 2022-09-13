<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Validation</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>
	<div class="container">
		<div class="row">
			<h2 class="col-12 text-center" style="color:white;">Confirmation de demande</h2>
		</div>
		<section class="content" >
        <div class="box-body table-responsive">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th style="color:white;">Utilisateur</th>
						<th style="color:white;">Montant (Ar)</th>
                        <th style="color:white;">Date de depot</th>
						<th style="color:white;">Actions</th>
					</tr>
				</thead>
				<tbody>
                    <?php foreach ($result as $row){?>
                    <tr>
                        <td><?php echo $row->name?></td>
                        <td><?php echo $row->somme?></td>
                        <td><?php echo $row->dateDepot?></td>
                        <td><a href="<?php echo base_url()?>admin/valider/<?php echo $row->depot?>/<?php echo $row->somme ?>/<?php echo $row->id?>"><button type="button" class="btn btn-success">Valider</button></a></td>
                    </tr>
                    <?php }?>
				</tbody>
			</table>
		</div>

    </section>
	</div>
			
    </div>
 
</body>
</html>