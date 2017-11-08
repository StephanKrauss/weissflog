<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="" />

    <title>meine Firma</title>

    <!-- Bootstrap core CSS -->
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/bootstrap/css/bootstrap-grid.css" rel="stylesheet">
    <link href="/bootstrap/css/bootstrap-reboot.css" rel="stylesheet">

    <!-- Lightbox -->
    <link href="/lightbox/featherlight.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/shop-item.css" rel="stylesheet">

</head>
<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row my-navbar d-none d-md-block">
            <a class="firmenlogo d-none d-lg-block" href="/">meine Firma</a>
            <div id="navcontainer">
                <ul>
                    <li class=" {{uebersicht}}">
                        <a href="/">Übersicht</a>
                    </li>
                    <li class=" {{impressum}}">
                        <a href="/seite/impressum">Impressum</a>
                    </li>
                    <li class=" {{kontakt}}">
                        <a href="/seite/kontakt">Kontakt</a>
                    </li>
                    <li class=" {{leistungen}}">
                        <a href="/seite/leistungen">Leistungen</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row d-block d-md-none hilfsnavi">
            <div class="col-sm-6">
                <a href="/">Übersicht</a>
            </div>
            <div class="col-sm-6">
                <a href="/seite/impressum">Impressum</a>
            </div>
            <div class="col-sm-6">
                <a href="/seite/kontakt">Kontakt</a>
            </div>
            <div class="col-sm-6">
                <a href="/seite/leistungen">Leistungen</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 d-none d-md-block" id="hauptnavigation">
                <div class="list-group">
                    {% for category in categories %}
                        <a href="/kategorie/{{category.link}}" class="list-group-item">{{category.description}}</a>
                    {% endfor %}
                </div>
            </div>

            <div class="col-md-9" id="content">
                <div class="col-md-9">
                    {{page | raw}}
                </div>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col col-md-6">
                Copyright Stephan Krauss
            </div>
        </div>

    </div>
    <!-- /.container -->

<!-- Bootstrap core JavaScript -->
<script src="/jquery/jquery.min.js"></script>
<script src="/popper/popper.min.js"></script>
<script src="/bootstrap/js/bootstrap.js"></script>

<script src="/lightbox/featherlight.min.js" type="text/javascript" charset="utf-8"></script>
<script src="/javascript/own.js"></script>

</body>

</html>
