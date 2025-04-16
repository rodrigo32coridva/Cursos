<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AcademiaApp</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  
  <div class="container">

    <form action="" autocomplete="off" id="formulario-editar">
      <div class="card mt-3">
        <div class="card-header bg-primary text-light">Actualizar datos del curso</div>
        <div class="card-body">
          
          <div class="form-floating mb-2">
            <select name="categorias" id="categorias" class="form-select" required>
              <option value="">Seleccione</option>
              <option value="1">Matemáticas</option>
              <option value="2">Lengua y Literatura</option>
              <option value="3">Ciencias Sociales</option>
              <option value="4">Ciencias Naturales</option>
            </select>
            <label for="categorias">Categoría</label>
          </div>

          <div class="form-floating mb-2">
            <input type="text" class="form-control" id="nombre" placeholder="Nombre del curso" required>
            <label for="nombre">Nombre del curso</label>
          </div>

          <div class="form-floating mb-2">
            <input type="text" class="form-control" id="descripcion" placeholder="Descripción" required>
            <label for="descripcion">Descripción</label>
          </div>

          <div class="row g-2">

            <div class="col">
              <div class="form-floating mb-2">
                <input type="text" class="form-control text-end" id="precio" placeholder="Precio" required>
                <label for="precio">Precio</label>
              </div>
            </div>
            <div class="col">
              <div class="form-floating mb-2">
                <input type="number" value="3" min="1" max="12" step="1" class="form-control text-end" id="duracion" placeholder="Duración (meses)" required>
                <label for="duracion">Duración</label>
              </div>
            </div>

          </div>

          <div class="form-floating">
            <select name="estado" id="estado" class="form-select">
              <option value="S" selected>Activo</option>
              <option value="N">Inactivo</option>
            </select>
            <label for="estado">Estado del curso</label>
          </div>

        </div>
        <div class="card-footer text-end">
          <button class="btn btn-sm btn-primary" type="submit">Actualizar</button>
          <button class="btn btn-sm btn-secondary" type="reset">Cancelar</button>
        </div>
      </div>
    </form>

  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      
      function obtenerRegistro() {
        const URL = new URLSearchParams(window.location.search);
        const idcurso = URL.get('id');
        
        const parametros = new URLSearchParams();
        parametros.append("task", "getById");
        parametros.append("idcurso", idcurso);

        fetch(`../../app/controllers/CursoController.php?${parametros}`, { method: 'GET' })
          .then(response => response.json())
          .then(data => {
            if (data.success) {
              document.getElementById("categorias").value = data.curso.idcategoria;
              document.getElementById("nombre").value = data.curso.nombre;
              document.getElementById("descripcion").value = data.curso.descripcion;
              document.getElementById("precio").value = data.curso.precio;
              document.getElementById("duracion").value = data.curso.duracion;
              document.getElementById("estado").value = data.curso.estado;
            } else {
              alert("No se encontraron datos para este curso.");
            }
          })
          .catch(error => { console.error(error); });
      }

      obtenerRegistro();

      const formulario = document.querySelector("#formulario-editar");

      formulario.addEventListener("submit", function (event){
        event.preventDefault();

        const formularioData = new FormData(formulario);
        
        const parametros = new URLSearchParams();
        parametros.append("task", "update");
        parametros.append("idcurso", new URLSearchParams(window.location.search).get('id'));
        parametros.append("categorias", formularioData.get("categorias"));
        parametros.append("nombre", formularioData.get("nombre"));
        parametros.append("descripcion", formularioData.get("descripcion"));
        parametros.append("precio", formularioData.get("precio"));
        parametros.append("duracion", formularioData.get("duracion"));
        parametros.append("estado", formularioData.get("estado"));

        fetch("../../app/controllers/CursoController.php", {
          method: 'POST',
          body: parametros
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            alert("Curso actualizado correctamente.");
            window.location.href = "listar.php"; 
          } else {
            alert("Hubo un problema al actualizar el curso.");
          }
        })
        .catch(error => { console.error(error); });
      });
    });
  </script>
</body>
</html>
