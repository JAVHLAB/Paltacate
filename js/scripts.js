document.querySelectorAll('.input-file').forEach(function(inputFile) {
    inputFile.addEventListener('change', function() {
      var files = this.querySelector('.input-file-button').files;
      var previews = this.parentElement.querySelectorAll('.image-preview');
  
      // Ocultar todas las vistas previas
      previews.forEach(function(preview) {
        preview.src = '';
        preview.parentElement.style.display = 'none';
      });
  
      // Mostrar las vistas previas correspondientes a los archivos seleccionados
      for (var i = 0; i < files.length; i++) {
        var reader = new FileReader();
        reader.onload = (function(file, preview) {
          return function(event) {
            preview.src = event.target.result;
            preview.parentElement.style.display = 'block';
          };
        })(files[i], previews[i]);
        reader.readAsDataURL(files[i]);
      }
    });
  });
  
  
  
  
  document.getElementById('image-form').addEventListener('submit', function(event) {
    event.preventDefault();
    var formData = new FormData(this);
    // Aquí puedes enviar el formData a través de AJAX o realizar cualquier otra acción con los datos del formulario
  });


  
  function agregarIngrediente() {
    const ingredientesContainer = document.getElementById('ingredientes-container');
    const nuevaFila = document.createElement('div');
    nuevaFila.classList.add('ingredient-row');
    nuevaFila.innerHTML = `
      <input class="input-text" type="text" name="nombre[]" placeholder="Nombre del Ingrediente" required>
      <input class="input-text" type="number" name="cantidad[]" placeholder="Cantidad" min="1" required>
      <input class="input-text" type="text" name="unidad[]" placeholder="Unidad"  required>
    `;
    ingredientesContainer.appendChild(nuevaFila);
  
    // Aplicar estilos a los nuevos elementos
    const inputs = nuevaFila.querySelectorAll('.input-text');
    inputs.forEach(input => {
      input.style.fontSize = '16px';
      input.style.width = '100%';
      input.style.border = '3px solid var(--verde)';
      input.style.padding = '1.5rem';
      input.style.borderRadius = '1rem';
    });
  }

// Función para eliminar la última fila de ingredientes, pero no la primera
function eliminarIngrediente() {
  const ingredientesContainer = document.getElementById('ingredientes-container');
  const filas = ingredientesContainer.getElementsByClassName('ingredient-row');
  if (filas.length > 1) { // Asegura que al menos una fila permanezca
      ingredientesContainer.removeChild(filas[filas.length - 1]);
  }
}

  window.addEventListener('load', function() {
    // Obtener el elemento del icono de perfil
    var profileImg = document.getElementById("profile-img");
    
    // Llama al método click() en el elemento del icono de perfil para simular un clic
    profileImg.click();
  });

  function toggleMenu() {
    var menu = document.getElementById("menu");
    var profileLink = document.getElementById("profile-link");
    
    if (menu.style.display === "block") {
      menu.style.display = "none";
      profileLink.classList.remove("abierto"); // Remueve la clase "abierto"
    } else {
      menu.style.display = "block";
      profileLink.classList.add("abierto"); // Agrega la clase "abierto"
    }
  }
  
  function cerrarSesion() {
    // Agregar código para cerrar sesión aquí
    alert("Cerrar sesión");
  }

  // Get the form element
const form = document.querySelector('form');

// Add a submit event listener to the form
form.addEventListener('submit', async (event) => {
    // Prevent the form from submitting normally
    event.preventDefault();

    // Get the form data
    const formData = new FormData(form);

    // Send a POST request to the PHP script
    const response = await fetch('save_image.php', {
        method: 'POST',
        body: formData
    });

    // Get the response data
    const data = await response.json();

    // Check if the upload was successful
    if (data.success) {
        // Get the corresponding img element
        const img = document.querySelector(`img[src="#"]`);

        // Update the src attribute of the img element
        img.src = `uploads/${data.filename}`;
    } else {
        // Display an error message
        alert(data.error);
    }
});