<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('AdminModel');
		if($this->session->userdata('logged_in')!==true) redirect('login', 'refresh');
	}

	public function keluar()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

	//====== Anak Magang ======
	public function add_magang($id_group = null)
	{
		if ($id_group) {
			if($this->input->post()) {
				$post = $this->input->post();
				$this->form_validation->set_rules('nama', 'Nama', 'required');
				$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
				$this->form_validation->set_rules('no_hp', 'No HP', 'required');
	
				if($this->form_validation->run()) 
				{
					$this->AdminModel->addAnakMagang([
						'id_group' => $id_group,
						'nama'     => $post['nama'], 
						'jk'       => $post['jk'], 
						'no_hp'    => $post['no_hp'],
					]);
					$this->session->set_flashdata('sukses', 'Tambah data berhasil!');
					redirect("/admin/anak_magang/$id_group", 'refresh');
				}
			}
			$data['id_group'] = $id_group;
			$this->load->view('admin/add_magang', $data);
		}
	}

	public function anak_magang($id_group=null, $id_user=null)
	{
		if($id_group && $id_user === null){
			if($this->input->post()) {
				$post = $this->input->post();
				$this->form_validation->set_rules('nama', 'Nama', 'required');
				$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
				// $this->form_validation->set_rules('instansi', 'Instansi', 'required');
				$this->form_validation->set_rules('no_hp', 'No HP', 'required');
				// $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required');
				// $this->form_validation->set_rules('tgl_keluar', 'Tanggal Keluar', 'required');

				if($this->form_validation->run()) {
					$this->AdminModel->editAnakMagang($id_group, [
						'nama'       => $post['nama'], 
						'jk'         => $post['jk'], 
						// 'instansi'   => $post['instansi'], 
						'no_hp'      => $post['no_hp'],
						// 'tgl_masuk'  => $post['tgl_masuk'],
						// 'tgl_keluar' => $post['tgl_keluar']
					]);
					$this->session->set_flashdata('sukses', 'Edit data berhasil!');
					redirect('/admin/anak_magang', 'refresh');
				}
			}

			$data['data_magang']=$this->AdminModel->getLihatAnggota($id_group);
			$data['id_group'] = $id_group;
			// die(json_encode($data));
			$this->load->view('admin/anak_magang', $data);
		}elseif($id_group && $id_user){
			$data['data_magang']=$this->AdminModel->getLihatAnggota($id_group)[0];
			$data['id_group'] = $id_group;
			$this->load->view('admin/edit_magang', $data);
		}else {
			$data['data_magang']=$this->AdminModel->getDataAnakMagang();
			// die(json_encode($data));
			$this->load->view('admin/anak_magang', $data );
		}
	}

	public function lihat_group($id=null)
	{
		if($id){
			if($this->input->post()) {
				$post = $this->input->post();
				$this->form_validation->set_rules('id_group', 'Nama', 'required');
				$this->form_validation->set_rules('instansi', 'Instansi', 'required');
				$this->form_validation->set_rules('tgl_masuk', 'tgl_masuk', 'required');
				$this->form_validation->set_rules('tgl_keluar', 'tgl_keluar', 'required');
			}

		}else{
			$data['data_magang']=$this->AdminModel->getDataGroupMagang();
			$this->load->view('admin/lihat_group', $data );
		}
	}

	public function absensi()
	{
		$get = $this->input->get();
		if (@$get['tanggal'] || @$get['group']) {
			$data['data_magang']=$this->AdminModel->getDataAbsensi($get['tanggal'], $get['group']);
			$data['val_group'] = $get['group'];
			$data['val_tanggal'] = $get['tanggal'];
		} else {
			$data['data_magang']=$this->AdminModel->getDataAbsensi();
		}
		$data['group'] = $this->db->get('group')->result();
		$this->load->view('admin/absensi', $data );
	}

	public function hapus_anak_magang($id=null)
	{
		if ($id) {
			$this->AdminModel->hapusAnakMagang($id);
			$this->session->set_flashdata('sukses', 'Hapus data berhasil!');
			redirect('/admin/anak_magang/', 'refresh');
		}
	}

	public function hapus_group($id=null)
	{
		if($id)
		{
			$this->AdminModel->hapusGroup($id);
			$this->session->set_flashdata('sukses', 'Hapus data berhasil!');
			redirect('/admin/lihat_group/', 'refresh');
		}
	}

	public function add_group()
	{
		if($this->input->post()) {
			$post = $this->input->post();
			$this->form_validation->set_rules('kode_group', 'kode_group', 'required');
			$this->form_validation->set_rules('instansi', 'Instansi', 'required');
			$this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required');
			$this->form_validation->set_rules('tgl_keluar', 'Tanggal Keluar', 'required');

			if($this->form_validation->run()) {
				$group = $this->AdminModel->addGroupMagang([
					'kode_group' => $post['kode_group'],
					'instansi'   => $post['instansi'], 
					'tgl_masuk'  => $post['tgl_masuk'],
					'tgl_keluar' => $post['tgl_keluar']
				]);
				$this->session->set_flashdata('sukses', 'Tambah data berhasil!');
				redirect('admin/anak_magang/'.$group, 'refresh');
			}
		}

		$this->load->view('admin/add_group');
	}

	public function edit_group($id=null)
	{
		if($id)
		{
			$group = $this->AdminModel->getDataGroupMagang($id);
			$post = $this->input->post();
			if($group && $post)
			{
				$this->form_validation->set_rules('kode_group', 'kode_group', 'required');
				$this->form_validation->set_rules('instansi', 'Instansi', 'required');
				$this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required');
				$this->form_validation->set_rules('tgl_keluar', 'Tanggal Keluar', 'required');

				if($this->form_validation->run()) {
					$group = $this->AdminModel->editGroup($id, [
						'kode_group' => $post['kode_group'],
						'instansi'   => $post['instansi'], 
						'tgl_masuk'  => $post['tgl_masuk'],
						'tgl_keluar' => $post['tgl_keluar']
					]);
					$this->session->set_flashdata('sukses', 'Edit Group Berhasil!');
					redirect('admin/lihat_group', 'refresh');
				}
			} else if($group) {
				$data['group'] = $group;
				$this->load->view('admin/edit_group',$data);
			}
		}
	}
}

