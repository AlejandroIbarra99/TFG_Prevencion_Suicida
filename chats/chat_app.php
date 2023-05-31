<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Chat Online</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="./css/style.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>

    <div class="container">
      <div class="row clearfix">
        <div class="col-lg-12">
          <div class="card chat-app">
            <div class="chat">
              <div class="chat-header clearfix">
                <div class="row">
                  <div class="col-lg-6">
                    <img src="../assets/img/logo.png" alt="contigo_logo"/>
                    <div class="chat-about">
                      <h6 class="m-b-0">
                      <?php 
                        require '../dbaccess.php';
                        session_start();

                        // Verificar si la clave de array "user_type" está definida
                        $tipo = isset($_SESSION["user_type"]) ? $_SESSION["user_type"] : "";

                          // Verificar si la clave de array "patient_id" está definida
                          if (isset($_GET['patient_id'])) {
                              $id = $_GET['patient_id'];
                          } else {
                              $id = isset($_SESSION['patient_id']) ? $_SESSION['patient_id'] : ""; 
                          }
                          // Verificar si la variable $psico está definida
                          $psico = isset($_SESSION['register_number']) ? $_SESSION['register_number'] : "";
                          if($tipo == "psychologist") {
                            $sql = "SELECT * FROM patients where id = '$id'";
                          }
                          else {
                            $sql = "SELECT * FROM psychologists where registration_number = '$psico'";
                          }

                          $resultado = $conn->query($sql);

                          // Mostrar los nombres
                          if ($resultado->num_rows > 0) {
                            while($fila = $resultado->fetch_assoc()) {
                              echo $fila["name"];
                            }
                          }
                          ?>
                         está <b>CONTIGO</b></h6>
                    </div>
                  </div>
                </div>
              </div>
              <div class="chat-history">
                <ul id="chattext" class="m-b-0">
                </ul>
              </div>
              <div class="chat-message clearfix">
                  <form id="messageForm" action="save_chat.php" method="POST">
                    <div class="input-group mb-0">
                      <input type="text" class="form-control" id="message" placeholder="Escriba el mensaje aquí..." required/>
                      <input type="hidden" id="patientId" name="patient_id" value="<?php echo $id; ?>">
                      <button class="fa fa-send" id="btnSaveMessage" type="submit"></button>
                    </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    // Realiza una solicitud AJAX para obtener la información de los chats
    function showChat(id) {
      const xhr = new XMLHttpRequest();
      xhr.open("GET", "./showchat?patient_id=" + id, true);
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          document.getElementById("chattext").innerHTML = xhr.responseText;
        }
      };
      xhr.send();
    }

    // Agregar un evento de envío de formulario
    document.getElementById("messageForm").addEventListener("submit", function (e, ) {
      e.preventDefault();

      // Obtener el valor del mensaje
      const message = document.getElementById("message").value;
      const patientId = document.getElementById("patientId").value;
      // Realizar una solicitud AJAX para guardar el mensaje
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "save_chat?patient_id=" + patientId, true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          // Actualizar la lista de chats después de enviar el mensaje
          showChat(<?php echo $id; ?>);
        }
      };
      xhr.send("message=" + encodeURIComponent(message));

      // Limpiar el campo de mensaje
      document.getElementById("message").value = "";
    });

    function callShowChat() {
  // Obtener el ID del paciente
  const patientId = <?php echo $id; ?>;
  
  // Llamar a showChat con el ID del paciente
  showChat(patientId);
}

// Llamar a showChat cada diez segundos
setInterval(callShowChat, 5000);
    </script>
  </body>
</html>