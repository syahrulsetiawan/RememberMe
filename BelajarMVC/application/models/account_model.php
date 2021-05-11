<?php

class account_model
{
    private $tables = 'account';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAccount($username)
    {
        $query = "SELECT * FROM " . $this->tables . " WHERE username=:username";
        $this->db->query($query);
        $this->db->bind('username', $username);
        $this->db->execute();
        return $this->db->singleSet();
    }

    public function registerAccount($data)
    {
        $query = "INSERT INTO account (`id_account`, `username`, `fullname`, `email`, `phone`, `profile_picture`, `reg_date`, `password`) values ('',:user, :fullname, :email, :phone,'','', :pass)";
        $this->db->query($query);
        $this->db->bind('user', $data['username']);
        $this->db->bind('fullname', $data['fullname']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('phone', $data['phone']);
        $this->db->bind('pass', $data['pass']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cekAccount($data)
    {
        $query = "SELECT * FROM account WHERE username = :username OR email = :email OR phone = :phone ";
        $this->db->query($query);
        $this->db->bind('username', $data);
        $this->db->bind('email', $data);
        $this->db->bind('phone', $data);

        return $this->db->singleSet();
    }
}
