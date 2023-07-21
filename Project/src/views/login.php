<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/login.css">

    <title>Chamados Detran</title>
</head>
<body>
    <figure class="img-top"> 
        <img src="https://www.detran.ac.gov.br/wp-content/uploads/2023/01/logoSiteDetranSecom.png" alt="logo do governo do acre e logo do detran" class="img-logo">
    </figure>
    
    <form class="form-login" action="#" method="post">
        <div class="login-card card">
            <div class="card-header">
                <i class="icofont-megaphone mr-2"></i>
                <span class="font-weight-bold">CHAMADOS</span>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="email" id="email">E-mail</label>
                    <input type="email" id="email" name="email" class="form-control"
                    placeholder="Informe seu e-mail institucional" autofocus> 
                </div>
                <div class="form-group">
                    <label for="password" id="password">Senha</label>
                    <input type="password" id="password" name="password" class="form-control"
                    placeholder="Informe a sua senha"> 
                    <a href="#" class="restaurar-senha mx-1">restaurar senha?</a>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-lg btn-success">Entrar</button>
            </div>
        </div>
    </form>
</body>
</html>