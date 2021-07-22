<?php 
require 'admin/config.php';
require 'funtions.php';

$conexion = conexion($bd_config);
$conexion2 = conexion2();
include_once './admin/database.php';

session_start();

if (!$conexion) {
    header('Location: error.php');
}



if (isset($_SESSION['rol'])) {
    switch ($_SESSION['rol']) {
        case 1:
            header('Location: ' . RUTA . '/admin');
            break;
        case 2:
            header('Location: ' . RUTA);
            break;
        default;
    }
}

$clientes = 'SELECT * FROM cliente ORDER BY idcliente DESC';
        $resul = mysqli_query($conexion2,$clientes);
        while ($row=mysqli_fetch_assoc($resul)) {}

if (isset($_POST['email']) && isset($_POST['pass'])) {
    $email = limpiarDatos($_POST['email']);
    $pass = limpiarDatos($_POST['pass']);

    $db = new Database();
        $query = $db->connect()->prepare('SELECT * FROM cliente WHERE Email = :email AND pass = :pass');
        $query->execute(['email' => $email, 'pass' => $pass]);

        $row = $query->fetch(PDO::FETCH_NUM);

    if ($row==true) {
        //validar rol
        $rol = $row['7'];
        $_SESSION['id'] = $row['0'];
        $_SESSION['nombre'] = $row['1'];
        $_SESSION['ap'] = $row['2'];
        $_SESSION['am'] = $row['3'];
        $_SESSION['email'] = $row['4'];
        $_SESSION['tel'] = $row['5'];
        $_SESSION['pass'] = $row['6'];
        function Nombre_Cliente ($row){
            $nombre=$row['1'];
            return $nombre;
        }
        $_SESSION['rol'] = $rol;
        
        switch ($_SESSION['rol']) {
            case 1:
                header('Location: ' . RUTA . '/admin');
                break;
            case 2:
                header('Location: ' . RUTA);
                break;
            default;
        }

    }else {
        //no existe
        ?><script>
            alert('Cliente no registrado o datos erroneos, favor de crear una cuenta o probrar otros datos');
        </script><?php
    }

}

?>

<?php require'./views/headeriniciar.php' ?>
<div class="contenedor">
    <div class="post-single">
        <article>
            <h2 class="titulo">Iniciar Sesion</h2>
            <form class="formulario" method="post" action="#">
                <!-- Grupo: Correo Electronico -->
                <div class="formulario__grupo" id="grupo__correo">
                            <label for="correo" class="formulario__label">Correo Electrónico</label>
                            <div class="formulario__grupo-input">
                                <input type="email" class="formulario__input" name="email" id="correo"
                                    placeholder="correo@correo.com" value="elena@gmail.com">
                            </div>

                        </div>
                <!-- Grupo: Contraseña -->
                <div class="formulario__grupo" id="grupo__password">
                            <label for="password" class="formulario__label">Contraseña</label>
                            <div class="formulario__grupo-input">
                                <input type="password" class="formulario__input" name="pass" id="password" value="elena">
                            </div>
                        </div>
                <div class="formulario__grupo formulario__grupo-btn-enviar">
                    <input class="formulario__btn" type="submit" value="Iniciar Sesion">
                </div>
            </form>
        </article>
    </div>
</div>

<?php require'./views/footer.php' ?>