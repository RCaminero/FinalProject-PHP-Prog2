<?php

function mostrarArticulo($link)
{
    $query = "SELECT * FROM `articulo`";
    $resultado = mysqli_query($link, $query);

    return $resultado;
}

function mostrarPedido($link)
{
    $query = "SELECT
    c.Nombre,
    c.Apellido,
    p.id_pedido,
    p.Fecha_pedido,
    p.Comentario,
    p.estado_pedido
FROM
    cliente AS c
    INNER JOIN pedido AS p ON c.id_cliente = p.Cliente_id_cliente";
    $resultado = mysqli_query($link, $query);

    return $resultado;
}

function mostrarUsuarios($link)
{
    $query = "SELECT * FROM `usuario`";
    $resultado = mysqli_query($link, $query);

    return $resultado;
}

function mostrarClientes($link)
{
    $query = "SELECT * FROM `cliente`";
    $resultado = mysqli_query($link, $query);

    return $resultado;
}


function mostrarClientee($link)
{
    $query = "SELECT 
    * 
    FROM `cliente` a, `usuario` b,`tipo_acceso` c
    WHERE a.Id_usuario = b.Id_usuario
    and b.Id_tipo_acceso=c.Id_tipo_acceso";

    $resultado = mysqli_query($link, $query);

    return $resultado;
}

function mostrarComentarios($link)
{
    $query = "SELECT 
    * 
    FROM `comentario` a, `usuario` b
    WHERE a.Id_usuario = b.Id_usuario";

    $resultado = mysqli_query($link, $query);

    return $resultado;
}

function mostrarPedidos($link)
{
    $query = "SELECT * FROM `pedido`";
    $resultado = mysqli_query($link, $query);

    return $resultado;
}

function mostrarCatArticulo($link)
{
    $query = "SELECT * FROM `categoria_articulo`";
    $resultado = mysqli_query($link, $query);

    return $resultado;
}
function mostrarproveedor($link)
{
    $query = "SELECT * FROM `proveedor`";
    $resultado = mysqli_query($link, $query);

    return $resultado;
}

function mostrarRol($link)
{
    $query = "SELECT * FROM `rol_empleado`";
    $resultado = mysqli_query($link, $query);

    return $resultado;
}

function mostrarTipo($link)
{
    $query = "SELECT * FROM `tipo_acceso`";
    $resultado = mysqli_query($link, $query);

    return $resultado;
}

function consultarClientes($link, $id)
{
    $query = "SELECT * FROM `cliente` WHERE `Id_cliente` = '$id'";
    $resultado = mysqli_query($link, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        return $row;
    } else {
        // echo("Alerta 0001: Registro Insertado en la Base de Datos");
        $_SESSION['mensajeTexto'] = "Error Consultando Datos -> ConsultarUsuarios";
        $_SESSION['mensajeTipo'] = "alert-danger";

        header("Location: ./clientes_mant.php");
    }
}

function consultarArticulos($link, $id)
{
    $query = "SELECT * FROM `articulo` WHERE `Id_articulo` = '$id'";
    $resultado = mysqli_query($link, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        return $row;
    } else {
        // echo("Alerta 0001: Registro Insertado en la Base de Datos");
        $_SESSION['mensajeTexto'] = "Error Consultando Datos -> ConsultarUsuarios";
        $_SESSION['mensajeTipo'] = "alert-danger";

        header("Location: ./articulo_mant.php");
    }
}

function consultarPedidos($link, $id)
{
    $query = "SELECT * FROM `pedido` WHERE `id_pedido` = '$id'";
    $resultado = mysqli_query($link, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        return $row;
    } else {
        // echo("Alerta 0001: Registro Insertado en la Base de Datos");
        $_SESSION['mensajeTexto'] = "Error Consultando Datos -> ConsultarUsuarios";
        $_SESSION['mensajeTipo'] = "alert-danger";

        header("Location: ./clientes_mant.php");
    }
}

function consultarUsuarios($link, $id)
{
    $query = "SELECT * FROM `usuario` WHERE `Id_usuario` = '$id'";
    $resultado = mysqli_query($link, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        return $row;
    } else {
        // echo("Alerta 0001: Registro Insertado en la Base de Datos");
        $_SESSION['mensajeTexto'] = "Error Consultando Datos -> ConsultarUsuarios";
        $_SESSION['mensajeTipo'] = "alert-danger";

        header("Location: ./clientes_mant.php");
    }
}

