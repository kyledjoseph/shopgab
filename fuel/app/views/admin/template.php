<!DOCTYPE html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<title><?= isset($title) ? $title : 'admin' ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<?= Asset::css('bootstrap.css') ?>
	<style type="text/css">
	  body {
		padding-top: 20px;
		padding-bottom: 60px;
	  }

	  /* Custom container */
	  .container {
		margin: 0 auto;
		max-width: 1000px;
	  }
	  .container > hr {
		margin: 60px 0;
	  }

	  /* Main marketing message and sign up button */
	  .jumbotron {
		margin: 80px 0;
		text-align: center;
	  }
	  .jumbotron h1 {
		font-size: 100px;
		line-height: 1;
	  }
	  .jumbotron .lead {
		font-size: 24px;
		line-height: 1.25;
	  }
	  .jumbotron .btn {
		font-size: 21px;
		padding: 14px 24px;
	  }

	  /* Supporting marketing content */
	  .marketing {
		margin: 60px 0;
	  }
	  .marketing p + h4 {
		margin-top: 28px;
	  }


	  /* Customize the navbar links to be fill the entire space of the .navbar */
	  .navbar .navbar-inner {
		padding: 0;
	  }
	  .navbar .nav {
		margin: 0;
		display: table;
		width: 100%;
	  }
	  .navbar .nav li {
		display: table-cell;
		width: 1%;
		float: none;
	  }
	  .navbar .nav li a {
		font-weight: bold;
		text-align: center;
		border-left: 1px solid rgba(255,255,255,.75);
		border-right: 1px solid rgba(0,0,0,.1);
	  }
	  .navbar .nav li:first-child a {
		border-left: 0;
		border-radius: 3px 0 0 3px;
	  }
	  .navbar .nav li:last-child a {
		border-right: 0;
		border-radius: 0 3px 3px 0;
	  }
	</style>

	<?= Asset::css('bootstrap-responsive.css') ?>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="../assets/js/html5shiv.js"></script>
	<![endif]-->

	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
	<link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>

	<div class="container">

		<div class="masthead">
			<h3 class="muted">ItemNation Admin</h3>
			<div class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<ul class="nav">
							<li class="<?= (isset($active_nav) and $active_nav == 'dashboard') ? 'active' : null ?>">
								<?= Html::anchor('admin', 'Dashboard') ?>
							</li>
							<li class="<?= (isset($active_nav) and $active_nav == 'products') ? 'active' : null ?>">
								<?= Html::anchor('admin/products', 'Products') ?>
							</li>
							<li class="<?= (isset($active_nav) and $active_nav == 'accounts') ? 'active' : null ?>">
								<?= Html::anchor('admin/accounts', 'Accounts') ?>
							</li>
							<li class="<?= (isset($active_nav) and $active_nav == '') ? 'active' : null ?>"><a href="#">Extra</a></li>
							<li class="<?= (isset($active_nav) and $active_nav == '') ? 'active' : null ?>"><a href="#">Extra</a></li>
							<li class="<?= (isset($active_nav) and $active_nav == 'servers') ? 'active' : null ?>">
								<?= Html::anchor('admin/servers', 'Servers') ?>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<?php if (isset($notice)): ?>

		<div class="alert alert-<?= $notice->type ?>">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?= $notice->message ?>
		</div>

		<?php endif; ?>

		<div class="row-fluid">
			<div class="span12">

<?= $body ?>

			</div>
		</div>

		<hr>

		<div class="footer">
			<p>&copy; Company 2013</p>
		</div>

	</div> <!-- /container -->

	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<?= Asset::js('bootstrap/bootstrap.js') ?>
	<?= Asset::js('bootstrap/bootstrap-alert.js') ?>

  </body>
</html>