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
      //hay que hacer una ventana de SUCCESS
    }else{
      alert('problemas al registrar');
    }
  });
}

function saveNewArticle(){
  $('#saveNewArticle').click(function(e){
    e.preventDefault();
    $.ajax({
      data:  {
      "new_articulo": 1,
      "nombre_articulo": $("#nombre_articulo").val(),
      "descripcion_articulo": $("#descripcion_articulo").val(),
      "unidades_articulo": $("#unidades_articulo").val(),
      "escala_articulo": $("#unidades_articulo").val(),
      "tamaño_articulo": $("#tamaño_articulo").val(),
      "categoria_articulo": $("#categoria_articulo").val()
      },
      url: 'classes/articulos.php',
      type: 'post'
    }).done(function(data){
      if (data != 0) {
        //console.log(data);
        document.location.replace(document.location.pathname);
      }else{
        alert('problemas al iniciar session');
      }
    });
  })
}


$(document).ready(function(){
  if($('#login').length!=0){
    login();
  }
  if($('#articulos').length!=0){
    saveNewArticle();
  }
  if("#nuevo_usuario").length!=0){
    // initialize the validator function
    validator.message.date = 'not a real date';
    // validate a field on "blur" event, a 'select' on 'change' event & a '.reuired' classed multifield on 'keyup':
    $('form')
      .on('blur', 'input[required], input.optional, select.required', validator.checkField)
      .on('change', 'select.required', validator.checkField)
      .on('keypress', 'input[required][pattern]', validator.keypress);

    $('.multi.required').on('keyup blur', 'input', function() {
      validator.checkField.apply($(this).siblings().last()[0]);
    });

    $('#addNewUser').click(function(e) {
      e.preventDefault();
      var submit=true;
      // evaluate the form using generic validaing
      if (!validator.checkAll($(this).closest('form'))) {
        submit = false;
      }
      if (submit){
        newUser();
      }
    });
  }
  if($('#salida_almacen').length!=0){
    $('#wizard').smartWizard();

    $('#wizard_verticle').smartWizard({
      transitionEffect: 'slide'
    });

    $('.buttonNext').addClass('btn btn-success');
    $('.buttonPrevious').addClass('btn btn-primary');
    $('.buttonFinish').addClass('btn btn-default');
  }
})
