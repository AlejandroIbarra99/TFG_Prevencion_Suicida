var leftPos = screen.width - 400;
var topPos = screen.width - 200;
function chat(){
    window.open('./chat_app.html', 'Chat de ayuda', '_blank, height=500, width=400, top=0, left='+ leftPos+',top=' + topPos);
}
function nuevopaciente() {
    window.location.href = '../register/patient-register.php';
}

function photo(){
    window.open('./add-photos.html', 'Nuevo Contacto', '_blank, height=594, width=795');
}

const boton = document.querySelector("#createaccount");
boton.addEventListener("click", createaccount)

/*function createaccount(){
    alert('En 24/48h su paciente recibirá las credenciales para conectarse a MI ESPACIO SEGURO');
}*/

const botonMES = document.querySelector("#botonMES");
boton.addEventListener("click", createaccount)

function loginpage(){
    window.open('./pages-login.html', "_self");
}

const botonOpen = document.querySelector("#buttonLogin");
boton.addEventListener("click", createaccount)

function MainPage(){
    window.open('./index.html', "_self");
}

const btnCita = document.querySelector("#btnCita");
boton.addEventListener("click", createaccount)

function CitaPrevia(){
    window.open('https://www.doctoralia.es/buscar?q=Psic%C3%B3logo&loc=Murcia&filters%5Bspecializations%5D%5B%5D=60', 'Cita Previa', '_blank');
}

function pickhourdate(){
    alert('Se ha concertado una cita para la hora seleccionada');
}

/*
document.getElementById("filepicker").addEventListener("change", function(event) {
    let output = document.getElementById("AddImage");
    let files = event.target.files;
    let item = document.createElement("img", "id='AddNewImage', src='" + files.webkitRelativePath + "'");
    item.innerHTML = files[0].mozFullPath;
    output.appendChild(item);
  }, false);
*/

function getpath(){
    let box = document.getElementById("photobox");
    let photo = document.createElement("img", "id='AddPhoto', src='" + window.URL.createObjectURL(files[0]) + "'");
    box.innerHTML = photo;
    document.getElementById('AddPhoto').src = window.URL.createObjectURL(files[0]);

    //document.getElementById('NewImage').src = window.URL.createObjectURL(files[0])
}

var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('NewImage');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };


  