function consultarCatArticulo($link, $id)
{
    $query = "SELECT * FROM `categoria_articulo` WHERE `Id_categoria_articulo` = '$id'";
    $resultado = mysqli_query($link, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        return $row;
    } else {
        // echo("Alerta 0001: Registro Insertado en la Base de Datos");
        $_SESSION['mensajeTexto'] = "Error Consultando Datos -> ConsultarUsuarios";
        $_SESSION['mensajeTipo'] = "alert-danger";

        header("Location: ./cat_articulo_mant.php");
    }
}

function consultarProveedor($link, $id)
{
    $query = "SELECT * FROM `proveedor` WHERE `id_proveedor` = '$id'";
    $resultado = mysqli_query($link, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        return $row;
    } else {
        // echo("Alerta 0001: Registro Insertado en la Base de Datos");
        $_SESSION['mensajeTexto'] = "Error Consultando Datos -> ConsultarProveedor";
        $_SESSION['mensajeTipo'] = "alert-danger";

        header("Location: ./proveedor_mant.php");
    }
}

function consultarRol($link, $id)
{
    $query = "SELECT * FROM `rol_empleado` WHERE `Id_rol_empleado` = '$id'";
    $resultado = mysqli_query($link, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        return $row;
    } else {
        // echo("Alerta 0001: Registro Insertado en la Base de Datos");
        $_SESSION['mensajeTexto'] = "Error Consultando Datos -> ConsultarRol";
        $_SESSION['mensajeTipo'] = "alert-danger";

        header("Location: ./proveedor_mant.php");
    }
}
function consultarTipo($link, $id)
{
    $query = "SELECT * FROM `tipo_acceso` WHERE `Id_tipo_acceso` = '$id'";
    $resultado = mysqli_query($link, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        return $row;
    } else {
        // echo("Alerta 0001: Registro Insertado en la Base de Datos");
        $_SESSION['mensajeTexto'] = "Error Consultando Datos -> Consultaracceso";
        $_SESSION['mensajeTipo'] = "alert-danger";

        header("Location: ./tipo_acceso_mant.php");
    }
}


function consultarCliente($link, $id)
{
    $query = "SELECT 
    * 
    FROM `cliente` a, `usuario` b,`tipo_acceso` c
    WHERE a.Id_usuario = b.Id_usuario
    and b.Id_tipo_acceso=c.Id_tipo_acceso
    and a.Id_cliente = '$id'";

    $resultado = mysqli_query($link, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        return $row;
    } else {
        // echo("Alerta 0001: Registro Insertado en la Base de Datos");
        $_SESSION['mensajeTexto'] = "Error Consultando Datos -> ConsultarMantenimiento";
        $_SESSION['mensajeTipo'] = "alert-danger";

        header("Location: ./cliente_mant.php");
    }
}
function consultarEmpleados($link, $id)
{
    $query = "SELECT 
    a.Id_empleado,
    a.Nombre,
    a.Id_usuario,
    a.Id_rol_empleado,
    a.Apellido,
    a.Sexo,
    a.Fecha_nacimiento,
    a.Estado_empleado,
    b.Usuario,
    c.Nombre as Rol
    FROM `empleado` a, `usuario` b,`rol_empleado` c
    WHERE a.Id_usuario = b.Id_usuario
    and a.Id_rol_empleado=c.Id_rol_empleado
    and a.Id_empleado = '$id'";

    $resultado = mysqli_query($link, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        return $row;
    } else {
        // echo("Alerta 0001: Registro Insertado en la Base de Datos");
        $_SESSION['mensajeTexto'] = "Error Consultando Datos -> ConsultarMantenimiento";
        $_SESSION['mensajeTipo'] = "alert-danger";

        header("Location: ./empleados_mant.php");
    }
}

function mostrarEmpleado($link)
{
    $query = "SELECT a.Id_empleado,
    a.Nombre,
    a.Id_usuario,
    a.Id_rol_empleado,
    a.Apellido,
    a.Sexo,
    a.Fecha_nacimiento,
    a.Estado_empleado,
    b.Usuario,
    c.Nombre as Rol
    FROM `empleado` a, `usuario` b,`rol_empleado` c
    WHERE a.Id_usuario = b.Id_usuario
    and a.Id_rol_empleado=c.Id_rol_empleado";

    $resultado = mysqli_query($link, $query);

    return $resultado;
}

