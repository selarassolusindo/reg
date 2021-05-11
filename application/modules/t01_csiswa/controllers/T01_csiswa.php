<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T01_csiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T01_csiswa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't01_csiswa?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't01_csiswa?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't01_csiswa';
            $config['first_url'] = base_url() . 't01_csiswa';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T01_csiswa_model->total_rows($q);
        $t01_csiswa = $this->T01_csiswa_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't01_csiswa_data' => $t01_csiswa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('t01_csiswa/t01_csiswa_list', $data);
        $data['_menu'] = '_00_dashboard_menu';
		$data['_view'] = 't01_csiswa/t01_csiswa_list';
        $data['_caption'] = 'Calon Siswa';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function read($id)
    {
        $row = $this->T01_csiswa_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idcsiswa' => $row->idcsiswa,
				'Nama' => $row->Nama,
			);
            $this->load->view('t01_csiswa/t01_csiswa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t01_csiswa'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t01_csiswa/create_action'),
			'idcsiswa' => set_value('idcsiswa'),
			'Nama' => set_value('Nama'),
		);
        // $this->load->view('t01_csiswa/t01_csiswa_form', $data);
        $data['_menu'] = '_00_dashboard_menu';
		$data['_view'] = 't01_csiswa/t01_csiswa_form';
        $data['_caption'] = 'Calon Siswa';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'Nama' => $this->input->post('Nama',TRUE),
			);
            $this->T01_csiswa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t01_csiswa'));
        }
    }

    public function update($id)
    {
        $row = $this->T01_csiswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t01_csiswa/update_action'),
				'idcsiswa' => set_value('idcsiswa', $row->idcsiswa),
				'Nama' => set_value('Nama', $row->Nama),
			);
            // $this->load->view('t01_csiswa/t01_csiswa_form', $data);
            $data['_menu'] = '_00_dashboard_menu';
    		$data['_view'] = 't01_csiswa/t01_csiswa_form';
            $data['_caption'] = 'Calon Siswa';
            $this->load->view('_00_dashboard/_00_dashboard_view', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t01_csiswa'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idcsiswa', TRUE));
        } else {
            $data = array(
				'Nama' => $this->input->post('Nama',TRUE),
			);
            $this->T01_csiswa_model->update($this->input->post('idcsiswa', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t01_csiswa'));
        }
    }

    public function delete($id)
    {
        $row = $this->T01_csiswa_model->get_by_id($id);

        if ($row) {
            $this->T01_csiswa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t01_csiswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t01_csiswa'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('idcsiswa', 'idcsiswa', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t01_csiswa.xls";
        $judul = "t01_csiswa";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");
        xlsBOF();
        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama");
		foreach ($this->T01_csiswa_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->Nama);
			$tablebody++;
            $nourut++;
        }
        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t01_csiswa.doc");
        $data = array(
            't01_csiswa_data' => $this->T01_csiswa_model->get_all(),
            'start' => 0
        );
        $this->load->view('t01_csiswa/t01_csiswa_doc',$data);
    }

}

/* End of file T01_csiswa.php */
/* Location: ./application/controllers/T01_csiswa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-11 10:38:33 */
/* http://harviacode.com */
