		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		<div style="padding: 10px" class="panel">
				<h3 style="text-align:center;"><?= date('l, d M Y') ?></h3>
		</div>
		<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-4 col-lg-4 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-blue"></em>
						<div class="large"><?= $pegawai['tot_pegawai'] ?></div>
						<div class="text-muted">Pegawai</div>
					</div>
				</div>
				</div>
				<div class="col-xs-6 col-md-4 col-lg-4 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-envelope color-orange"></em>
						<div class="large"><?= $sppd['tot_sppd'] ?></div>
							<div class="text-muted">SPPD</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-4 col-lg-4 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<div class="large"><?= $anggota['tot_anggota'] ?></div>
							<div class="text-muted">Anggota</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>