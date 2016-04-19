function checkForm(form){
    if ($('#fio').value=="") {
        $('err_fio').innerHTML='Введите имя';
        return false;
    };
    if ($('#phone').value=="" || $('#email').value=="") {
        $('err_contact').innerHTML='Введите email или телефон';
        return false;
    };
    
    var msg   = $('#form').serialize();
    $.ajax({
        type: 'POST',
        url: 'form-request',
        data: msg,
        success: function(data) {
            $('#form').hide();
            $('#form-results').html(data);
        },
        error:  function(xhr, str){
	    alert('Возникла ошибка: ' + xhr.responseCode);
        }
    });
    return true;
};
