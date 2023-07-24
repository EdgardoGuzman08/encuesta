<!DOCTYPE html>
<html>
<head>
    <title>Generar Códigos QR</title>
    <style>
    
        @font-face {
            font-family: 'Mark Pro';
            src: url('https://edguzmanportafolio.000webhostapp.com/recursos/font/markpro-bold.ttf') format('truetype');
            font-weight: bold;
            font-style: normal;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Mark Pro';
        }
        
        
        
        .ContenedorFormulario {
            width: 60%;
            height: 85%;
            overflow: hidden;
        }

        .Box {
            position: relative;
            width: 100%;
            height: 100%;
            color: #ffffff;
            background: rgb(0,135,200);
            background: linear-gradient(90deg, rgba(0,135,200,1) 0%, rgba(0,135,200,1) 35%, rgba(4,112,184,1) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin-left: var(--Margin-left);
            transition: all 800ms;
            z-index: 1;
            border-top-right-radius: 50px;
            border-bottom-right-radius: 50px;
            border-bottom-left-radius: 50px;
            border-top-left-radius: 50px;
        }

        .Box h1 {
            margin-top: 4.1%;
        }

        .TextBox {
            width: 80%;
            height: 40px;
            margin-top: 2%;
            margin-bottom: 3%;
            text-align: center;
            background-color: transparent;
            border: none;
            color: white;
            border-bottom: 2px solid #181818;
            font-size: 18px;
            outline: none;
        }

        .Button {
            width: 35%;
            height: 60px;
            margin-top: 2%;
            text-align: center;
            background-color: #FA7937;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            margin-left: 263px;
            border-radius: 60px;
        }

        .Button:hover {
            background-color: #CCE6F3;
            color: black;
        }

        .Formulario {
            width: 100%;
            height: 40%;
            margin-top: 1%;
            padding: 1%;
            margin-left: 20%;
        }
        ::placeholder {
        
            color: white;
        }
        
        .Logo {
            width: 490px;
            height: 200px;
            background-image: url("https://edguzmanportafolio.000webhostapp.com/recursos/logos/logo-04.png");
            background-size: cover;
            background-position: center;
            margin-bottom: 35px;
            margin-top: 15px;
        }
        
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="ContenedorFormulario">
        <div class="Box">
            <div class="Logo"></div>
            <h1>Generar Códigos QR</h1>
            <div class="Formulario">
                <input type="number" id="cantidad" placeholder="Ingrese la cantidad" class="TextBox">
                <button id="generarQR" class="Button">Generar Códigos QR</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Asigna un evento click al botón de generar QR
            $('#generarQR').click(function() {
                // Obtiene la cantidad ingresada en el campo de entrada
                var cantidad = parseInt($('#cantidad').val());

                // Verifica si se ingresó una cantidad válida
                if (cantidad && cantidad > 0) {
                    // Envía la cantidad al archivo qr.php para generar los códigos QR
                    $.post('qr.php', { cantidad: cantidad }, function(response) {
                        // Muestra la respuesta del servidor si se generaron los códigos con éxito
                        alert(response);
                    });
                } else {
                    alert('Ingrese una cantidad válida');
                }
            });
        });
    </script>
</body>
</html>