function consultarUsuario($link, $id)
{
    $query = "SELECT 
    a.Id_usuario, 
    a.Id_tipo_acceso, 
    b.Nivel,
    a.Usuario,
    a.Password, 
    a.Estado_usuario  
    FROM `usuario` a, `tipo_acceso` b
    WHERE a.Id_tipo_acceso = b.Id_tipo_acceso
    and a.Id_usuario = '$id'";

    $resultado = mysqli_query($link, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        return $row;
    } else {
        // echo("Alerta 0001: Registro Insertado en la Base de Datos");
        $_SESSION['mensajeTexto'] = "Error Consultando Datos -> ConsultarMantenimiento";
        $_SESSION['mensajeTipo'] = "alert-danger";

        header("Location: ./usuarios_mant.php");
    }
}
function mostrarUsuario($link)
{
    $query = "SELECT 
    a.Id_usuario, 
    a.Id_tipo_acceso, 
    b.Nivel,
    a.Usuario,
    a.Password, 
    a.Estado_usuario
    FROM `usuario` a, `tipo_acceso` b
    WHERE a.Id_tipo_acceso = b.Id_tipo_acceso";

    $resultado = mysqli_query($link, $query);

    return $resultado;
}

function consultarArticulo($link, $id)
{
    $query = "SELECT 
    a.Id_articulo, 
    a.Proveedor_id_proveedor, 
    a.Categoria_articulo_id_categoria_articulo, 
    b.Nombre AS Proveedor,
    c.Nombre AS Categoría,
    a.Nombre,
    a.Descripcion, 
    a.Precio_unidad, 
    a.Itbis, 
    a.Precio_total, 
    a.Envio, 
    a.Stock, 
    a.Estado_articulo  
    FROM `articulo` a, `Proveedor` b,`Categoria_articulo` c
    WHERE a.Proveedor_id_proveedor = b.id_proveedor
    and a.Categoria_articulo_id_categoria_articulo = c.Id_categoria_articulo
    and a.Id_articulo = '$id'";

    $resultado = mysqli_query($link, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        return $row;
    } else {
        // echo("Alerta 0001: Registro Insertado en la Base de Datos");
        $_SESSION['mensajeTexto'] = "Error Consultando Datos -> ConsultarMantenimiento";
        $_SESSION['mensajeTipo'] = "alert-danger";

        header("Location: ./articulos_mant.php");
    }
}

function mostrarArticulos($link)
{
    $query = "SELECT 
    a.Id_articulo, 
    a.Proveedor_id_proveedor, 
    a.Categoria_articulo_id_categoria_articulo, 
    b.Nombre AS Proveedor,
    c.Nombre AS Categoria,
    a.Nombre,
    a.Precio,
    a.Imagen,
    a.Imagen1,
    a.Imagen2,
    a.Imagen3,
    a.Descripcion, 
    a.Precio_unidad, 
    a.Itbis, 
    a.Precio_total, 
    a.Envio, 
    a.Stock, 
    a.Estado_articulo  
    FROM `articulo` a, `Proveedor` b,`Categoria_articulo` c
    WHERE a.Proveedor_id_proveedor = b.id_proveedor
    and a.Categoria_articulo_id_categoria_articulo = c.Id_categoria_articulo";

    $resultado = mysqli_query($link, $query);

    return $resultado;
}


function consultarPedido1($link, $id)
{
    $query = "SELECT 
    a.id_pedido, 
    a.Cliente_id_cliente, 
    a.Empleado_id_empleado, 
    b.Nombre AS cnombre,
    b.Apellido AS capellido,
    c.Nombre AS enombre,
    c.Apellido AS eapellido,
    a.Comentario,
    a.Fecha_pedido, 
    a.Fecha_entrega,
    a.Estado_pago,
    a.Metodo_pago,
    a.Estado_pedido  
    FROM `pedido` a, `cliente` b,`empleado` c
    WHERE a.Cliente_id_cliente = b.Id_cliente
    and a.Empleado_id_empleado = c.Id_empleado
    and a.id_pedido = '$id'";

    $resultado = mysqli_query($link, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        return $row;
    } else {
        // echo("Alerta 0001: Registro Insertado en la Base de Datos");
        $_SESSION['mensajeTexto'] = "Error Consultando Datos -> ConsultarMantenimiento";
        $_SESSION['mensajeTipo'] = "alert-danger";

        header("Location: ./pedido_mant.php");
    }
}


