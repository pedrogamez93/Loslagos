<!-- resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <style>
        h1 , h2 {
            color: #565656;
        }
        .principal {
            border: 1px solid #CCCCCC;
            border-radius: 10px;       
        }
        .first-form {
            border: 1px solid #CCCCCC;
            border-radius: 10px;
        }
        input.form-control {
            color: #565656;
            font-size: 16px;
            font-weight: 700;
            font-style: italic;
        }
        .style-label {
            color: #565656;
            font-size: 16px;
            font-weight: 700;
        }
        .style-col-menu {
            background-color: #0c1e35;
        }
        button.btn.btn-link {
            color: #FFFFFF;
            text-decoration: none;
            font-family: unset;
            font-weight: 700;
        }
        li.style-li {
            list-style: none;
            padding-bottom: 10px;
        }
        a.style-a-menu {
            color: #FFFFFF;
            text-decoration: none;
            font-weight: 500;   
        }
        .ck.ck-content.ck-editor__editable.ck-rounded-corners.ck-editor__editable_inline.ck-blurred {
            height: 350px;
        }
    </style>
</head>
<body>
    <div class="container-fluid body">
        <div class="row">
            <div class="col-md-2 style-col-menu">
                <div class="container menu">
                    @include('layouts.menu')
                </div>
            </div>
            <div class="col-md-10">
                <h1>Bienvenido al Dashboard</h1>
                <p>El rol del usuario logueado es: <strong>{{ $rol }}</strong></p>
                <!-- Resto del contenido del dashboard -->
            </div>
        </div>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                allowedContent: true
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>
</html>
