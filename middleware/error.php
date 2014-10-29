<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            .message{
                background-size: 40px 40px;
                background-image: linear-gradient(135deg, rgba(255, 255, 255, .05) 25%, transparent 25%,
                    transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%,
                    transparent 75%, transparent);                                      
                box-shadow: inset 0 -1px 0 rgba(255,255,255,.4);
                width: 100%;
                border: 1px solid;
                color: #fff;
                padding: 15px;
                position: fixed;
                _position: absolute;
                text-shadow: 0 1px 0 rgba(0,0,0,.5);
                animation: animate-bg 5s linear infinite;
            }

            .info{
                background-color: #4ea5cd;
                border-color: #3b8eb5;
            }

            .error{
                background-color: #de4343;
                border-color: #c43d3d;
            }

            .warning{
                background-color: #eaaf51;
                border-color: #d99a36;
            }

            .success{
                background-color: #61b832;
                border-color: #55a12c;
            }

            .message h3{
                margin: 0 0 5px 0;                                                  
            }

            .message p{
                margin: 0;                                                  
            }

            @keyframes animate-bg {
                from {
                    background-position: 0 0;
                }
                to {
                    background-position: -80px 0;
                }
            }
        </style>
    </head>
    <body>
        <div class="error message">
            <h3>Ocurri&oacute; un error</h3>
            <p>
                <?php
                switch ($_GET["type"]) {
                    case "1":
                        echo "No se recibi&oacute; ning&uacute;n par&aacute;metro.";
                        break;
                    case "2":
                        echo "No se especifico el token de acceso.";
                        break;
                    case "3":
                        echo "No se especifico el id de usuario.";
                        break;
                    case "4":
                        echo "No se especifico el nivel educativo.";
                        break;
                    case "5":
                        echo "Token de acceso inv&aacute;lido.";
                        break;
                    case "6":
                        echo "Nivel educativo inv&aacute;lido.";
                        break;
                    case "7":
                        echo "Error al vincular usuario con el sistema";
                        break;
                }
                ?>
            </p>
        </div>
    </body>
</html>
