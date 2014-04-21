<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Phalcon Shop</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $this->url->get('css/bootstrap.css') ?>" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="<?php echo $this->url->get('css/shop-homepage.css') ?>" rel="stylesheet">

</head>
	<body>
		<div class="container">
			<?php echo $this->getContent(); ?>
		</div>
    <!-- /.container -->

    <!-- JavaScript -->
    <script src="<?php echo $this->url->get('js/jquery-1.10.2.js') ?>"></script>
    <script src="<?php echo $this->url->get('js/bootstrap.js') ?>"></script>
    <script type="text/javascript">
    $(document).ready(function(){ 
        $('[data-toggle="popover"]').popover({
            trigger: 'hover',
                'placement': 'top'
        });
      });
</script>
</body>

</html>