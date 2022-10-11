<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="../css/style_login.css">
</head>
<body>
    
    <form method="POST">
        <div class="main-login">
                <div class="left-login">
                    <img src="images/logo1.png" class="left-login-image">
                </div>
                <div class="right-login">
                    <div class="card-login">

                        <h1>CADASTRAR</h1>
                        <div class="textfield">
                            <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
                        </div>
                        <div class="textfield">
                            <input type="number" name="telefone" placeholder="Telefone" maxlength="30">
                        </div>
                        <div class="textfield">
                            <input type="email" name="email" placeholder="Email" maxlength="40">
                        </div>
                        <div class="textfield">
                            <input type="password" name="senha" placeholder="Senha" maxlength="15">
                        </div>
                        <div class="textfield">
                            <input type="password" name="confSenha" placeholder="Confirmar Senha">
                        </div>
                        
                        <button type="submit" class="btn-login">Cadastrar</button>
                    </div>
                </div>
        </div>
    </form>

</body>
</html>