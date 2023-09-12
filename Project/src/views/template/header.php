<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/template.css">

    <title>Chamados Detran</title>
</head>
<body>
    <header class="header">
        <div class="logo">
            <i class="icofont-megaphone mr-2"></i>
            <span class="font-weight-bold ml-2">CHAMADOS</span>
        </div>
        <div class="menu-toggle mx-3">
            <i class="icofont-navigation-menu"></i>
        </div>
        <div class="spacer"></div>
        <div class="dropdown">
            <div class="dropdown-button">
                <img class="avatar" src="<?= "http://www.gravatar.com/avatar.php?gravatar_id=" . md5(strtolower(trim($_SESSION['user']->usuario_email))) ?>" alt="user">
                <span class="ml-3">
                    <?= $_SESSION['user']->usuario_nome ?>
                </span>
                <i class="icofont-simple-down mx-2"></i>
            </div>
            <div class="dropdown-content">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="editar_usuario.php?update=<?= $_SESSION['user']->usuario_id ?>">
                            <i class="icofont-user mr-2"></i>
                            Meu perfil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php">
                            <i class="icofont-logout mr-2"></i>
                            Se saia
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </header>