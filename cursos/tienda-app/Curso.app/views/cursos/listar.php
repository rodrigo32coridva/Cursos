    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listado de Cursos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>

    <div class="container">
        <h1 class="mt-5">Cursos Disponibles</h1>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Duración</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
            


                // Verificamos si existen cursos
                if (!empty($cursos)) {
                    foreach ($cursos as $curso) {
                        // Sanitizamos los datos antes de mostrarlos
                        $idcurso = htmlspecialchars($curso['idcurso'], ENT_QUOTES, 'UTF-8');
                        $nombre = htmlspecialchars($curso['nombre'], ENT_QUOTES, 'UTF-8');
                        $descripcion = htmlspecialchars($curso['descripcion'], ENT_QUOTES, 'UTF-8');
                        $precio = htmlspecialchars($curso['precio'], ENT_QUOTES, 'UTF-8');
                        $duracion = htmlspecialchars($curso['duracion'], ENT_QUOTES, 'UTF-8');
                        $estado = htmlspecialchars($curso['estado'], ENT_QUOTES, 'UTF-8');

                        echo "<tr>
                                <td>{$idcurso}</td>
                                <td>{$nombre}</td>
                                <td>{$descripcion}</td>
                                <td>{$precio}</td>
                                <td>{$duracion} meses</td>
                                <td>{$estado}</td>
                                <td>
                                    <a href='editar.php?idcurso={$idcurso}' class='btn btn-warning btn-sm'>Editar</a>
                                    <a href='eliminar.php?idcurso={$idcurso}' class='btn btn-danger btn-sm'>Eliminar</a>
                                </td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No hay cursos disponibles.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="registrar.php" class="btn btn-primary">Registrar Nuevo Curso</a>
    </div>

    </body>
    </html>
