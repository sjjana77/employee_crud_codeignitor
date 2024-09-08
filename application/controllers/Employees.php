<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Employees extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Employee_model');
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['employees'] = $this->Employee_model->get_all_employees();
        $this->load->view('employee_list', $data);
    }

    public function add() {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[employees.email]');
        $this->form_validation->set_rules('department', 'Department', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('add_employee');
        } else {
            $password = substr(md5(rand()), 0, 8); // Generate random password
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'reporting_officer' => $this->input->post('reporting_officer'),
                'department' => $this->input->post('department'),
                'role' => $this->input->post('role')
            ];
            $this->Employee_model->add_employee($data);
            $this->session->set_flashdata('msg', 'Employee added successfully with password: ' . $password);
            redirect('employees');
        }
    }

    public function edit($id) {
        $data['employee'] = $this->Employee_model->get_employee($id);

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('department', 'Department', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('edit_employee', $data);
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'reporting_officer' => $this->input->post('reporting_officer'),
                'department' => $this->input->post('department'),
                'role' => $this->input->post('role')
            ];
            $this->Employee_model->update_employee($id, $data);
            $this->session->set_flashdata('msg', 'Employee updated successfully');
            redirect('employees');
        }
    }

    public function delete($id) {
        $this->Employee_model->delete_employee($id);
        $this->session->set_flashdata('msg', 'Employee deleted successfully');
        redirect('employees');
    }
}
?>
