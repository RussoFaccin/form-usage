<?php
    require __DIR__.'/vendor/autoload.php';
    use \FormLib\FormUtilities;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap-reboot.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Form Usage</title>
</head>
<body>
    <form action="controller/form-handle.php" class="m-formCadastro -novalidate" method="post">
        <div class="m-formCadastro__formContainer --stacked">
            <?php FormUtilities::generateFormToken(); ?>
            <div class="m-formCadastro__fieldGroup">
                <label for="fld_name">Nome:</label>
                <input type="text" class="m-formCadastro__field" name="fld_name" id="fld_name" pattern="(^[A-Z,a-z][a-zãÃ]+\s{1}[A-Z,a-z]+)([A-Za-zãÃ]\s*)+" required validate title="Preencha seu  Nome completo">
                <small class="m-formCadastro__fieldMessage"></small>
            </div>
            <div class="m-formCadastro__fieldGroup">
                <label for="fld_mail">E-mail:</label>
                <input type="email" class="m-formCadastro__field" id="fld_mail" name="fld_mail" pattern="^([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x22([^\x0d\x22\x5c\x80-\xff]|\x5c[\x00-\x7f])*\x22))*\x40([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d)(\x2e([^\x00-\x20\x22\x28\x29\x2c\x2e\x3a-\x3c\x3e\x40\x5b-\x5d\x7f-\xff]+|\x5b([^\x0d\x5b-\x5d\x80-\xff]|\x5c[\x00-\x7f])*\x5d))*$" required validate title="Preencha com um e-mail válido">
                <small class="m-formCadastro__fieldMessage"></small>
            </div>
            <div class="m-formCadastro__fieldGroup">
                <label for="fld_cpf">CPF:</label>
                <input type="text" class="m-formCadastro__field" data-mask="000.000.000-00" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required validate title="Preencha o CPF corretamente">
                <small class="m-formCadastro__fieldMessage"></small>
            </div>
            <div class="m-formCadastro__fieldGroup">
                <label for="fld-fone">Telefone:</label>
                <input type="text" class="m-formCadastro__field" id="fld_fone" name="fld_fone" pattern="^\(\d{2}\)\s\d{8,9}" data-mask="(00) {0}00000000" required  validate title="Preencha o Telefone corretamente">
                <small class="m-formCadastro__fieldMessage"></small>
            </div>
        </div>
        <input type="submit" value="Enviar">
        <div class="m-formCadastro__messageBox"></div>
    </form>
    <!-- SCRIPTS -->
    <script src="https://unpkg.com/imask"></script>
    <script src="js/validate.js"></script>
</body>
</html>