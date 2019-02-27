<!DOCTYPE html>
<!-- saved from url=(0040)http://getbootstrap.com/examples/signin/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>Login Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/plugins/bootstrap/bootstrap.min.css') ?>" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?= base_url('assets/plugins/ie10-viewport-bug-workaround.css') ?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/css/signin.css') ?>" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/plugins/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?= base_url('assets/plugins/ie-emulation-modes-warning.js') ?>"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <form class="form-signin" method="post" action="<?= base_url('login')?>">
        <h2 class="form-signin-heading">Please sign in</h2>
        <?php 
            if ($this->session->flashdata('gagal')) {
                echo "<div class='alert alert-danger'><strong>".$this->session->flashdata('gagal')."</strong></div>";
            }
         ?>
        <label for="inputuser" class="sr-only">User Admin</label>
        <input type="text" name="username" id="inputuser" class="form-control" placeholder="User Admin" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
    
        <input class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="Sign-in">
      </form>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?= base_url('assets/plugins/ie10-viewport-bug-workaround.js') ?>"></script>
  

</body></html>