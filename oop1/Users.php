<?php
require_once __DIR__.'/DBconnect.php';

class Users extends DBconnect
{
    public function userExist ($login)
    {
        $login = $this->escapeChar($login);
        $stmt = $this->conn->query('SELECT users.login FROM users WHERE login = "'.$login.'"')->fetchAll(PDO::FETCH_ASSOC);

        if (empty($stmt[0]))
        {
            return false;
        } else {
            return true;
        }
    }

    public function pwdCorrect ($login, $pwd)
    {
        $login = $this->escapeChar($login);
        $pwd = $this->escapeChar($pwd);
        $pwd = $this->safePwd($pwd);
        $stmt = $this->conn->query('SELECT users.pwd FROM users WHERE login = "'.$login.'"')->fetchAll(PDO::FETCH_ASSOC);

        if ($pwd == $stmt[0]['pwd'])
        {
            return true;
        }
        return false;
    }
}