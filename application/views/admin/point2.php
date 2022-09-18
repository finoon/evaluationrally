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
<h3 style="color:white;">Liste de classement:</h3>
<h4 style="color:white;">Jour: <?php echo $day ?></h4>
<h4 style="color:white;">Categorie: <?=$this->Fonction_m->getcate($cate)?></h4>        
<h4 style="color:white;">Rally: <?=$this->Fonction_m->getral($ral)?></h4>
<h4 style="color:white;">Coefficient: <?=$this->Fonction_m->getcoef($coef)?></h4>
<h4 style="color:white;">Nombre de jour: <?=$this->Fonction_m->getnbjour($nbjour)?></h4>    
<div class="box-body table-responsive">
			<table class="table table-bordered ">
				<thead>
					<tr>
                        <th style="color:white;">Rang</th>                      
                        <th style="color:white;">Pilote</th>
                        <th style="color:white;">Copilote</th>
                        <th style="color:white;">Numero</th>
                        <th style="color:white;">Temps</th>
                        <th style="color:white;">Point</th>
                        <th style="color:white;">Action</th>
					</tr>
				</thead>
				<tbody>
                <?php if(count($modrally2)>0) { 
                    //$i=1;
                    foreach ($modrally2 as $row){?>
                    <tr>
                        <td style="color:white;"><?php //echo $i ?><?=$row['rang']?></td>
                        <?php //$i++ ?>
                        <td style="color:white;"><?=$this->Fonction_m->getPseudoParticipant($row['pilote'])?></td>
                        <td style="color:white;"><?=$this->Fonction_m->getPseudoParticipant($row['copilote'])?></td>
                        <td style="color:white;"><?=$row['numero']?></td>
                        <td style="color:white;"><?php if($row['temps']==null) { ?><?php echo 'a abandonne'?><?php }else{ ?><?=$row['temps']?><?php } ?></td>
                        <td style="color:white;"><?=$row['point']?></td>
                        <td><a href="<?=site_url('admin/ajoutpoint')?>/<?php echo $row['idjour']?>/<?php echo $row['rang']?>/<?php echo $row['idral']?>"><?php if($row['temps']!=null) { ?><button class="btn btn-warning">Attribuer</button><?php } ?>
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