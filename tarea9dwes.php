<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DWES: Tarea 9</title>
        <style type="">
           body {
                background-color: beige;
                font-family: 'Arial', sans-serif;
                text-align: center;
                margin: 20px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                height: 100vh; /* Esto centra verticalmente en la pantalla */
            }

            h1 {
                color: #333;
            }

            p {
                font-style: italic;
                color: #666;
            }

            img {
                width: 500px;
                height: 500px;
            }

            button {
                
                height: 50px;
                width: 350px;
                text-align: center;
                padding: 1.5%;
                margin-top:20px;
                font-size: larger;
                background-color: darkgrey;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script>

            $(document).ready(function() {
                // Ponemos un contador inicializado a 0
                var contador = 0;
                // creamos la funcion click para el boton
                $("#boton").click(function() {
                // se hace un nueva petición a ajax para cambiar la imagen
                $.ajax({
                    url: 'https://dog.ceo/api/breeds/image/random',
                    success: function(data) {
                        // cambiamos la url vieja por la nueva url al hacer click
                        $("img").attr("src", data.message);
                    }
                });
                // incrementamos el contador y lo pintamos en el elemento con id contador
                contador = contador + 1;
                $("#contador").text(contador);
            });
        });
        </script>
    </head>
    <body>
        <h1> Fotos domesticas de perros </h1>
        <?php

            //Se realiza la peticion a la api que nos devuelve el JSON con la información de los posts
            $broma_json = file_get_contents('https://dog.ceo/api/breeds/image/random');
             // Se decodifica el fichero JSON y se convierte a objeto
             $broma = json_decode($broma_json);
        ?>
        <!-- se imprime cada imagen recogiendo el valor message de la variable $broma -->
        <img src="<?php echo $broma-> message; ?>"  alt="Imagen de un perrito encantador">

        <button  id="boton"type="button">Pulsa para cambiar imagen</button>
        <p>Ha visualizado usted  <span id="contador">0</span> fotos</p>

    </body>
</html>
