function checkForm(form){
    if ($('#fio').value=="") {
        $('err_fio').innerHTML='Введите имя';
        return false;
    };
    if ($('#phone').value=="" || $('#email').value=="") {
        $('err_contact').innerHTML='Введите email или телефон';
        return false;
    };
    return true;
};
