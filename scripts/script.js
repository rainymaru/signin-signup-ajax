// Авторизация

$('.login-button').click(function(e){
  e.preventDefault();

  $("input").removeClass('errorlabel');

  let login = $('input[name="login"]').val();
  let password = $('input[name="password"]').val();

  $.ajax({
    url:'auth.php',
    type:'POST',
    dataType: 'json',
    data: {
      login: login,
      password: password
    },
    success(data) {
      if (data.status) {
        document.location.href = '/profile.php';
      } else {
        if (data.type === 1) {
          data.fields.forEach(function(field){
            $(`input[name="${field}"`).addClass('errorlabel');
          });
        }
      $('.msg').removeClass('none').text(data.message);
      }
    }
  });
});

let avatar = false;
$('input[name="avatar"]').change(function(e){
  avatar = e.target.files[0];
});


//Регистрация

$('.register-button').click(function(e){
  e.preventDefault();

  $("input").removeClass('errorlabel');

  let name = $('input[name="name"]').val();
  let login = $('input[name="login"]').val();
  let password = $('input[name="password"]').val();
  let password_confirm = $('input[name="password_confirm"]').val();
  let email = $('input[name="email"]').val();

  let formdata = new FormData();
  formdata.append('name', name);
  formdata.append('login', login);
  formdata.append('password', password);
  formdata.append('password_confirm', password_confirm);
  formdata.append('email', email);
  formdata.append('avatar', avatar);

  $.ajax({
    url:'register.php',
    type:'POST',
    dataType: 'json',
    processData: false,
    contentType: false,
    cache: false,
    data:formdata,
    success(data) {  
      if (data.status) {
        document.location.href = '/index.php';
      } else {
        if (data.type === 1) {
          data.fields.forEach(function(field){
            $(`input[name="${field}"`).addClass('errorlabel');
          });
        }
      $('.msg').removeClass('none').text(data.message);
      }
    }
  });
});