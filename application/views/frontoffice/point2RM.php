<div class="container">
		<div class="row">
			<h2 class="col-12 text-center" style="color:white;">Ajouter des points</h2>
		</div>
		<section class="content" >
    <h3 style="color:white;">Liste de classement du jour</h3></br>

    <h3 style="text-decoration:underline">Liste de classement:</h3>
<h4>Jour: <?php echo $day ?></h4>
<h4>Categorie: <?=$this->Fonction_m->getcate($cate)?></h4>        
<h4>Rally: <?=$this->Fonction_m->getral($ral)?></h4>   
    <div class="box-body table-responsive">
			<table class="table table-bordered ">
				<thead>
					<tr>
                        <th style="color:white;">Rang</th>
                        <th style="color:white;">Pilote</th>
                        <th style="color:white;">Copilote</th>
                        <th style="color:white;">Numero</th>
                        <th style="color:white;">Temps</th>
                        <th style="color:white;">coefficient</th>
                        <th style="color:white;">Point</th>
					</tr>
				</thead>
				<tbody>
                <?php if(count($modrally)>0) { 
                    $i=1;
                    foreach ($modrally as $row){?>
                    <tr>
                        <!--<td><?php //echo $i ?></td>
                        <?php //$i++ ?>-->
                        <td><?=$row['rang']?></td>
                        <td><?=$this->Fonction_m->getPseudoParticipant($row['pilote'])?></td>
                        <td><?=$this->Fonction_m->getPseudoParticipant($row['copilote'])?></td>
                        <td><?=$row['numero']?></td>
                        <td><?php if($row['temps']==null) { ?><?php echo 'a abandonne'?><?php }else{ ?><?=$row['temps']?><?php } ?></td>
                        <td><?=$row['coefficientrally']?></td>
                        <td><?=$row['point']?></td>
                    </tr>
                <?php }}else{ echo '<span style="color:white;">Aucun classement pour le moment.</span>';} ?>    
				</tbody>
			</table>
		</div>
        <script>
					// When the user clicks on div, open the popup
					function myFunction<?=$i?>() {
					var popup = document.getElementById("myPopup<?=$i?>");
					popup.classList.toggle("show");
					}
				</script>

                            
            </div>
        </div>
    </div>
 </div>