<?php 

//realiza o "mapeamento" da tela de login 
//não possui representação no Banco de dados 
class Login extends Model {

    public function checkLogin() {
        $user = User::getOne(['usuario_email' => $this->usuario_email]);
        if($user) {
            if(!$user->usuario_is_ativo) {
                throw new AppException('Usuário está desligado da empresa.');
            }
            if(password_verify($this->usuario_senha, $user->usuario_senha)){
                return $user;
            }
        }
        throw new AppException('Usuário ou Senha inválidos.');
    }
}