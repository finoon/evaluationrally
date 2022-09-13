<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in</title>
	<link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">
</head>
<body>
    <div class="login-box">
        <div class="login-logo">
			<a>EZ<b>PARK</b>by Finoana</a>
		</div>	
            <div class="login-box-body">
                <p class="login-box-msg">Sign in</p>
                <form action="<?=site_url('admin/auth')?>" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="emailadmin" placeholder="Enter your mail" require autofocus>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="passwordadmin" placeholder="Enter your password" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8"></div>
                        <div class="col-xs-4">
                            <button class="btn btn-primary btn-block btn-flat" type="submit" name="login">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
    </div>

	<!---->
</body>
</html>
