<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>meine Firma</title>

    <!-- Bootstrap core CSS -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/shop-item.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Firmenlogo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{uebersicht}}">
                    <a class="nav-link" href="/">Übersicht</a>
                </li>
                <li class="nav-item {{impressum}}">
                    <a class="nav-link" href="/seite/impressum">Impressum</a>
                </li>
                <li class="nav-item {{kontakt}}">
                    <a class="nav-link" href="/seite/kontakt">Kontakt</a>
                </li>
                <li class="nav-item {{leistungen}}">
                    <a class="nav-link" href="/seite/leistungen">Leistungen</a>
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
                {% for category in categories %}
                    <a href="{{category.link}}" class="list-group-item">{{category.description}}</a>
                {% endfor %}
            </div>
        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

            <div class="card mt-4">
                {{page | raw}}
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
<script src="/jquery/jquery.min.js"></script>
<script src="/popper/popper.min.js"></script>
<script src="/bootstrap/js/bootstrap.js"></script>

</body>

</html>
