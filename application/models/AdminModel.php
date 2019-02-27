<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

	public function __construct()
	{
        parent::__construct();
    }

    public function CekLogin($user,$pass)
    {

        $login=$this->db->where('username',$user)->where('password',$pass)->get('admin')->result();
        if(count($login)==0)
        {
            return false;
        }else{
            return true;
        }
    }
    
    public function getDataUser()
    {
        return $this->db->get('user')->result();
    }

    public function getDataAnakMagang($id=null)
    {
        $this->db->select('group.instansi, group.tgl_masuk, group.tgl_keluar, user.*');
        $this->db->from('user');
        $this->db->join('group','group.id=user.id_group');
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataGroupMagang($id=null)
    {
        if($id){
                return $this->db->where("id",$id)->get('group')->row();
    
            }else{
    
                return $this->db->get('group')->result();
            }
    }
    public function getLihatAnggota($id=null)
    {
        $this->db->select('group.instansi, group.tgl_masuk, group.tgl_keluar, user.*');
        $this->db->from('user');
        $this->db->join('group','group.id=user.id_group');
        $this->db->where('group.id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    public function getDataAbsensi($tanggal = null, $group = null)
    {
        $this->db->select('user.nim, user.nama, group.instansi, absensi.abs_masuk, absensi.ket_masuk, absensi.foto_masuk, absensi.abs_keluar, absensi.foto_keluar');
        $this->db->from('absensi');
        $this->db->join('user','user.nim = absensi.nim');
        $this->db->join('group','group.id = user.id_group');
        if ($tanggal) {
            $this->db->where('DAY(abs_masuk)', date('d', strtotime($tanggal)) );
        }
        if ($group) {
            $this->db->where('group.id', $group);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function addAnakMagang($data) 
    {
        $last_nim = $this->db->select_max('nim')->get('user')->row('nim');
        $data = array_merge($data, [
            'nim'  => $last_nim+1,
        ]);
        return $this->db->insert('user', $data);
    }

    public function addGroupMagang($data) 
    {
        $this->db->insert('group', $data);
        return $this->db->insert_id();
    }

    public function editAnakMagang($id, $data)
    {
        $this->db->set($data);
        $this->db->where('id', $id);
        return $this->db->update('user');
    }

    public function hapusAnakMagang($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user');
    }

    public function hapusGroup($id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('group');
    }

    public function insertAbsen($data)
    {
        return $this->db->insert('absensi', $data);

    }

    public function updateAbsen($id_user,$data)
    {
        return $this->db->where('id', $id_user)->update('absensi',$data);
    }

    public function statusAbsen($nim)
    {
        $this->db->where('nim',$nim);
        $this->db->where('DAY(abs_masuk)',date('d'));
        return $this->db->get('absensi');
    }

    public function editGroup($id, $data)
    {
        $this->db->set($data);
        $this->db->where('id', $id);
        return $this->db->update('group');
    }
}
