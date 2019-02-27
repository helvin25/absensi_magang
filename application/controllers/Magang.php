<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magang extends CI_Controller {
	public function __construct()
	{
        parent::__construct();
        $this->load->helper('file');
        $this->load->model('AdminModel');
    }
    
    public function index()
    {
        $this->load->view("magang/index");
    }

    public function cekabsen(){
        if($this->input->post()){
            $post = $this->input->post();
            $this->form_validation->set_rules('nim','NIM','required');

            if($this->form_validation->run()){
                $user = $this->AdminModel->statusAbsen($post['nim']);

                if($user->num_rows() == 0 && strtotime(date('d-m-Y H:i:s')) > strtotime(date('d-m-Y 09:00:00'))){ // untuk tidak bisa absen ketika jam lebih jam 9
                    echo json_encode(['status'=>false,'message'=>'Anda sudah melebihi jam untuk absensi', 'data' => date('H')]);
                    return false;
                }elseif(date('d-m-Y H:i:s')<date('d-m-Y 06:00:00')){ //kurang dari jam 6 pagi belum saatnya absen
                    echo json_encode(['status'=>false,'message'=>'Belum saatnya absen, Absen dimulai jam 6 pagi']);
                    return false;
                }
                $datanim = $this->db->where('nim',$post['nim'])->get('user')->num_rows();

                if($datanim == 0){
                    echo json_encode(['status'=>false,'message'=>'NIM salah atau belum terdaftar']);
                }else{
                    //cek user status masuk
                    if($user->num_rows() != 0 && strtotime(date('d-m-Y H:i:s')) < strtotime(date('d-m-Y 15:30:00'))) {
                        echo json_encode(['status'=>false,'message'=>'Belum Saatnya Pulang !!!']);
                    }else if($user->num_rows() != 0) {
                        if($user->row()->abs_keluar != null){
                            echo json_encode(['status'=>false,'message'=>'Anda Sudah Absen Keluar Hari Ini!']);
                        }else{
                            echo json_encode(['status'=>true, 'action'=>'out']);
                        }
                    }else{
                        echo json_encode(['status'=>true,'action'=>'in']);
                    }
                }
            }
        }
    }

    public function masuk()
    {
        if($this->input->post()) {
            $post = $this->input->post();
            $this->form_validation->set_rules('nim', 'Nim', 'required');
            $this->form_validation->set_rules('foto', 'Foto', 'required');

            if($this->form_validation->run()) {
                $now = strtotime(date('d-m-Y H:i:s'));
                if($now <= strtotime(date('d-m-Y 07:00:00'))){ //H=hours(jam)
                    $ket = "Tepat";
                }else{
                    $ket = "Terlambat";
                }
                //save file foto di komputer
                $foto = str_replace('data:image/jpeg;base64,', '', $post['foto']);
                $file_name = $post['nim'] . '-' . time() . '.jpg';
                write_file(FCPATH . 'assets/foto/' . $file_name, base64_decode($foto));
                //insert data database
                $this->AdminModel->insertAbsen([
                    'nim'         => $post['nim'],
                    'abs_masuk'   => date('Y-m-d H:i:s'),
                    'ket_masuk'   => $ket,
                    'foto_masuk'  => $file_name,
                    ]);
                echo json_encode(['status'=>true]);
            }else{
                echo json_encode(['result' => false]);
            }

        }

    }

    public function keluar()
    {
        if($this->input->post()){
            $post = $this->input->post();
            $this->form_validation->set_rules('nim','Nim','required');
            $this->form_validation->set_rules('foto','Foto','required');
            
            if($this->form_validation->run())
            {
                $id_user = $this->AdminModel->statusAbsen($post['nim'])->row()->id;
                $foto = str_replace('data:image/jpeg;base64,','',$post['foto']);
                $file_name = $post['nim'] . '-' . time() . '.jpg';
                write_file(FCPATH . 'assets/foto/' . $file_name, base64_decode($foto));
                //masuk ke database
                $this->AdminModel->updateAbsen($id_user, [
                    'abs_keluar' => date('Y-m-d H:i:s'),
                    'foto_keluar' => $file_name,
                ]);
                echo json_encode(['status'=>true]);
            }
        }else{
            echo json_encode(['result' => false]);
        }
    }

}