function mostrarPedidos1($link)
{
    $query = "SELECT 
    a.id_pedido, 
    a.Cliente_id_cliente, 
    a.Empleado_id_empleado, 
    b.Nombre AS cnombre,
    b.Apellido AS capellido,
    c.Nombre AS enombre,
    c.Apellido AS eapellido,
    a.Comentario,
    a.Fecha_pedido, 
    a.Estado_pago,
    a.Metodo_pago,
    a.Fecha_entrega,
    a.Estado_pedido  
    FROM `pedido` a, `cliente` b,`empleado` c
    WHERE a.Cliente_id_cliente = b.Id_cliente
    and a.Empleado_id_empleado = c.Id_empleado";

    $resultado = mysqli_query($link, $query);

    return $resultado;
}

function mostrarPedido_detalle($link)
{
    $query = "SELECT 
    *
    FROM `pedido_detalle` a, `pedido` b,`articulo` c
    WHERE a.Pedido_id_pedido = b.id_pedido
    and a.Articulo_id_articulo = c.Id_articulo";

    $resultado = mysqli_query($link, $query);

    return $resultado;
}

function consultarPedido_detalle($link, $id)
{
    $query = "SELECT 
    *
    FROM `pedido_detalle` a, `pedido` b,`articulo` c
    WHERE a.Pedido_id_pedido = b.id_pedido
    and a.Articulo_id_articulo = c.Id_articulo
    and a.id_pedido_detalle = '$id'";

    $resultado = mysqli_query($link, $query);

    if (mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_array($resultado);
        return $row;
    } else {
        // echo("Alerta 0001: Registro Insertado en la Base de Datos");
        $_SESSION['mensajeTexto'] = "Error Consultando Datos -> ConsultarMantenimiento";
        $_SESSION['mensajeTipo'] = "alert-danger";

        header("Location: ./pedido_detalle_mant.php");
    }
}


function validarLogin($link, $user, $pass)
{

    $query = "SELECT * FROM `usuario` WHERE `Usuario` = '$user' AND `Password` = '$pass' AND `Estado_usuario` = 'A'";
    $resultado = mysqli_query($link, $query);

    if (mysqli_num_rows($resultado) == 1) {
        # code...
        $row = $resultado->fetch_assoc();
        $_SESSION['Id_usuario'] = $row['Id_usuario'];
        if ($row['Id_tipo_acceso'] == 1) {
            header("Location: admin.php");
        } else {
            header("Location: index.php");
        }
    } else {
        # code...
        $_SESSION['Login'] = "Usuario o Contraseña incorrecta";
        $_SESSION['Login-tipo'] = "alert-danger";
    }
}


function pedidosMes($link)
{
$query = "SELECT 
COUNT(pedido.id_pedido) AS Cantidad_pedidos, MONTHNAME(pedido.Fecha_pedido) AS Mes,SUM(pedido_detalle.Total) AS Ventas,
COUNT(pedido.Cliente_id_cliente) AS clientes, articulo.Nombre
FROM pedido_detalle
INNER JOIN pedido ON pedido_detalle.Pedido_id_pedido=pedido.id_pedido
INNER JOIN articulo ON pedido_detalle.Articulo_id_articulo=articulo.Id_articulo
INNER JOIN cliente ON pedido.Cliente_id_cliente=cliente.Id_cliente
WHERE MONTH(pedido.Fecha_pedido) = MONTH(CURRENT_DATE())
GROUP BY Mes";
$resultado = mysqli_query($link, $query);
return $resultado;}

function factura($link)
{
$query = "SELECT
CONCAT_WS(' ', cliente.Nombre, cliente.Apellido) AS nombre_cliente,
MAX(pedido.id_pedido) AS num_factura,
cliente.Direccion AS direccion,
cliente.Telefono AS cel,
articulo.Id_articulo AS num_art,
articulo.Nombre AS articulo,
pedido.Fecha_pedido AS fecha,
pedido.Fecha_entrega AS fecha_entrega,
pedido_detalle.Cantidad AS cantidad,
pedido_detalle.Precio AS precio,
pedido_detalle.Total AS total
FROM
pedido_detalle 
    INNER JOIN
pedido ON pedido_detalle.Pedido_id_pedido = pedido.id_pedido
    INNER JOIN
cliente  ON pedido.Cliente_id_cliente = cliente.Id_cliente
    INNER JOIN
articulo ON pedido_detalle.Articulo_id_articulo = articulo.Id_articulo
GROUP BY
nombre_cliente";
$resultado = mysqli_query($link, $query);
return $resultado;}
