<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="css/index.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, user-scalable=no">
</head>

<body onload="contador()">
    <?php

    if (!isset($_COOKIE['visita'])) {
        setcookie('visita', "yes", time() + 60 * 60);           //Guarda cookie que expira en una hora
        $visitas = file("./media/visitas.txt")[0];              //lee el fichero
        $visitas = intval($visitas[0]) + 1;                     //suma 1 a la visita
        file_put_contents("./media/visitas.txt", $visitas);     //guarda el fichero
    }
    ?>
    <header>
        <div id="header-text">
            Encabezado
        </div>

        <div id="icon">
            <img src="./media/Sin nombre.png" draggable="false">
        </div>
        <div id="visitas">Visitas: <?php echo file("./media/visitas.txt")[0]; ?> </div>
        <input id="arrow" type="checkbox">
        <label for="arrow">
            <div id="lblArrow">></div>
        </label>
        <nav id="nav-desp">
            <div class="btn-drop" onclick="pulsado(this); cambiar('./paginas/inicio')">
                Inicio
            </div>

            <input id="deploy" type="checkbox">
            <label for="deploy">
                <div class="btn-drop">
                    Proyectos
                    <div id="lblDeploy">
                        >
                    </div>
                </div>

            </label>
            <div id="lblDrop">
                <div class="btn-drop element" onclick="pulsado(this); cambiar('./paginas/proyectos/calculadorav2')">
                    Calculadora
                </div>
                <div class="btn-drop element" onclick="pulsado(this); cambiar('./paginas/proyectos/relojv2')">
                    Reloj
                </div>
            </div>
            <div class="btn-drop element" onclick="pulsado(this); cambiar('./paginas/guiaDeEstilo')">
                Guia de estilo
            </div>
            <div class="btn-drop element" onclick="pulsado(this); cambiar('./paginas/Alberto')">
                Sobre mi
            </div>
        </nav>
    </header>
    <div id="content" class="transHead">
        <iframe id="frame-page" src="./paginas/inicio"></iframe>
    </div>
    <script>
        function pulsado(ele) {
            let itb = document.getElementsByClassName("btn-drop"); //recoge el elemento pulsado
            for (let i = 0; i < itb.length; i++) {
                itb[i].classList.remove("clicked"); //quita el estilo del resto de elementos
            }
            ele.classList.add("clicked"); //añade el estilo al boton pulsado
        }

        function cambiar(src) {
            document.getElementById("frame-page").src = src; //cambia el source del frame
        }
    </script>
</body>