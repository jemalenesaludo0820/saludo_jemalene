<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: UsersModel
 * 
 * Automatically generated via CLI.
 */
class UsersModel extends Model {
    protected $table = 'info'; // pangalan ng table mo
    protected $primary_key = 'id';

    public function page($q = '', $limit = 10, $page = 1) {
        $offset = ($page - 1) * $limit;

        // kung may search query
        if (!empty($q)) {
            $this->db->like('id', $q);
            $this->db->or_like('username', $q);
            $this->db->or_like('email', $q);
        }

        // kunin lahat ng records para malaman total
        $query_all = $this->db->get($this->table);
        $total_rows = count($query_all);

        // kunin records with limit + offset
        if (!empty($q)) {
            $this->db->like('id', $q);
            $this->db->or_like('username', $q);
            $this->db->or_like('email', $q);
        }
        $this->db->limit($limit, $offset);
        $records = $this->db->get($this->table);

        return [
            'records' => $records,
            'total_rows' => $total_rows
        ];
    }
}
