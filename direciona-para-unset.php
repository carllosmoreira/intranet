<?php
session_start();
unset($_SESSION['idEdit']);
/*
redireciona para realizar unset de todas as variáveis de sessão que podem prejudicar as funcionalidades da plataforma
se continuarem setadas enquanto o usuário navega nos menus
*/
?>
<!doctype html>
<html lang="pt-br">
<head>
    <script>
    function redireciona(pagina) {
        var pagina;
        parent.location.href = pagina;
      return false;
    }
</script>
</head>
<body>
</body>
</html>