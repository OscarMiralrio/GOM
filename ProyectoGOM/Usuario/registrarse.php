

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/registrarse.css">
    <link rel="stylesheet" href="css/fontello.css">
    <title>Montaje e Instalaciones GOM S.A. de C.V.</title>
</head>
<body>

   <header>
       <a href="../index.html"><img id="GOM" src="img/GOM.png" alt=""></a>
        <div class="menu">
            <div class="dropdown" style="float:right;">
                <button class="dropbtn">CONTACTO</button>
                    <div class="dropdown-content">
                        <a href="cita.html">Agendar cita a la empresa</a>
                    </div>
            </div>
            <div class="dropdown" style="float:right;">
                <button class="dropbtn">SERVICIOS</button>
                    <div class="dropdown-content">
                        <a href="catalogo.html">Visualizar Catalogo</a>
                    </div>
            </div>
            <div class="dropdown" style="float:right;">
                <button class="dropbtn">QUINES SOMOS</button>
                    <div class="dropdown-content">
                        <a href="objetivos.html">Objetivos</a>
                        <a href="metas.html">Metas</a>
                        <a href="vision.html">Visiones</a>
                        <a href="mision.html">Misiones</a>
                    </div>
            </div>
        </div>
    </header>
       <section>
        <div id="registrarse">
            <div id="registro"><div id="registro1"></div></div>
            <h1 id="titulo">Registrarse</h1>
            <form action="../modelo/registrar.php" method="post">
            <label for="" id="Nombre">Nombre</label>
            <input type="text" id="nombreinput" name="nombre" required>

            <label for="" id="apePa">Apellido Paterno</label>
            <input type="text" id="apePainput" name="paterno" required>

            <label for="" id="apeMa">Apellido Materno</label>
            <input type="text" id="apeMainput" name="materno" required>

            <label for="" id="dirreccion">Direcci&oacute;n</label>
            <input type="text" id="dirreccioninput" name="direc" required>

            <label for="" id="CodPos">Codigo Postal</label>
            <input type="text" id="cp" name="cp" required>

            <label for="" id="empresa">Empresa donde Trabaja</label>
            <input type="text" id="nombreEmpinput" name="empresa" required>

            <label for="" id="email">Correo Electr&oacute;nico</label>
            <input type="text" id="emailinput" name="email" required>

            <label for="" id="contra">Contraseña</label>
            <input type="password" id="passwordinput" name="contra" required>

            <label for="" id="tel">Telefono</label>
            <input type="text" id="telefonoinput" name="telefono" required>

            <button id="btnRegistrarse">Registrarse</button>
            <label for="" id="etiqueta">¿Ya tienes una cuenta?</label>
            <a href="login.html" id="log">Iniciar Sesi&oacute;n</a>

            </form>
        </div>
        </section>

</body>
</html>
