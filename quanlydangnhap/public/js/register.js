
$.validator.addMethod("validatePassword", function (value, element) {
    return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
}, "Hãy nhập password từ 8 đến 16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một chữ số");

$('#register').validate({
    rules: {
        username: {
            required: true
        },
        psw: {
            required: true,
            validatePassword: true
        },
        fullname: {
            required: true
        },
        gender: {
            required: true
        },
        age: {
            required: true,
            number: true
        },
        address: {
            required: true
        }

    },
    messages: {
        username: {
            required: 'Vui lòng nhập đầy đủ',
        },
        psw: {
            required: 'Vui lòng nhập đầy đủ'
        },
        fullname: {
            required: 'Vui lòng nhập đầy đủ'
        },
        gender: {
            required: 'Vui lòng nhập đầy đủ'
        },
        age: {
            required: 'Vui lòng nhập đầy đủ',
            number: 'Vui lòng nhập số'
        },
        address: {
            required: 'Vui lòng nhập đầy đủ'
        }
    }
});
$('#username').keyup(function (e) {
    var username =$(this).val();
    $.ajax({
        url: "index.php?controller=auth&action=check_username",
        method: "post",
        data: {username: username},
        success: function (result) {
            if (result > 0){
                $('#result_username').text('Username đã tồn tại');
                $('#register').submit(function (e) {
                    e.preventDefault();
                });
            }else{
                $('#result_username').text('');
            }
        }
    });
})