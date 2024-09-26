<?php

class User extends DB{

        private $nombre;
        private $username;

        public function userExist($user, $pass){
            $md5pass = md5($pass);

            $query = $this->connect()->prepare('SELECT * FROM tbl_usuarios WHERE usuario = :user AND contrasena =:pass');
            $query->execute(['user' => $user, 'pass' => $md5pass]);

            if($query->rowCount()){
                return true;
            }else{
                return false;
            }
        
        }

        public function setUser($user){
            $query = $this->connect()->prepare('SELECT * FROM tbl_ususarios where usuarios = :user ');
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