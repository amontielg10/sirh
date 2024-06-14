
///CAMBIAR EL TITULO DEL ARCHIVO
function updateFileName(input) {
    var fileName = input.files[0].name;
    var fileNameContainer = input.parentElement.querySelector('.custom-file-name');
    fileNameContainer.innerText = fileName;
  }

  function ocultarModalCarga(){
    $("#modal_carga_masiva").modal("hide");
}

function mostrarModalCarga(){
    $("#modal_carga_masiva").modal("show");
}

function validarCarga(){
    let maxMB = 5;
    let fileInput = document.getElementById('customFile');
    let file = fileInput.files[0];
    if (file) {
      let fileSize = file.size;
      let fileSizeKB = fileSize / 1024;
      let fileMb = fileSizeKB/1024;
      let fileExtension = file.name.split('.').pop();

      if (fileMb >= maxMB){
        mensajeError('El archivo debe tener un peso máximo de ' + maxMB + ' MB');
      } else if (fileExtension != 'xlsx') {
        mensajeError('La extensión del archivo debe terminar .xlsx');
      } else {
        processData(file); ///DATA SUCCESS
      }
    } else {
        mensajeError('Campo seleccione un archivo no puede estar vacio');
    }
}

function processData(file){

        let data = new FormData();
        data.append('archivo',file);

        $.ajax({
        url:"../../../../App/Controllers/Hrae/CentroTrabajoC/CargaC.php",
        type:'POST',
        contentType:false,
        data:data,
        processData:false,
        cache:false, 
        success: function (data) {
            console.log(data);
        }
    });
}