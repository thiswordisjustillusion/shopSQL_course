$(document).ready(function(){
    $('#form_reg').validate(
        {
        //Правила проверки:
        rules:{
            "reg_login":{
                required: true,
                minlength: 4,
                maxlength: 15,
                remote:{
                    type: "POST",
                    url: "/reg/check_login.php"
                }
            },
            "reg_pass":{
                required: true,
                minlength: 6,
                maxlength: 15
            },
            "reg_email":{
                required: true,
                email: true
            },
            "reg_surname":{
                required: true,
                minlength: 2,
                maxlength: 15
            },
            "reg_name":{
                required: true,
                minlength: 2,
                maxlength: 15
            },
            "reg_phone":{
                required: true,
                minlength: 10,
                maxlength: 11
            },
            "reg_address":{
                required: true,
            //},
            //"reg_captcha":{
            //    required: true,
            //    remote:{
            //        type: "POST",
             //       url: "/reg/check_captcha.php"
             //   }
            } //ззааппяяттааяя?
        },
        //выводимые сообщения при нарушении:
        messages:{
            "reg_login":{
                required: "Введите логин",
                minlength: "От 4  символов",
                maxlength: "До 15 символов",
                remote: "Логин занят"
            },
            "reg_pass":{
                required: "Введите пароль",
                minlength: "От 6 символов",
                maxlength: "До 15 символов"
            },
            "reg_email":{
                required: "Укажите email",
                email: "Неверный email"
            },
            "reg_surname":{
                required: "Укажите фамилию",
                minlength: "От 2 символов",
                maxlength: "До 15 символов"
            },
            "reg_name":{
                required: "Укажите имя",
                minlength: "От 2 символов",
                maxlength: "До 15 символов"
            },
            "reg_phone":{
                required: "Укажите телефон",
                minlength: "От 10 символов (7776665544)",
                maxlength: "До 11 символов (87776665544)"
            },
            "reg_address":{
                required: "Укажите адрес доставки",
            //},
            //"reg_captcha":{
            //    required: "Введите код с картинки",
            //    remote: "Неверно введён код"
            } //ззааппяяттааяя?
        },
        submitHandler: function(form){
            $(form).ajaxSubmit({
                success: function(data) {
                    if (data == true){
                        $('#block-form-registration').fadeOut(300,function(){
                            $('#reg_message').addClass('reg_message_good').fadeIn(400).html("Вы успешно зарегистрированы");
                            $('#form_submit').hide();
                        });
                    } else {
                        $('#reg_message').addClass('reg_message_error').fadeIn(400).html(data);
                    }
                        }
                            });
                            }
                            });
                        });