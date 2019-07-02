let a = 0;

$(window).ready(() => {
   $('.contacts__message_input')
       .on('click focus', e => {
           $(e.target).removeClass('border-danger').addClass('shadow');
       })
       .on('blur', e => {
           if ($(e.target).removeClass('shadow').val().length === 0)
               $(e.target).parent().find('.contacts__message_tip').show();
       });

   $('.contacts__message_submit').on('click', e => {
       e.preventDefault();
       if (Date.now() - a < 15000) {
           toast('Электронная почта', 'Подождите некоторое время перед повторной отправкой сообщения');
           return;
       }
       let name = $('[name=name]');
       let email = $('[name=email]');
       let subject = $('[name=subject]');
       let body = $('[name=body]');
       if (name.val().length === 0) name.addClass('border-danger');
       if (email.val().length === 0) email.addClass('border-danger');
       if (subject.val().length === 0) subject.addClass('border-danger');
       if (body.val().length === 0) body.addClass('border-danger');
       if (name.val().length === 0 || email.val().length === 0 || subject.val().length === 0 || body.val().length === 0) {
           $('.contacts__message_error.empty').show();
           return;
       }
       if (!email.val().match(/.+@.+\.[a-zа-я]+/i)) {
           $('.contacts__message_error.email').show();
           email.addClass('border-danger');
           return;
       }
       $('.loader').show();
       $.ajax({
           type: 'post',
           url: '/api/sendMail.php',
           data: {
               name: name.val(),
               email: email.val(),
               subject: subject.val(),
               body: body.val(),
           },
           success: data => {
               if (data.status === 'OK') {
                   $('[name=name], [name=email], [name=subject], [name=body]').val('');
                   toast('Электронная почта', 'Сообщение успешно доставленно');
                   a = Date.now();
               } else if (data.status === 'ERROR')
                   toast('Электронная почта', 'При отправке сообщения возникли ошибки');
               $('.loader').hide();
               $('.contacts__message_error').hide();
           },
           error: data => {
               toast('Электронная почта', 'При отправке сообщения возникли ошибки');
               $('.loader').hide();
               $('.contacts__message_error').hide();
           }
       });
   });
});