<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/shop-item.css" rel="stylesheet">

    <!-- Markdown -->
    <link rel="stylesheet" href="../editor/editor.css">

</head>

<body>

<!-- Page Content -->
<div class="container">
    <form method="post" action="/admin/">

        <div class="form-group">
          <label class="col-md-4 control-label" for="input01">Passwort*</label>
          <div class="col-md-4">
            <input placeholder="Passwort" pattern=".{8,}" class="form-control input-md" type="text" name="passwort" required>
          </div>
        </div>

        <div class="form-group">
            <div class="col-md-6">
                <button class="btn btn-success" type="submit">anmelden</button>
            </div>
        </div>

    </form>
</div>
<!-- /.container -->

</body>

</html>