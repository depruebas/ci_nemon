<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Bare - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="/assets/dist450/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="/css/styles.css" rel="stylesheet">

</head>

<body>


  <?php require_once  dirname( dirname( dirname(__FILE__))) . "/views/includes/navbar.php"; ?>

  <?php echo $content_for_layout; ?>

  <?php require_once  dirname( dirname( dirname(__FILE__))) . "/views/includes/footer.php"; ?>


  <!-- Bootstrap core JavaScript -->
  <!-- jQuery Version 3.4.1 -->
  <script src="/js/jquery.slim.min.js"></script>
  <script src="/assets/dist450/js/bootstrap.bundle.min.js"></script>

</body>

</html>