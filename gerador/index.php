<!doctype html>
<html lang="pt-pt">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style type="text/css">
      #wrapper {
        width: 70%;
        margin: 2% auto;
        text-align: center;
      }

      form {
        width: 30%;
        display: inline-block;
      }

      .card {
        display: inline-block;
        margin-right: 15%;
        width: 190px;
        height: 245px;
        float: right;
      }

      #gen_image {
        background: url("placa.png") no-repeat;
        width: 150px;
        height: 150px;
        position: relative;
      }

      #gen_image .nickCond {
        font-family: Arial;
        font-size: 12px;
        font-weight: bold;
        color: #777;
        position: absolute;
        top: 4%;
        left: 36%;
      }

      #gen_image .avatarCond {
        width: 44px;
        height: 56px;
        overflow: hidden;
        margin: 0;
        position: absolute;
        top: 18.2%;
        left: 11%;
      }
      #gen_image .avatarCond img {
        display: block;
        margin: -30% -27%;
      }

      #gen_image .dataCond {
        font-family: Arial;
        font-size: 9px;
        font-weight: normal;
        color: #777;
        position: absolute;
        top: 18%;
        left: 57%;
      }
    </style>
    <title>Gerador</title>
  </head>
  <body>
    <div id="wrapper">
      <h1 class="display-4">Gerador de Medalhistas</h1>
      <form action="" method="POST" class="needs-validation" novalidate>
        <div class="form-group">
          <label for="nickname">Nickname</label>
          <input type="text" class="form-control" name="nickname" id="nickname" aria-describedby="nickHelp" placeholder="Nickname da pessoa" required>
          <small id="nickHelp" class="form-text text-muted">Coloca o nickname do medalhista de honra.</small>
          <div class="valid-feedback">É válido!</div>
          <div class="invalid-feedback">Tem que inserir um nickname!</div>
        </div>
        <div class="form-group">
          <label for="date">Data de condecoração</label>
          <input type="date" class="form-control" name="date" id="date" aria-describedby="dateHelp" placeholder="Data" required>
          <small id="dateHelp" class="form-text text-muted">Coloca a data em que o medalhista foi condecorado.</small>
          <div class="valid-feedback">É válido!</div>
          <div class="invalid-feedback">Tem que inserir uma data!</div>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>

      <div class="card">
        <div class="card-header">
          Imagem
        </div>
        <div class="card-body" id="image">
        </div>
      </div>

      <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $nickname = $_POST['nickname'];
          $idate = list($year, $month, $day) = explode('-', $_POST['date']);
          $date = "$day/$month/$year";

          if(!empty($nickname) && !empty($date)) {
            echo "<div id='gen_image'>
              <div class='nickCond'>$nickname</div>
              <div class='avatarCond'>
                <img src='http://www.habbo.com.br/habbo-imaging/avatarimage?&user=$nickname&action=std&direction=3&head_direction=3&img_format=png&gesture=sml&headonly=0&size=b'/>
              </div>
              <div class='dataCond'>$date</div>
            </div>";
          }
        }
      ?>
    </div>

    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>

    <script src="html2canvas.js"></script>
    <script>
      html2canvas(document.querySelector("#gen_image")).then(canvas => {
        document.getElementById("image").appendChild(canvas);
        document.getElementById("gen_image").style.display = 'none';
      });
    </script>
  </body>
</html>
