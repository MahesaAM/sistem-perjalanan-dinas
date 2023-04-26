<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title; ?></title>
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/datepicker3.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/styles.css') ?>" rel="stylesheet">
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form action="<?= base_url('Auth') ?>" method="post">
						<fieldset>
							<div class="form-group">
                                <input class="form-control" value="<?= set_value('username') ?>" placeholder="Username" name="username" type="text" autofocus="">
                                <?= form_error('username', '<small class="text-danger pl-3">','</small>'); ?>
							</div>
							<div class="form-group">
                                <input id="p" class="form-control" value="<?= set_value('password') ?>" placeholder="Password" name="password" type="password">
                                <?= form_error('password', '<small class="text-danger pl-3">','</small>'); ?>
								<input type="checkbox" onchange="seePassword(this);"><span id="check"> Lihat password</span>
							</div>
							<button type="submit" class="btn btn-primary">Login</button></fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	

<script src="<?= base_url('assets/js/jquery-1.11.1.min.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>
<script>
            function seePassword(x) {
                var checkbox = x.checked;
                if (checkbox) {
                    document.getElementById("p").type="text";
                    document.getElementById("check").textContent=" sembunyikan";
                }else{
                    document.getElementById("p").type="password";
                    document.getElementById("check").textContent=" lihat";

                }
            }
</script>