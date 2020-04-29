<section class="content-header">
	<h1>Dashboard
		<small>Dashboard</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-aqua"><i class="fa fa-sticky-note"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Pengaduan</span>
					<span class="info-box-number"><?= $this->fungsi->count_pengaduan() ?></span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-red"><i class="fa fa-university"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Instansi Terkait</span>
					<span class="info-box-number"><?= $this->fungsi->count_instansi() ?></span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->

		<!-- fix for small devices only -->
		<div class="clearfix visible-sm-block"></div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-green"><i class="fa fa-server"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">Kategori</span>
					<span class="info-box-number"><?= $this->fungsi->count_kategori() ?></span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

				<div class="info-box-content">
					<span class="info-box-text">User</span>
					<span class="info-box-number"><?= $this->fungsi->count_user() ?></span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

</section>