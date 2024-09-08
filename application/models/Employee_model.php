<?php
class Employee_model extends CI_Model {

    public function get_all_employees() {
        return $this->db->get('employees')->result_array();
    }

    public function get_employee($id) {
        return $this->db->get_where('employees', ['id' => $id])->row_array();
    }

    public function add_employee($data) {
        return $this->db->insert('employees', $data);
    }

    public function update_employee($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('employees', $data);
    }

    public function delete_employee($id) {
        $this->db->where('id', $id);
        return $this->db->delete('employees');
    }
}
?>
