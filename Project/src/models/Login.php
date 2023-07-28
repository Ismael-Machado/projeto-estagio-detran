<?php 

//realiza o "mapeamento" da tela de login 
//não possui representação no Banco de dados 
class Login extends Model {

    public function validate() {
        $errors = [];

        if(!$this->usuario_email) {
            $errors['usuario_email'] = 'Informe o e-mail';
        }
        if(!$this->usuario_senha) {
            $errors['usuario_senha'] = 'Informe a senha';
        }

        if(count($errors) > 0) {
            throw new ValidationException($errors);
        }
    }

    public function checkLogin() {
        $this->validate();
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