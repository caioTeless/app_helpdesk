
<?php
// Necessária para definir seções e páginas apenas as páginas permitdas
session_start();

// print_r($_SESSION);

// verifica autenticação
$usuario_autenticado = false;
$usuario_id = null;
$usuario_perfil_id = null;

$perfis = array(1 => 'Administrativo', 2 => 'Usuário');

// usuários do sistema
$usuarios_app = [
    ['id' => 1, 'email' => 'adm@teste.com.br', 'senha' => '123456', 'perfil_id' => 1],
    ['id' => 2, 'email' => 'user@teste.com.br', 'senha' => 'abcde', 'perfil_id' => 2],
    ['id' => 3, 'email' => 'user2@teste.com.br', 'senha' => 'abcde', 'perfil_id' => 2]
];


foreach ($usuarios_app as $user) {
    if ($_POST['email'] == $user['email'] && $user['senha'] == $_POST['senha']) {
        $usuario_autenticado = true;
        $usuario_id = $user['id'];
        $usuario_perfil_id = $user['perfil_id'];
    }
}

if ($usuario_autenticado) {
    $_SESSION['autenticado'] = 'SIM';
    $_SESSION['id'] = $usuario_id; 
    $_SESSION['perfil_id'] = $usuario_perfil_id;
    header('Location: home.php');
} else { // Força o redirecionamento para erro para a página index
    $_SESSION['autenticado'] = 'NAO';
    header('Location: index.php?login=erro');
}

?>