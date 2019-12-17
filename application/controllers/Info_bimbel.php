<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Info_bimbel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tb_info_bimbel_model');
        $this->load->library('form_validation');        
        $this->load->library('datatables');
    }

    public function index()
    {
        $data = array(
             'active_controller' => 'info_bimbel',
            'active_function' => 'index',
            'topbar' => 'topbar',
            'menu' => 'menu',
        );
       $this->load->view('front/global/index', $data);
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tb_info_bimbel_model->json();
    }

    public function read($id) 
    {
        $row = $this->Tb_info_bimbel_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'bimbel' => $row->bimbel,
                'materi' => $row->materi,
                'tryout' => $row->tryout,
            );
            $this->load->view('tb_info_bimbel/tb_info_bimbel_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_info_bimbel'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tb_info_bimbel/create_action'),
            'id' => set_value('id'),
            'bimbel' => set_value('bimbel'),
            'materi' => set_value('materi'),
            'tryout' => set_value('tryout'),
        );
        $this->load->view('tb_info_bimbel/tb_info_bimbel_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'bimbel' => $this->input->post('bimbel',TRUE),
                'materi' => $this->input->post('materi',TRUE),
                'tryout' => $this->input->post('tryout',TRUE),
            );

            $this->Tb_info_bimbel_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tb_info_bimbel'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tb_info_bimbel_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tb_info_bimbel/update_action'),
                'id' => set_value('id', $row->id),
                'bimbel' => set_value('bimbel', $row->bimbel),
                'materi' => set_value('materi', $row->materi),
                'tryout' => set_value('tryout', $row->tryout),
            );
            $this->load->view('tb_info_bimbel/tb_info_bimbel_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_info_bimbel'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'bimbel' => $this->input->post('bimbel',TRUE),
                'materi' => $this->input->post('materi',TRUE),
                'tryout' => $this->input->post('tryout',TRUE),
            );

            $this->Tb_info_bimbel_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tb_info_bimbel'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tb_info_bimbel_model->get_by_id($id);

        if ($row) {
            $this->Tb_info_bimbel_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tb_info_bimbel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tb_info_bimbel'));
        }
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('bimbel', 'bimbel', 'trim|required');
        $this->form_validation->set_rules('materi', 'materi', 'trim|required');
        $this->form_validation->set_rules('tryout', 'tryout', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Tb_info_bimbel.php */
/* Location: ./application/controllers/Tb_info_bimbel.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-12-17 16:54:39 */
/* http://harviacode.com */