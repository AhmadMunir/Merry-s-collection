var tombol = document.getElementById('tombol_daftar');
var pass_1 = document.getElementById('password');
var pass_2 = document.getElementById('repassword');
var email = document.getElementById('email');
var nama = document.getElementById('nama');
var username = document.getElementById('username');
var phone = document.getElementById('phone');

var u_message = document.getElementById('username_message');

var warnabenar = "#66cc66";
var warnasalah = "#ff6666";

function checkUsername(){
  u_message.innerHTML = ""
  if (username.value == null || username.value == "") {
    u_message.style.color = warnasalah;
    u_message.innerHTML = "Please Enter An Username!"
    username.focus();
  } else {
    $.ajax({
      type: "POST",
      url: "http://localhost/merrys/user/login/checkUsernameonDB",
      data: {usr : username.value},
      dataType: "json",
      cache: false,
      success: function(msg) {
        if (msg.usrname == "T") {
          tombol.disabled = true;
          u_message.style.color = warnasalah;
          u_message.innerHTML = "Username Not Avaible";
        }else {
          // username.style.backgroundColor = warnabenar;
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        u_message.innerHTML = "Error";
      }
    });
  }
}

function checkEmail(){
  pola_email=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/;

  var e_message = document.getElementById('email_message');


  if (email.value == "") {
    tombol.disabled = true;
    e_message.style.color = warnasalah;
    e_message.innerHTML = "Please Enter An Email Adress!"
    email.focus();
  }else if (!pola_email.test(email.value)) {
    tombol.disabled = true;
    e_message.style.color = warnasalah;
    e_message.innerHTML = "Please Enter A Valid Email Adress!"
    email.focus();
  }else {
    e_message.innerHTML = ""

    $.ajax({
      type: "POST",
      url: "http://localhost/merrys/user/login/checkEmailonDB",
      data: {eml : email.value},
      dataType: "json",
      cache: false,
      success: function(msg) {
        if (msg.email == "T") {
          tombol.disabled = true;
          e_message.style.color = warnasalah;
          e_message.innerHTML = "Email Is Already In Use By Another User, Try Another !";
        }else {
          // u_message.style.color = warnabenar;
          e_message.innerHTML = "";
          // magic if
          // if (nama.value != ""
          //     && email.value != ""
          //     && username.value !=""
          //     && phone.value !=""
          //     && pass_1.value !=""
          //     && pass_2.value !="") {
          //       tombol.disabled = false;
          // }
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        e_message.innerHTML = "Error";
      }
    });
  }
  }

function checkPass(){
  //validasi password

    var message = document.getElementById('message');

    if (pass_1.value == pass_2.value) {
      // // magic if
      // if (nama.value != ""
      //     && email.value != ""
      //     && username.value !=""
      //     && phone.value !=""
      //     && pass_1.value !=""
      //     && pass_2.value !="") {
      //       tombol.disabled = false;
      // }else {
      //   tombol.disabled = true;
      // }
      tombol.disabled = false;
      pass_2.style.backgroundColor = warnabenar;
      message.style.color = warnabenar;
      message.innerHTML = " "
    }else {
      tombol.disabled = true;
      pass_2.style.backgroundColor = warnasalah;
      message.style.color = warnasalah;
      message.innerHTML = "Password not match!";
    }

}
