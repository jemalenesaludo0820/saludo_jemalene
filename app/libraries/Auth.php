<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Library: Auth
 */
class Auth {
    protected $_lava;

    public function __construct()
    {
        $this->_lava = lava_instance();
        $this->_lava->call->database();
        $this->_lava->call->library('session');
    }

    /*
     * Register a new user
     */
    public function register($username, $email, $password, $role = 'user')
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        return $this->_lava->db->table('info')->insert([
            'username'   => $username,
            'email'      => $email,
            'password'   => $hash,
            'role'       => $role,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }

    /*
     * Login user
     */
    public function login($username, $password)
    {
        $user = $this->_lava->db->table('info')
                                ->where('username', $username)
                                ->get();

        // siguruhin na may user at may laman ang password
        if ($user && isset($user['password']) && !empty($user['password'])) {
            if (password_verify($password, $user['password'])) {
                // tama password → save session
                $this->_lava->session->set_userdata([
                    'id'        => $user['id'],
                    'username'  => $user['username'],
                    'role'      => $user['role'],
                    'logged_in' => true
                ]);
                return true;
            }
        }

        return false;
    }

    /*
     * Check if user is logged in
     */
    public function is_logged_in()
    {
        return (bool) $this->_lava->session->userdata('logged_in');
    }

    /*
     * Check user role
     */
    public function has_role($role)
    {
        return $this->_lava->session->userdata('role') === $role;
    }

    /*
     * Logout user
     */
    public function logout()
    {
        $this->_lava->session->unset_userdata(['id','username','role','logged_in']);
    }
}
