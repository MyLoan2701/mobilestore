
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="http://localhost:8080/mobilestore/public/css/fontawesome-free-6.2.0-web/css/all.min.css">
        <link rel="stylesheet" type="text/css" href="http://localhost:8080/mobilestore/public/css/styleAdmin.css">

        <base href="http://localhost:8080/mobilestore/admin">
        <title>Admin App</title>
    </head>

    <body>
        <div class="wrapper">
            <?php require_once "./mvc/views/pages/admin/".$data["page"].".php"; ?>
        </div>
        <script src="<?php echo "http://localhost:8080/mobilestore"?>/public/js/MyScriptAdmin.js"></script>
    </body>
</html>