<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Inscription</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
	<div class="container">
		<div class="row">
			<h2 class="col-12 text-center">Inscription</h2>
		</div>
		<section class="content" >

	<div class="box">
		<div class="box-header">
			<div class="pull-right">
				<a href="<?=site_url('user/recherche')?>" class="btn btn-warning btn-flat">
					<i class="fa fa-undo"></i>Back
				</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-3 col-md-offset-2">
					<!--<?php //echo validation_errors() ;?>-->
					<form action="<?=site_url('user/add')?>" method="post">
						<div class="form-group <?=form_error('nom') ? 'has-error':null?>">
							<label for="">Nom:</label>
							<input type="text" name="nom" value="<?=set_value('nom')?>" class="form-control">
							<span class="help-block"><?=form_error('email')?></span> 
						</div>
						<div class="form-group <?=form_error('email') ? 'has-error':null?>">
							<label for="">Email:</label>
							<input type="email" name="email" value="<?=set_value('email')?>" class="form-control">
							<span><?=form_error('nom')?></span> 
						</div>
						<div class="form-group <?=form_error('mdp') ? 'has-error':null?>">
							<label for="">Mot de passe:</label>
							<input type="password" name="mdp" min="4" value="<?=set_value('mdp')?>" class="form-control">
							<span><?=form_error('mdp')?></span>  
						</div>
						<div class="form-group <?=form_error('mdpconf') ? 'has-error':null?>">
							<label for="">Confirmer votre mot de passe:</label>
							<input type="password" name="mdpconf" min="4" value="<?=set_value('mdpconf')?>" class="form-control">
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
	</div>
</body>
</html>
