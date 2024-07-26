$(document).ready(function () {
    Aspirantes();
    Alumnos();
    Men();
    WoMen();
    //iz();
    //zu();
    //tl();
    income_report();
});

function tl() {
    $("#tl").html('<i class="pe-7s-config pe-spin pe-va"></i>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=countStudentByCampusId&idicampus=1",
        success: function (text) {
            //consoles.log(text.data[0].total);
            var count = text.data[0].total;
            document.getElementById("tl").innerHTML = count;
            $({Counter: 0}).animate({
                Counter: $('#tl').text()
            }, {
                duration: 1000,
                easing: 'swing',
                step: function () {
                    $('#tl').text(Math.ceil(this.Counter));
                }
            });
        }
    });
}
function zu() {
    $("#zu").html('<i class="pe-7s-config pe-spin pe-va"></i>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=countStudentByCampusId&idicampus=12",
        success: function (text) {
            //consoles.log(text.data[0].total);
            var count = text.data[0].total;
            document.getElementById("zu").innerHTML = count;
            $({Counter: 0}).animate({
                Counter: $('#zu').text()
            }, {
                duration: 1000,
                easing: 'swing',
                step: function () {
                    $('#zu').text(Math.ceil(this.Counter));
                }
            });
        }
    });
}
function iz() {
    $("#iz").html('<i class="pe-7s-config pe-spin pe-va"></i>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=countStudentByCampusId&idicampus=2",
        success: function (text) {
            //consoles.log(text.data[0].total);
            var count = text.data[0].total;
            document.getElementById("iz").innerHTML = count;
            $({Counter: 0}).animate({
                Counter: $('#iz').text()
            }, {
                duration: 1000,
                easing: 'swing',
                step: function () {
                    $('#iz').text(Math.ceil(this.Counter));
                }
            });
        }
    });
}

function income_report() {
    $.ajax({
        type: "GET",
        url: "dataConect/pagos.php",
        data: 'action=income_report',
        success: function (text) {
            var date = text.data;
            var total = text.data[0].tot;
            var pago_efectivo = text.data[0].efectivo;
            var pago_tarjeta = text.data[0].tarjeta;
            var pago_deposito = text.data[0].deposito;
            //console.log(date)
            var txt = "";
            txt += '<div class="table-responsive"> <table id="tbpagos" class="table table-striped table-bordered table-hover table-sm dt-responsive nowrap">';
            txt += '<thead class="table-primary text-light"> <tr><th>#</th> <th>Folio</th> <th>Total</th> <th>Metodo de Pago</th><th>Fecha de cobro</th><th>Cajero</th></tr> </thead>';
            for (x in date) {
                var a = parseInt(x);
                txt += '<tr>';
                txt += "<td>" + (a + 1) + "</td>";
                txt += "<td>" + date[x].folio + "</td>";
                txt += "<td>$" + formatMoney(date[x].total) + "</td>";
                txt += "<td>" + date[x].metodo_pago + "</td>";
                txt += "<td>" + date[x].fecha + "</td>";
                txt += "<td>" + date[x].idiusuario + "</td>";
                txt += "</tr>";
            }
            txt += "</table> </div>"
            if (total === null) {
                total = 0;
            }
            if (pago_efectivo === null) {
                pago_efectivo = 0;
            }
            if (pago_tarjeta === null) {
                pago_tarjeta = 0;
            }
            if (pago_deposito === null) {
                pago_deposito = 0;
            }

            // $('#t1').html('$' + $.number(total, 2, '.'));
            $('#t1').html('$' + formatMoney(total));
            $('#t2').html('$' + formatMoney(pago_efectivo));
            $('#t3').html('$' + formatMoney(pago_tarjeta));
            $('#t4').html('$' + formatMoney(pago_deposito));
        }
    });
}

function Aspirantes2() {
    $("#aspirantes").html('<i class="pe-7s-config pe-spin pe-va"></i>');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // var serverRequest = this.responseText;
            // //consoles.log(serverRequest);
            var myObj = JSON.parse(this.responseText);
            var count = Object.keys(myObj.data).length;
            //consoles.log(count);
            document.getElementById("aspirantes").innerHTML = count;
            $({Counter: 0}).animate({
                Counter: $('#aspirantes').text()
            }, {
                duration: 1000,
                easing: 'swing',
                step: function () {
                    $('#aspirantes').text(Math.ceil(this.Counter));
                }
            });
        }
    };
    xhttp.open("GET", "dataConect/API.php?action=countAllAspiirante", true);
    xhttp.send();
}

