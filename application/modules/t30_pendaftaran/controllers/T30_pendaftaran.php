<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class T30_pendaftaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T30_pendaftaran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't30_pendaftaran?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't30_pendaftaran?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't30_pendaftaran';
            $config['first_url'] = base_url() . 't30_pendaftaran';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->T30_pendaftaran_model->total_rows($q);
        $t30_pendaftaran = $this->T30_pendaftaran_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't30_pendaftaran_data' => $t30_pendaftaran,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('t30_pendaftaran/t30_pendaftaran_list', $data);
        $data['_menu'] = '_00_dashboard_menu';
		$data['_view'] = 't30_pendaftaran/t30_pendaftaran_list';
        $data['_caption'] = 'Pendaftaran';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function read($id)
    {
        $row = $this->T30_pendaftaran_model->get_by_id($id);
        if ($row) {
            $data = array(
				'idpendaftaran' => $row->idpendaftaran,
				'idsekolah' => $row->idsekolah,
				'TglPendaftaran' => $row->TglPendaftaran,
				'idcalonsiswa' => $row->idcalonsiswa,
			);
            $this->load->view('t30_pendaftaran/t30_pendaftaran_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t30_pendaftaran'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Simpan',
            'action' => site_url('t30_pendaftaran/create_action'),
			'idpendaftaran' => set_value('idpendaftaran'),
			'idsekolah' => set_value('idsekolah'),
			'TglPendaftaran' => set_value('TglPendaftaran'),
			'idcalonsiswa' => set_value('idcalonsiswa'),
		);
        // $this->load->view('t30_pendaftaran/t30_pendaftaran_form', $data);
        $data['_menu'] = '_00_dashboard_menu';
		$data['_view'] = 't30_pendaftaran/t30_pendaftaran_form';
        $data['_caption'] = 'Pendaftaran';
        $this->load->view('_00_dashboard/_00_dashboard_view', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'idsekolah' => $this->input->post('idsekolah',TRUE),
				'TglPendaftaran' => $this->input->post('TglPendaftaran',TRUE),
				'idcalonsiswa' => $this->input->post('idcalonsiswa',TRUE),
			);
            $this->T30_pendaftaran_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t30_pendaftaran'));
        }
    }

    public function update($id)
    {
        $row = $this->T30_pendaftaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Simpan',
                'action' => site_url('t30_pendaftaran/update_action'),
				'idpendaftaran' => set_value('idpendaftaran', $row->idpendaftaran),
				'idsekolah' => set_value('idsekolah', $row->idsekolah),
				'TglPendaftaran' => set_value('TglPendaftaran', $row->TglPendaftaran),
				'idcalonsiswa' => set_value('idcalonsiswa', $row->idcalonsiswa),
			);
            // $this->load->view('t30_pendaftaran/t30_pendaftaran_form', $data);
            $data['_menu'] = '_00_dashboard_menu';
    		$data['_view'] = 't30_pendaftaran/t30_pendaftaran_form';
            $data['_caption'] = 'Pendaftaran';
            $this->load->view('_00_dashboard/_00_dashboard_view', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t30_pendaftaran'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idpendaftaran', TRUE));
        } else {
            $data = array(
				'idsekolah' => $this->input->post('idsekolah',TRUE),
				'TglPendaftaran' => $this->input->post('TglPendaftaran',TRUE),
				'idcalonsiswa' => $this->input->post('idcalonsiswa',TRUE),
			);
            $this->T30_pendaftaran_model->update($this->input->post('idpendaftaran', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t30_pendaftaran'));
        }
    }

    public function delete($id)
    {
        $row = $this->T30_pendaftaran_model->get_by_id($id);

        if ($row) {
            $this->T30_pendaftaran_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t30_pendaftaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t30_pendaftaran'));
        }
    }

    public function _rules()
    {
		$this->form_validation->set_rules('idsekolah', 'idsekolah', 'trim|required');
		$this->form_validation->set_rules('TglPendaftaran', 'tglpendaftaran', 'trim|required');
		$this->form_validation->set_rules('idcalonsiswa', 'idcalonsiswa', 'trim|required');
		$this->form_validation->set_rules('idpendaftaran', 'idpendaftaran', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t30_pendaftaran.xls";
        $judul = "t30_pendaftaran";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Idsekolah");
		xlsWriteLabel($tablehead, $kolomhead++, "TglPendaftaran");
		xlsWriteLabel($tablehead, $kolomhead++, "Idcalonsiswa");
		foreach ($this->T30_pendaftaran_model->get_all() as $data) {
            $kolombody = 0;
            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteNumber($tablebody, $kolombody++, $data->idsekolah);
			xlsWriteLabel($tablebody, $kolombody++, $data->TglPendaftaran);
			xlsWriteNumber($tablebody, $kolombody++, $data->idcalonsiswa);
			$tablebody++;
            $nourut++;
        }
        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t30_pendaftaran.doc");
        $data = array(
            't30_pendaftaran_data' => $this->T30_pendaftaran_model->get_all(),
            'start' => 0
        );
        $this->load->view('t30_pendaftaran/t30_pendaftaran_doc',$data);
    }

}

/* End of file T30_pendaftaran.php */
/* Location: ./application/controllers/T30_pendaftaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-05-11 03:48:54 */
/* http://harviacode.com */
