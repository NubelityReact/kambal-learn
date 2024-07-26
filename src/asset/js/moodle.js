/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * core_user_create_user_moodle
 * Trigger que inserta a alumno en moodle
 * @param {type} username
 * @param {type} firstname
 * @param {type} lastname
 * @param {type} email
 * @returns {undefined}
 */
function core_user_create_user_moodle(username, firstname, lastname, email, idialumno) {
    swalert('Mensaje!', 'Procesando...', 'info');
    $.ajax({
        type: "POST",
        url: "dataConect/moodle.php",
        data: 'action=core_user_create_user_moodle&username=' + username + '&firstname=' + firstname + '&lastname=' + lastname + '&email=' + email,
        success: function (text) {
            var myJSON = JSON.stringify(text);
            var valid = myJSON.includes("username");
            if (valid) {
                success_user_create_moodle(text[0].id, text[0].username, idialumno);
                console.log(text);
            } else {
                error_user_create_moodle(text.message);
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            swalert('Mensaje!', jqXHR + " " + textStatus + " " + errorThrown, 'warning');
        }
    });
}

function success_user_create_moodle(id, matricula, idialumno) {
    swalert('Moodle dice:', 'El alumno ' + matricula + ' se creo correctamente con el ID: ' + id, 'success');
    $.ajax({
        type: "POST",
        url: "dataConect/API.php",
        data: 'action=success_user_create_moodle&id=' + id + '&matricula=' + matricula + '&idialumno=' + idialumno,
        success: function (text) {
            console.log(text);
        }
    });
}

function error_user_create_moodle(message) {
    swalert('Moodle dice:', message, 'info');
}

function core_user_update_institut(idimoodle, institution) {
    //swalert('Mensaje!', 'Procesando...', 'info');
    $.ajax({
        type: "POST",
        url: "dataConect/moodle.php",
        data: 'action=core_user_update_institut&idimoodle=' + idimoodle + '&institution=' + institution,
        success: function (text) {
      //      swalert('Mensaje!', text, 'info');
        },
        error: function (jqXHR, textStatus, errorThrown) {
        //    swalert('Mensaje!', jqXHR + " " + textStatus + " " + errorThrown, 'warning');
        }
    });
}

function core_user_update_password(idimoodle, new_password) {
    swalert('Mensaje!', 'Procesando...', 'info');
    $.ajax({
        type: "POST",
        url: "dataConect/moodle.php",
        data: 'action=core_user_update_password&idimoodle=' + idimoodle + '&new_password=' + new_password,
        success: function (text) {
            swalert('Mensaje!', text, 'info');
        },
        error: function (jqXHR, textStatus, errorThrown) {
            swalert('Mensaje!', jqXHR + " " + textStatus + " " + errorThrown, 'warning');
        }
    });
}

function auth_userkey_request_login_url(moodle_email) {
    var loginurl;
    $.ajax({
        type: "POST",
        url: "dataConect/moodle.php",
        data: "action=auth_userkey_request_login_url&moodle_email=" + moodle_email,
        dataType: 'json',
        async: false,
        success: function (text) {
            //var myObj = JSON.stringify(text);
            //var date = text.data;
            loginurl = text.data.loginurl;
            //return (text.data.loginurl);
            return (loginurl);
            console.log(text.data.loginurl);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            loginurl = jqXHR;
        }
    });
    return(loginurl);
}

function isValidURL(url) {
    var RegExp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;

    if (RegExp.test(url)) {
        return true;
    } else {
        return false;
    }
} 

function core_enrol_manual_users(userid, courseid, idigenerales) {
    //swalert('Mensaje!', 'Procesando...', 'info');
    $.ajax({
        type: "POST",
        url: "dataConect/moodle.php",
        data: 'action=enrol_manual_enrol_users&userid=' + userid + '&courseid=' + courseid,
        success: function (text) {
            console.log('enrol_manual_enrol_users ' + text);
            //updateidmoodle(userid, idigenerales);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            swalert('Mensaje!', jqXHR + " " + textStatus + " " + errorThrown, 'warning');
        }
    });
}