<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Kambal learn</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../asset/css/animate.css">
    </head>
    <body>
        <div class="card card-border-danger">
            <div class="card-body">
                <div class="container">
                    <h1>Webinar: Herramientas digitales para la docencia a distancia Parte 4</h1>
                    <p>Obtén tu constancia</p> 
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="well">
                                <h3>Escribe tu correo electronico</h3>
                                <form role="form" id="contactForm" data-toggle="validator" class="shake">
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="email" class="h4">Parte</label>
                                            <select class="form-control" id="parte" name="parte" placeholder="Enter email" required>
                                                <option value="">Seleccione uno </option>
                                                <option value="p2">Parte 2 </option>
                                                <option value="p3">Parte 3 </option>
                                                <option value="p4">Parte 4 </option>
                                            </select>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label for="email" class="h4">Email</label>
                                            <input type="email" class="form-control" id="GrupoId" name="GrupoId" placeholder="Enter email" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Submit</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="tableAlumno"></div>





                    </body>
                    <script  type="text/javascript" src="../asset/js/jquery-1.11.2.min.js"></script>
                    <script type="text/javascript" src="../asset/js/validator.min.js"></script>
                    <script>
                        $("#contactForm").validator().on("submit", function (event) {
                            if (event.isDefaultPrevented()) {
                                // handle the invalid form...
                                formError();
                                submitMSG(false, "Todos los campos  requeridos");
                            } else {
                                // everything looks good!
                                event.preventDefault();
                                submitForm();
                            }
                        });

                        function submitForm() {
                             document.getElementById("tableAlumno").innerHTML = '<div class="h3 text-center tada animated text-info">Validando ...</div>';
                            // Initiate Variables With Form Content
                            var dataString = $('#contactForm').serialize();

                            $.ajax({
                                type: "GET",
                                url: "creaconstancias.php",
                                data: dataString,
                                success: function (text) {
                                    var date = text.data;
                                    var txt = "";
                                    console.log(date[0].idialumno);
                                    txt = '<button type="button" class="btn btn-primary" title="Imprimir" onclick="certificado(' + date[0].idialumno + ')">Imprimir constancia</button>'
                                    document.getElementById("tableAlumno").innerHTML = txt;
                                },
                                error: function (jqXHR, textStatus, errorThrown) {
                                    submitMSG(false, "Su correo no se encuentra en nuestra base de datos");
                                }
                            });
                        }

                        function certificado(idialumno) {
                            var parte = $('#parte').val();
                            window.open('../webinar_constancy.php?idialumno=' + idialumno + "&parte=" + parte, this.target, width = 500, height = 500);
                        }

                        function formSuccess() {
                            $("#contactForm")[0].reset();
                            submitMSG(true, "Bienvenido!");
                            location.href = "menu.php";
                        }

                        function formError() {
                            $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                                $(this).removeClass();
                            });
                        }

                        function submitMSG(valid, msg) {
                            if (valid) {
                                var msgClasses = "h3 text-center tada animated text-success";
                            } else {
                                var msgClasses = "h3 text-center text-danger";
                            }
                            $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
                        }
                    </script>

                </div>
            </div>
        </div>
    </body>
</html>
