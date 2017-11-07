<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard, Übersicht</title>

    <!-- Bootstrap core CSS -->
    <link href="/../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/../css/shop-item.css" rel="stylesheet">

    <!-- Markdown -->
    <link rel="stylesheet" href="/../editor/editor.css">
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        &nbsp;&nbsp;&nbsp;
    </div>
</nav>

<!-- Page Content -->
<div class="container">
    {% include page %}
</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="/../jquery/jquery.min.js"></script>
<script src="/../popper/popper.min.js"></script>
<script src="/../bootstrap/js/bootstrap.js"></script>

<script src="/../editor/editor.js"></script>
<script src="/../editor/marked.js"></script>

<!-- https://github.com/lepture/editor -->
<script type="text/javascript">
    $(document).ready(function () {
        var editor = new Editor();
        editor.render();
    });
</script>

</body>

</html>