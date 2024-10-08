<?php

include_once 'conexion.php';

class User extends DB{

        private $nombre;
        private $username;

        public function userExist($user, $pass){
            
            // $bcrypt_hash = password_hash($pass, PASSWORD_DEFAULT);

            $query = $this->connect()->prepare('SELECT * FROM tbl_usuarios WHERE usuario = :user AND pass =:pass');
            $query->execute(['user' => $user, 'pass' => $pass]);

            if($query->rowCount()){
                return true;
            }else{
                return false;
            }
        
        }

        public function setUser($user){
            $query = $this->connect()->prepare('SELECT * FROM tbl_usuarios where usuario = :user ');
            $query->execute(['user' => $user]);

            foreach($query as $currentUser){
                $this->nombre = $currentUser['nombre'];
                $this->username = $currentUser['usuario']; 
            }


        
        }
        public function getNombre(){
            return $this->nombre;
        }
}

?>