function Aspirantes() {
    $("#aspirantes").html('<i class="pe-7s-config pe-spin pe-va"></i>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=countAllAspiirante",
        success: function (text) {
            //consoles.log(text.data[0].total);
            var count = text.data[0].total;
            document.getElementById("aspirantes").innerHTML = count;
            $({Counter: 0}).animate({
                Counter: $('#aspirantes').text()
            }, {
                duration: 1000,
                easing: 'swing',
                step: function () {
                    $('#aspirantes').text(Math.ceil(this.Counter));
                }
            });
        }
    });
}
function Alumnos() {
    $("#alumnos").html('<i class="pe-7s-config pe-spin pe-va"></i>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=countAllAlumno",
        success: function (text) {
            //consoles.log(text.data[0].total);
            var count = text.data[0].total;
            document.getElementById("alumnos").innerHTML = count;
            $({Counter: 0}).animate({
                Counter: $('#alumnos').text()
            }, {
                duration: 1000,
                easing: 'swing',
                step: function () {
                    $('#alumnos').text(Math.ceil(this.Counter));
                }
            });
        }
    });
}


function Men() {
    $("#men").html('<i class="pe-7s-config pe-spin pe-va"></i>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getManPerson",
        success: function (text) {
            //consoles.log(text.data[0].total);
            var count = text.data[0].total;
            document.getElementById("men").innerHTML = count;
            $({Counter: 0}).animate({
                Counter: $('#men').text()
            }, {
                duration: 1000,
                easing: 'swing',
                step: function () {
                    $('#men').text(Math.ceil(this.Counter));
                }
            });
        }
    });
}


function WoMen() {
    $("#women").html('<i class="pe-7s-config pe-spin pe-va"></i>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getWomanPerson",
        success: function (text) {
            //consoles.log(text.data[0].total);
            var count = text.data[0].total;
            document.getElementById("women").innerHTML = count;
            $({Counter: 0}).animate({
                Counter: $('#women').text()
            }, {
                duration: 1000,
                easing: 'swing',
                step: function () {
                    $('#women').text(Math.ceil(this.Counter));
                }
            });
        }
    });
}


function WoMen2() {
    $("#women").html('<i class="pe-7s-config pe-spin pe-va"></i>');
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // var serverRequest = this.responseText;
            // //consoles.log(serverRequest);
            var myObj = JSON.parse(this.responseText);
            var count = Object.keys(myObj.data).length;
            //consoles.log(count);
            document.getElementById("women").innerHTML = count;
            $({Counter: 0}).animate({
                Counter: $('#women').text()
            }, {
                duration: 1000,
                easing: 'swing',
                step: function () {
                    $('#women').text(Math.ceil(this.Counter));
                }
            });
        }
    };
    xhttp.open("GET", "dataConect/API.php?action=getWomanPerson", true);
    xhttp.send();
}

function newSatudent() {
    $("#newSatudent").html('<i class="pe-7s-config pe-spin pe-va"></i>');
    $.ajax({
        type: "GET",
        url: "dataConect/API.php",
        data: "action=getnewSatudent",
        success: function (text) {
            //consoles.log(text.data[0].total);
            var count = text.data[0].total;
            document.getElementById("newSatudent").innerHTML = count;
            $({Counter: 0}).animate({
                Counter: $('#newSatudent').text()
            }, {
                duration: 1000,
                easing: 'swing',
                step: function () {
                    $('#newSatudent').text(Math.ceil(this.Counter));
                }
            });
        }
    });
}


function formatMoney(number, decPlaces, decSep, thouSep) {
    decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
            decSep = typeof decSep === "undefined" ? "." : decSep;
    thouSep = typeof thouSep === "undefined" ? "," : thouSep;
    var sign = number < 0 ? "-" : "";
    var i = String(parseInt(number = Math.abs(Number(number) || 0).toFixed(decPlaces)));
    var j = (j = i.length) > 3 ? j % 3 : 0;

    return sign +
            (j ? i.substr(0, j) + thouSep : "") +
            i.substr(j).replace(/(\decSep{3})(?=\decSep)/g, "$1" + thouSep) +
            (decPlaces ? decSep + Math.abs(number - i).toFixed(decPlaces).slice(2) : "");
}