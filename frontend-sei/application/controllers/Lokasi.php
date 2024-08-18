<?php
class Lokasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Lokasi_model');
    }

    public function index() {
        $data['lokasi'] = $this->Lokasi_model->get_all();
        $this->load->view('lokasi_list', $data);
    }

    public function create() {
        $this->load->view('lokasi_create');
    }

    public function store() {
        $data = $this->input->post();
        $result = $this->Lokasi_model->create($data);
        redirect('lokasi');
    }

    public function edit($id) {
        
        $data['lokasi'] = $this->Lokasi_model->get_lokasi_by_id($id);
        $this->load->view('lokasi_edit', $data);
    }
    
    public function update() {
        $id = $this->input->post('id');
        $data = array(
            'namaLokasi' => $this->input->post('namaLokasi'),
            'negara' => $this->input->post('negara'),
            'provinsi' => $this->input->post('provinsi'),
            'kota' => $this->input->post('kota')
        );
        $this->Lokasi_model->update($id, $data); // Gunakan update() jika nama metode di model adalah update
        redirect('lokasi');
    }

    public function delete($id) {
        $result = $this->Lokasi_model->delete($id);
        redirect('lokasi');
    }
}
?>
