<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
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
                          $tipo = $_SESSION["user_type"];
                          if (isset($_GET['patient_id']))
                          {
                            $id = $_GET['patient_id']; 
                          }
                          /*if (isset($_GET['patient_id'])) {
                              $psico = $_SESSION['register_number'];
                          }*/

                          if($tipo == "psychologist") {
                            $sql = "SELECT * FROM patients where id =" .  $_GET["patient_id"];
                            echo $sql . " psy";
                          }
                          else {
                            $sql = "SELECT * FROM psychologist where registration_number = '$psico'";
                            echo $sql . " pat";;
                          }

                          $resultado = $conn->query($sql);

                          // Mostrar los planes futuros
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
                <div class="input-group mb-0">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-send"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Escriba el mensaje aqui..."/>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript"></script>
    <script>function showChat() {
      // Realiza una solicitud AJAX para obtener la información de los chats
      const xhr = new XMLHttpRequest();
      xhr.open("GET", "./showchat", true);
      xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
          console.log("entra al show");
          document.getElementById("chattext").innerHTML = xhr.responseText;
        }
      };
      xhr.send();
      
    }</script>
  </body>
</html>
