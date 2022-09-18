<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Point</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>
	<div class="container">
		<div class="row">
			<h2 class="col-12 text-center" style="color:white;">Ajouter des points</h2>
		</div>
		<section class="content" >

    <h3 style="color:white;">Liste des evenements</h3>
    <div class="box-body table-responsive">
			<table class="table table-bordered ">
				<thead>
					<tr>
                        <th style="color:white;">Rang</th>
						<th style="color:white;">Jour</th>
						<th style="color:white;">Numero</th>
                        <th style="color:white;">Mode de rallye</th>
                        <th style="color:white;">Categorie</th>
                        <th style="color:white;">Pilote</th>
                        <th style="color:white;">Copilote</th>
                        <th style="color:white;">Temps</th>
                        <th style="color:white;">Point</th>
                        <th style="color:white;">Action</th>
					</tr>
				</thead>
				<tbody>
                <?php if(count($listeClassement4RM)>0) { 
                    $i=1;
                    foreach ($listeClassement4RM as $row){?>
                    <tr>
                        <td style="color:white;"><?php echo $i ?></td>
                        <?php $i++ ?>
                        <td style="color:white;"><?=$row->jour?></td>
                        <td style="color:white;"><?=$row->numerovehicule?></td>
                        <td style="color:white;"><?=$row->nomrally?></td>
                        <td style="color:white;"><?=$row->category?></td>
                        <td style="color:white;"><?=$this->Fonction_m->getPseudoParticipant($row->pilote)?></td>
                        <td style="color:white;"><?=$this->Fonction_m->getPseudoParticipant($row->copilote)?></td>
                        <td style="color:white;"><?=$row->temps?></td>
                        <td style="color:white;"><?=$row->point?></td>
                        <td><a href=""><button class="btn btn-warning">Modifier</button>
                    </tr>
                <?php }}else{ echo '<span style="color:white;">Aucun classement pour le moment.</span>';} ?>    
				</tbody>
			</table>
		</div>

</section>
</div>
			
			</div>
</body>
</html>