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
        console.log(data);
        alert('problemas al iniciar session');
      }
    });
  })
}
