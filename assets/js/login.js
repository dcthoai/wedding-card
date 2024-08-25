function login(user){
    openLoadingAnimation();

    fetch(BASE_URL + '/admin/login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(user),
    })
    .then(response => response.json())
    .then(data => {
        closeLoadingAnimation();

        if (data.status === 'success')
            window.location.href = BASE_URL + '/admin';
        else
            openPopupNotify('Đăng nhập thất bại: ', data.message, 'error');
    })
    .catch(error => {
        closeLoadingAnimation();
        openPopupNotify('Đăng nhập thất bại!', error.message, 'error');
        console.log(error);
    })
}

function validateLogin(){
    Validator({
        form: 'form-login',
        formInput: '.input-box',
        errorMessage: '.label-error',
        rules: [
            Validator.isRequired('#username', 'Vui lòng nhập username!'),
            Validator.isRequired('#password', 'Vui lòng nhập mật khẩu của bạn!'),
            Validator.minLength('#password', 8, 'Vui lòng nhập tối thiểu 8 kí tự!'),
        ],
        onSubmit: function(data){
            let user = {
        		username: data['username'],
                password: data['password']
            }

        	login(user);
        }
    });
}

validateLogin();
