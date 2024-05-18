<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Asesmen Web</title>
    <link rel="stylesheet" href="{{ url('bootstrap') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('fontawesome') }}/css/fontawesome.css">
    <link rel="stylesheet" href="{{ url('fontawesome') }}/css/all.css">
    <script src="{{ url('webfont') }}/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <style>
        body {
            background-image: url('/image/Logo-Alan-Creative.png');
            background-repeat: no-repeat;
            background-position: top;
            background-attachment: fixed;
            font-family: 'Lato';
            background-color: #e9ebec;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto"
                style="width: 300px; height: 200px; margin-top: 450px; border-radius:20px; cursor: pointer; background-color: #71ace6;">
                <a href="<?= url('menu') ?>" class="text-decoration-none text-dark" target="_blank">
                    <h1 class="text-center mt-5">Kelola Menu</h1>
                </a>
            </div>
            <div class="col-md-6 mx-auto"
                style="width: 300px;height: 200px; margin-top: 450px; border-radius:20px; cursor: pointer; background-color: #fbc02a;">
                <a href="<?= url('pos') ?>" class="text-decoration-none text-dark" target="_blank">
                    <h1 class="text-center mt-5">Point Of Sales</h1>
                </a>
            </div>
        </div>
    </div>
    <script src="{{ url('bootstrap') }}/js/bootstrap.min.js"></script>
</body>

</html>
