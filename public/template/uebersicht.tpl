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

<div class="row">
    <div class="col-md-12 admin-row text-center">
        &nbsp;
    </div>
</div>

<!-- Page Content -->
<div class="container">
    {% include page %}
</div>
<!-- /.container -->

<!-- Footer -->
<div class="row">
    <div class="col-md-12 admin-row text-center">
        Programmierung: <a href="http://www.stephankrauss.de" target="_blank" style="color: white">Stephan Krauß</a>
    </div>
</div>

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