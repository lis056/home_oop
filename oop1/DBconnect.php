<?php

class DBconnect {
    protected $conn;

    public function __construct()
    {
        require_once __DIR__.'/conf.php';

        $this->conn = new PDO($conf['dsn'], $conf['dbuser'], $conf['dbpass']);
    }

    public function select()
    {
        $stmt = $this->conn->query('SELECT * FROM users');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($login, $pwd, $email)
    {
        $login = $this->escapeChar($login);
        $pwd = $this->escapeChar($pwd);
        $pwd = $this->safePwd($pwd);
        $email = $this->escapeChar($email);
        $stmt = $this->conn->prepare('INSERT INTO users (login, pwd, email) VALUES ("'.$login.'", "'.$pwd.'", "'.$email.'")');
//        $stmt = $this->conn->prepare('INSERT INTO users (login, pwd, email) VALUES (?,?,?)');
//        return $stmt->execute(array($login, $pwd, $email));
        return $stmt->execute();
    }

    public function update($login, $pwd, $email)
    {
        $login = $this->escapeChar($login);
        $pwd = $this->escapeChar($pwd);
        $email = $this->escapeChar($email);

        $stmt = $this->conn->prepare('UPDATE users SET login = "'.$login.'", pwd = "'.$pwd.'", email = "'.$email.'", WHERE login = "'.$login.'"');
        return $stmt->execute();
    }

    public function delete($login)
    {
        $login = $this->escapeChar($login);
        $stmt = $this->conn->query('DELETE FROM users WHERE login = "'.$login.'"');
        return $stmt->execute();
    }

    protected function escapeChar($str)
    {
        $stmt = $this->conn->quote(htmlspecialchars(strip_tags(addslashes($str))));
        return $stmt;
    }

    protected function safePwd($pwd)
    {
        return md5($pwd . "lO$0s");
    }
}


