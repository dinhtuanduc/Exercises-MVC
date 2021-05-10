$.validator.addMethod("validateImage", function (value, element) {
    var regexp = /\.(gif|jpeg|jpg|png)$/i;
    return this.optional(element) || regexp.test(value);
}, "Định dạng ảnh không hợp lệ");
$('#product_create').validate({
    rules: {
        product_name: {
            required: true
        },
        product_image: {
            required: true,
            validateImage: true
        },
        product_price: {
            required: true,
            number: true
        },
        product_quantity: {
            required: true,
            number: true
        },
        product_desc: {
            required: true
        }
    },
    messages: {
        product_name: {
            required: 'Vui lòng nhập đầy đủ'
        },
        product_image: {
            required: 'Vui lòng thêm ảnh'
        },
        product_price: {
            required: 'Vui lòng nhập đầy đủ',
            number: 'Vui lòng nhập số'
        },
        product_quantity: {
            required: 'Vui lòng nhập đầy đủ',
            number: 'Vui lòng nhập số'
        },
        product_desc: {
            required: 'Vui lòng nhập đầy đủ'
        }
    }
});