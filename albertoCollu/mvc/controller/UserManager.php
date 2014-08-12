<?php

require_once (__DIR__) . "/../model/User.php";

/**
 * Description of UserManager
 *
 * @author Alberto
 */
class UserManager {

    private $user = NULL;

    public function __construct($user = NULL) {
        $this->user = $user;
    }

    public function getUser() {
        return $this->user;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function changeProfile($user) {
        if ($this->user == NULL) {
            return NULL;
        }
        $arrayChange = array();
        if ($this->user->getEmail() != $user->getEmail()) {
            $arrayChange[User::EMAIL] = $user->getEmail();
        }
        if ($this->user->getName() != $user->getName()) {
            $arrayChange[User::NAME] = $user->getName();
        }
        if ($this->user->getSurname() != $user->getSurname()) {
            $arrayChange[User::SURNAME] = $user->getSurname();
        }
        if ($this->user->getAddress() != $user->getAddress()) {
            $arrayChange[User::ADDRESS] = $user->getAddress();
        }
        //metodo he effettua la query per cambiare i dati dell'utente (id è garanzia di unicità dell'utente / arrayChange contiene le eventuali modifiche del profilo)
        return User::updateUser($this->user->getId(), $arrayChange);
    }

}
