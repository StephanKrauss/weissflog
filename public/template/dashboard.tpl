<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/shop-item.css" rel="stylesheet">

    <!-- Markdown -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/editor/0.1.0/editor.css">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Artikel anlegen</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <div class="col-lg-3">
            <div class="list-group">
                <a href="#" class="list-group-item active">Artikel anlegen</a>
                <a href="#" class="list-group-item">Artikel Übersicht</a>
            </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <div class="card mt-4">
                <form>
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="input01">Überschrift</label>
                      <div class="col-md-6">
                        <input placeholder="Überschrift" class="form-control input-md" type="text">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-4 control-label" for="input01">Zusatzinformation</label>
                      <div class="col-md-6">
                        <input placeholder="Zusatzinformation" class="form-control input-md" type="text">
                      </div>
                    </div>

                    <div class="form-group">
                        <label for="comment" class="col-md-4 control-label">Text</label>
                        <textarea class="form-control" rows="5" name="description"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="btn btn-default">
                            <button class="btn btn-warning" type="submit">Bild auswählen</button> <input type="file" hidden>
                        </label>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6">
                            <button class="btn btn-success" type="submit">Artikel eintragen</button>
                        </div>
                    </div>

                </form>

            </div>
            <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

    </div>

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
<script src="../jquery/jquery.min.js"></script>
<script src="../popper/popper.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>

<script src="//cdn.jsdelivr.net/editor/0.1.0/editor.js"></script>
<script src="//cdn.jsdelivr.net/editor/0.1.0/marked.js"></script>

<!-- https://github.com/lepture/editor -->
<script type="text/javascript">
    $(document).ready(function () {
        var editor = new Editor();
        editor.render();
    });
</script>

</body>

</html>
