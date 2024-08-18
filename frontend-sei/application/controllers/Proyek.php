<?php
class Proyek extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Proyek_model');
        $this->load->model('Lokasi_model');
    }

    public function index()
    {
        $data['proyek'] = $this->Proyek_model->get_all();
        $data['lokasi'] = $this->Lokasi_model->get_all();
        $this->load->view('proyek_list', $data);
    }

    public function create()
    {
        
        $data['lokasi'] = $this->Lokasi_model->get_all();
        $this->load->view('proyek_create', $data);
    }

    public function store()
    {
        $data = $this->input->post();

        // Format data proyek
        $proyek_data = array(
            'namaProyek' => $data['namaProyek'],
            'client' => $data['client'],
            'tglMulai' => $data['tglMulai'],
            'tglSelesai' => $data['tglSelesai'],
            'pimpinanProyek' => $data['pimpinanProyek'],
            'keterangan' => $data['keterangan'],
            'lokasi' => $data['lokasi']
        );

        // Log data untuk debugging
        log_message('debug', 'Data Proyek: ' . print_r($proyek_data, true));

        // Simpan data proyek
        $result = $this->Proyek_model->create($proyek_data);

        // Cek hasil penyimpanan
        if ($result) {
            log_message('debug', 'Proyek berhasil disimpan.');
        } else {
            log_message('debug', 'Gagal menyimpan proyek.');
        }

        // Redirect ke halaman proyek
        redirect('proyek');
    }


    public function edit($id)
    {
        $data['lokasi'] = $this->Lokasi_model->get_all();

        $data['proyek'] = $this->Proyek_model->get_by_id($id);
    
        
        log_message('debug', 'Proyek data: ' . print_r($data['proyek'], true));
    
        
        if (empty($data['proyek'])) {
            show_404(); // Handle case when project is not found
        }
    
        // Load view and pass project data
        $this->load->view('proyek_edit', $data);
    }

    public function update($id)
    {
        $data = $this->input->post();

        // Format data proyek, termasuk ID lokasi yang dipilih
        $proyek_data = array(
            'namaProyek' => $data['namaProyek'],
            'client' => $data['client'],
            'tglMulai' => $data['tglMulai'],
            'tglSelesai' => $data['tglSelesai'],
            'pimpinanProyek' => $data['pimpinanProyek'],
            'keterangan' => $data['keterangan'],
            'lokasi' => isset($data['lokasi']) ? $data['lokasi'] : array() // Pastikan ini adalah array dari ID lokasi yang dipilih
        );

        $result = $this->Proyek_model->update($id, $proyek_data);
        redirect('proyek');
    }

    public function delete($id)
    {
        $result = $this->Proyek_model->delete($id);
        redirect('proyek');
    }
}
?>
