
// $.validator.addMethod("validatePassword", function (value, element) {
//     return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
// }, "Hãy nhập password từ 8 đến 16 ký tự bao gồm chữ hoa, chữ thường và ít nhất một chữ số");
$('#login').validate({
    rules: {
        username: {
            required: true,
        },
        psw: {
            required: true,
        }
    },
    messages: {
        username: {
            required: 'Vui lòng nhập đầy đủ',
        },
        psw: {
            required: 'Vui lòng nhập đầy đủ'
        }
    }
});