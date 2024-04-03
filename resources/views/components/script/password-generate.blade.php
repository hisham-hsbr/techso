<script>
    $(document).ready(function() {

        // generate random password
        function generatePassword() {
            let charset = "abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ123456789";
            let password = "";
            let length = 6;

            for (let i = 0; i < length; i++) {
                password += charset.charAt(Math.floor(Math.random() * charset.length));
            }
            return password;
        }

        // set password to input fiels
        $('.generate-password').on('click', function() {
            let password = generatePassword();

            $('#password').val(password);
            $('#password_confirm').val(password);
        });

        // show/hide password
        $('.show-password').on('click', function() {

            let passwordInput = $(this).closest('.form-group').find('input');
            let passwordFieldType = passwordInput.attr('type');
            let newPasswordFieldType = passwordFieldType == 'password' ? 'text' : 'password';
            passwordInput.attr('type', newPasswordFieldType);
            $(this).html(newPasswordFieldType == 'password' ?
                '<i class="fa-regular fa-eye-slash"></i>' : '<i class="fa-regular fa-eye"></i>');
        });
    });
</script>
