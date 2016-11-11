function login(){
  $('.submit_login').click(function(e){
    e.preventDefault();
    $.ajax({
      data:  {
      "login_user" : 1,
      "txtusuario": $("#txtuser").val(),
      "txtpass": $("#txtpass").val()
      },
      url: 'classes/login.php',
      type: 'post'
    }).done(function(data){
      if (data != 0) {
        //console.log(data);
        document.location.replace('panel.php');
      }else{
        alert('problemas al iniciar session');
      }
    });
  })
}

function newUser(){
  e.preventDefault();
  $.ajax({
    data:  {
    "register_user" : 1,
    "name": $('#name_newUser').val(),
    "mail": $("#email_newUser").val(),
    "username" :$("#username_newUser").val(),
    "telephone": $("#telephone_newUser").val(),
    "password" : $("#password_newUser").val(),
    "rol": $("#rol_newUser").val()
    },
    url: 'classes/register.php',
    type: 'post'
  }).done(function(data){
    if (data != 0) {
      console.log(data);
      //document.location.replace('panel.php');
    }else{
      alert('problemas al registrar');
    }
  });
}
