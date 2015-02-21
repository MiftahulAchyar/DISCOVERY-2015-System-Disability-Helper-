<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Boy extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('base_model','base');

	}	

		private $allscript = "
		<script src='http://localhost/i_boy/asset/js/jquery.js'></script>
		<script src='http://localhost/i_boy/asset/js/angular.min.js'></script>
		<script src='http://localhost/i_boy/asset/js/bootstrap.min.js'></script>
		<script src='http://localhost/i_boy/asset/js/moment.js'></script>
		<script src='http://localhost/i_boy/asset/js/jquery-ui.min.js'></script>
		<script src='http://localhost/i_boy/asset/js/velocity.js'></script>
		";

		private $allstyle = "
		<link rel='stylesheet' href='http://localhost/i_boy/asset/css/materialdesignicons.css'>
		<link rel='stylesheet' href='http://localhost/i_boy/asset/css/bourbone.css'>
		<link rel='stylesheet' href='http://localhost/i_boy/asset/css/jquery-ui.min.css'>
		<link rel='stylesheet' href='http://localhost/i_boy/asset/css/jquery-ui.structure.min.css'>
		<link rel='stylesheet' href='http://localhost/i_boy/asset/css/bootstrap.min.css'>
		<link rel='stylesheet' href='http://localhost/i_boy/asset/css/bootstrap-theme.min.css'>
		";

		private $jquery = "
		<script src='http://localhost/i_boy/asset/js/jquery.js'></script>
		";

		private $bootstrapcss = "
		<link rel='stylesheet' href='http://localhost/i_boy/asset/css/bootstrap.min.css'>
		<link rel='stylesheet' href='http://localhost/i_boy/asset/css/bootstrap-theme.min.css'>
		";

		private $bootstrapjs = "
		<script src='http://localhost/i_boy/asset/js/bootstrap.min.js'></script>	
		";

		private $uicss = "
		<link rel='stylesheet' href='http://localhost/i_boy/asset/css/jquery-ui.min.css'>
		";

		private $uijs = "
		<script src='http://localhost/i_boy/asset/js/jquery-ui.min.js'></script>
		";

	public function index($konten='')
	{
		if((!$this->session->userdata('nama_admin'))&&($konten!=''))
		{
			$data['username']='nama_admin';
			$data['target']=base_url('boy/cek_login/super_user');
			$this->session->set_flashdata('error_login','Anda belum login');
			$this->load->view('login_view',$data);
		}
		else if(!$this->session->userdata('nama_admin')&&($konten==''))
		{
			$data['username']='nama_admin';
			$data['target']=base_url('boy/cek_login/super_user');
			$this->load->view('login_view',$data);
		}
		else{ 
			switch ($konten) {
				case 'pelatihan_view':

					$this->load->library('pagination');
					$config['base_url']=base_url('boy/index/pelatihan_view');
					$config['total_rows'] = $this->db->get('pelatihan')->num_rows();
					$config['per_page'] = 4;
					$config['num_links'] = 5;
					
					$this->pagination->initialize($config);
					$this->load->model('pelatihan_model','pelatihan');
					if(!$this->uri->segment(4))
						$uri=0;
					else
						$uri=$this->uri->segment(4);
					$pelatihan = $this->base->getlimit('pelatihan',$uri,$config['per_page'],'tanggal','desc');
					$var=array('pelatihan'=>$pelatihan);
					break;
				case 'albana_view':
					$this->load->library('pagination');
					$config['base_url']=base_url('boy/index/albana_view');
					$config['total_rows'] = $this->db->get('albana')->num_rows();
					$config['per_page'] = 4;
					$config['num_links'] = 5;
					
					$this->pagination->initialize($config);
					$this->load->model('albana_model','albana');
					if(!$this->uri->segment(4))
						$uri=0;
					else
						$uri=$this->uri->segment(4);
					$albana = $this->base->getlimit('albana',$uri,$config['per_page'],'id','desc');
					$var=array('albana'=>$albana);
					break;
				case 'user_view':
					$this->load->library('pagination');
					$config['base_url']=base_url('boy/index/user_view');
					$config['total_rows'] = $this->db->get('user')->num_rows();
					$config['per_page'] = 6;
					$config['num_links'] = 5;
					
					$this->pagination->initialize($config);
					if(!$this->uri->segment(4))
						$uri=0;
					else
						$uri=$this->uri->segment(4);
					$user = $this->base->getlimit('user',$uri,$config['per_page'],'id','asc');
					$var=array('user'=>$user);
					break;
				default:
					$konten='dashboard_view';
					$var='';
					break;
			}
			$data['konten']=$this->load->view($konten,$var,true);
			$this->load->view('1',$data);
		}
	}

	public function cek_login($tabel)
	{

		if($tabel=='user')
			{
				$uri='user';
				$nama='email';
				$con='i';
				$rule='valid_email';
			}
		else
			{
				$uri='super_user';
				$nama='nama';
				$con='boy';
				$rule='';
			}
		$this->load->library('form_validation');
		$this->form_validation->set_rules($nama, $nama, 'trim|'.$rule.'|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run()==TRUE)
		{
			$username=$this->input->post($nama);
			if($tabel=='user')
				$password=$this->input->post('password');
			else
				$password=md5($this->input->post('password'));
			$this->load->model('login_model','login');
			$valid=$this->login->cek($tabel,$nama,$username,$password);
			if($valid==true)
			{
				if($tabel=='user')
				{$data_lain=$this->db->query("select * from user where email = '".$username."'")->result_array();
				foreach ($data_lain as $data_lain) {
					$userdata = array('nama_user' => $username,'data_lain'=>$data_lain['nama'],'id'=>$data_lain['id']);	
				}}
				else
				$userdata = array('nama_admin' => $username);	
				$this->session->set_userdata( $userdata );
				$this->session->set_flashdata('error_login','Username atau Password anda salah');
				redirect($con);
			}		
			else
			{
				$this->session->set_flashdata('error_login','Username atau Password anda salah');
				redirect($con.'/login');
			}
		}
		else
		{
			$data['username']=$nama;
			$data['target']=base_url('boy/cek_login/'.$uri);
			$this->load->view('login_view',$data);
		}
	}

	public function logout($con)
	{
		$this->session->sess_destroy();
		redirect($con);
	}

	public function update_pelatihan($id,$banner)
	{

		if($_FILES['userfile']['size']!=0)
		{
			$config['allowed_types']='jpg|jpeg|png';
			$config['upload_path']=realpath(APPPATH.'../asset/img/image/');
			$config['overwrite']=TRUE;
			$config['file_name']=$banner;
			$this->load->library('upload',$config);
			$this->upload->do_upload();
		}

		$judul=$this->input->post('judul');
		$tanggal=$this->input->post('tanggal');
		$tempat=$this->input->post('tempat');
		$penyelenggara=$this->input->post('penyelenggara');
		$kategori=$this->input->post('kategori');
		$biaya=$this->input->post('biaya');
		$kontak=$this->input->post('kontak');
		$detail=$this->input->post('detail');

		$this->load->model('pelatihan_model','pelatihan');
		$this->pelatihan->update($id,$judul,$tanggal,$tempat,$penyelenggara,$banner,$kategori,$biaya,$kontak,$detail);
		redirect('boy/index/pelatihan_view');
	}

	public function insert_pelatihan()
	{

		$config['file_name'] = 'pelatihan.jpg';
		$config['allowed_types']='jpg|jpeg|png';
		$config['upload_path']=realpath(APPPATH.'../asset/img/image/');

		$this->load->library('upload',$config);
		if($this->upload->do_upload())
		{
		$file=$this->upload->data();
		$this->load->model('pelatihan_model','pelatihan');
		$judul=$this->input->post('judul');
		$tanggal=$this->input->post('tanggal');
		$tempat=$this->input->post('tempat');
		$penyelenggara=$this->input->post('penyelenggara');
		$banner=$file['file_name'];
		$kategori=$this->input->post('kategori');
		$biaya=$this->input->post('biaya');
		$kontak=$this->input->post('kontak');
		$detail=$this->input->post('detail');
		$this->pelatihan->insert($judul,$tanggal,$tempat,$penyelenggara,$banner,$kategori,$biaya,$kontak,$detail);
		redirect('boy/index/pelatihan_view');
		}
		else{
			redirect('boy/form1');
		}
	}

	public function show_detail_pelatihan($id)
	{
		$data=$this->db->query('select detail from pelatihan where id ='.$id)->result_array();
		foreach ($data as $data) 
		{
			$this->load->view('form_detail',$data);
		}
		
	}

	public function delete_pelatihan($id)
	{
		$this->load->helper('file');
		$banner=$this->db->query('select banner from pelatihan where id = '.$id)->result_array();
		delete_files('./asset/img/image/'.$banner[0]['banner']);
		$this->base->delete('pelatihan',array('id'=>$id));
		redirect('boy/index/pelatihan_view');
	}

	public function form1()
	{
		$data['style']=$this->uicss;
		$data['script1']=$this->jquery;
		$data['script2']=$this->uijs;
		$data['drop_down']=$this->base->getall('kategori_pelatihan');
		$data['an']='boy/insert_pelatihan';
		$data['input_judul']='';
		$data['input_tanggal']='';
		$data['input_tempat']='';
		$data['input_penyelenggara']='';
		$data['input_banner']='';
		$data['input_kategori']='';
		$data['input_biaya']='';
		$data['input_kontak']='';
		$this->load->view('form_pelatihan',$data);
	}

	public function form2($id)
	{

		$get=$this->base->getone('pelatihan','id',$id);
		foreach ($get as $get)
		{
		$data['style']=$this->uicss;
		$data['an']='boy/update_pelatihan/'.$id.'/'.$get['banner'];
		$data['image']="<img width='100' src='".base_url('asset/img/image')."/".$get['banner']."'>";
		$data['input_judul']=$get['judul'];
		$data['input_tanggal']=date('d-m-Y',strtotime($get['tanggal']));
		$data['input_tempat']=$get['tempat'];
		$data['input_penyelenggara']=$get['penyelenggara'];
		$data['input_banner']=$get['banner'];
		$data['input_kategori']=$get['kategori'];
		$data['input_biaya']=$get['biaya'];
		$data['input_kontak']=$get['kontak'];
		$data['input_detail']=$get['detail'];
		}
		$data['script1']=$this->jquery;
		$data['script2']=$this->uijs;
		$data['drop_down']=$this->base->getall('kategori_pelatihan');
		$this->load->view('form_pelatihan',$data);
	}


#BAGIAN ALBANA(alat bantu bagi semua :)

	public function update_albana($id,$foto)
	{

		if($_FILES['userfile']['size']!=0)
		{

			$config['allowed_types']='jpg|jpeg|png';
			$config['upload_path']=realpath(APPPATH.'../asset/img/image/');
			$config['overwrite']=TRUE;
			$config['file_name']=$foto;
			$this->load->library('upload',$config);
			$this->upload->do_upload();
		}

		$nama_albana=$this->input->post('nama_albana');
		$pemilik=$this->input->post('pemilik');
		$posisi=$this->input->post('posisi');
		$kategori=$this->input->post('kategori');

		$this->load->model('albana_model','albana');
		$this->albana->update($id,$nama_albana,$foto,$pemilik,$posisi,$kategori);
		redirect('boy/index/albana_view');
	}

	public function insert_albana()
	{
		$config['file_name'] = 'albana.jpg';
		$config['allowed_types']='jpg|jpeg|png';
		$config['upload_path']=realpath(APPPATH.'../asset/img/image/');

		$this->load->library('upload',$config);
		if($this->upload->do_upload())
		{
		$file=$this->upload->data();
		$this->load->model('albana_model','albana');

		$nama_albana=$this->input->post('nama_albana');
		$foto=$file['file_name'];
		if(!$this->session->userdata('nama_admin'))
			$pemilik=$this->input->post('pemilik');
		else
			$pemilik=$this->input->post('pemilik1');
		$posisi=$this->input->post('posisi');
		$kategori=$this->input->post('kategori');

		$this->albana->insert($nama_albana,$foto,$pemilik,$posisi,$kategori);
		if($this->session->userdata('nama_admin'))
			redirect('boy/index/albana_view');
		else
			redirect('i');
		}
		else{
			redirect('boy/form3');
		}
	}

	public function delete_albana($id)
	{
		$this->load->helper('file');
		$foto=$this->db->query('select foto from albana where id = '.$id)->result_array();
		delete_files('./asset/img/image/'.$foto[0]['foto']);		
		$this->base->delete('albana',array('id'=>$id));
		redirect('boy/index/albana_view');
	}

	public function form3()
	{
		if($this->session->userdata('nama_admin'))
		{
			$data['admin']=true;
			$data['dropdown_nama']=$this->db->query('select nama from user')->result_array();	
		}
		else
			$data['input_pemilik']=$this->session->userdata('data_lain');
		$data['style']=$this->uicss;
		$data['script1']=$this->jquery;
		$data['script2']=$this->uijs;
		$data['drop_down']=$this->base->getall('kategori_albana');
		$data['an']='boy/insert_albana';
		$data['input_nama_albana']='';
		$data['input_foto']='';
		$data['input_posisi']='';
		$data['input_kontak']='';
		$data['input_email']='';
		$data['input_kategori']='';
		$this->load->view('form_albana',$data);
	}

	public function form3_admin()
	{
		if($this->session->userdata('nama_admin'))
		{
			$data['admin']=true;
			$data['dropdown_nama']=$this->db->query('select nama from user')->result_array();	
		}
		else
			$data['input_pemilik']=$this->session->userdata('data_lain');
		$data['style']=$this->uicss;
		$data['script1']=$this->jquery;
		$data['script2']=$this->uijs;
		$data['drop_down']=$this->base->getall('kategori_albana');
		$data['an']='boy/insert_albana';
		$data['input_nama_albana']='';
		$data['input_foto']='';
		$data['input_posisi']='';
		$data['input_kontak']='';
		$data['input_email']='';
		$data['input_kategori']='';
		$this->load->view('form_albana_admin',$data);
	}

	public function form4($id)
	{
		$get=$this->base->getone('albana','id',$id);
		$get2=$this->base->getone('user','nama',$get[0]['pemilik']);
		foreach ($get as $get)
		{
		$data['drop_down']=$this->base->getall('kategori_albana');
		$data['an']='boy/update_albana/'.$id.'/'.$get['foto'];
		$data['image']="<img width='100' src='".base_url('asset/img/image')."/".$get['foto']."'>";
		$data['input_nama_albana']=$get['nama_albana'];
		$data['input_foto']=$get['foto'];
		$data['input_pemilik']=$get['pemilik'];
		$data['input_posisi']=$get['posisi'];
		$data['input_kontak']=$get2[0]['telp'];
		$data['input_email']=$get2[0]['email'];
		$data['input_kategori']=$get['kategori'];
		}
		$data['style']=$this->uicss;
		$data['script1']=$this->jquery;
		$data['script2']=$this->uijs;
		$data['pemilik']=$get['pemilik'];
		$data['kontak']=$get2[0]['telp'];
		$data['email']=$get2[0]['email'];

		$this->load->view('form_albana',$data);
	}

	public function form4_admin($id)
	{
		$get=$this->base->getone('albana','id',$id);
		$get2=$this->base->getone('user','nama',$get[0]['pemilik']);
		foreach ($get as $get)
		{
		$data['drop_down']=$this->base->getall('kategori_albana');
		$data['an']='boy/update_albana/'.$id.'/'.$get['foto'];
		$data['image']="<img width='100' src='".base_url('asset/img/image')."/".$get['foto']."'>";
		$data['input_nama_albana']=$get['nama_albana'];
		$data['input_foto']=$get['foto'];
		$data['input_pemilik']=$get['pemilik'];
		$data['input_posisi']=$get['posisi'];
		$data['input_kontak']=$get2[0]['telp'];
		$data['input_email']=$get2[0]['email'];
		$data['input_kategori']=$get['kategori'];
		}
		$data['style']=$this->uicss;
		$data['script1']=$this->jquery;
		$data['script2']=$this->uijs;
		$data['pemilik']=$get['pemilik'];
		$data['kontak']=$get2[0]['telp'];
		$data['email']=$get2[0]['email'];

		$this->load->view('form_albana_admin',$data);
	}

	/*=====================Bagian user===========================*/

	public function update_user($id)
	{
		$awal=$this->base->getone('user','id',$id);
		$nama=$this->input->post('nama');
		$password=$this->input->post('password');
		$email=$this->input->post('email');
		$telp=$this->input->post('telp');

		$this->db->query("update albana set pemilik= '".$nama."' where pemilik = '".$awal[0]['nama']."'");
		$this->load->model('user_model','user');
		$this->user->update($id,$nama,$password,$email,$telp);
		redirect('boy/index/user_view');
	}

	public function insert_user($kondisi='')
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('cpassword', 'Password Konfirmasi', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required');
		$this->form_validation->set_rules('telp', 'Kontak', 'trim|required');

		if($this->form_validation->run()==TRUE)
		{
			$this->load->model('user_model','user');
			$nama=$this->input->post('nama');
			$password=$this->input->post('password');
			$email=$this->input->post('email');
			$telp=$this->input->post('telp');
			$this->user->insert($nama,$password,$email,$telp);
			if($kondisi=='')
				redirect('boy/index/user_view');
			else
			{
				$this->session->set_flashdata("sukses","<div class='alrt'>anda telah terdaftar , silahkan login</div>");
				redirect('i/index');
			}
		}
		else
		{
			if($kondisi=='')
				redirect('boy/index/user_view');
			else
				$data['style']=$this->uicss;
				$data['script1']=$this->jquery;
				$data['script2']=$this->uijs;
				$data['an']='boy/insert_user/front';
				$data['input_nama']='';
				$data['input_password']='';
				$data['input_email']='';
				$data['input_telp']='';

				$this->load->view('form_user',$data);
		}
	}

	public function delete_user($id)
	{
		$data=$this->base->getone('user','id',$id);
		foreach ($data as $data) {
			$this->base->delete('albana',array('pemilik'=>$data['nama']));
		}
		$this->base->delete('user',array('id'=>$id));
		
		redirect('boy/index/user_view');
	}

	public function form5()
	{
		$data['style']=$this->uicss;
		$data['script1']=$this->jquery;
		$data['script2']=$this->uijs;
		$data['an']='boy/insert_user';
		$data['input_nama']='';
		$data['input_password']='';
		$data['input_email']='';
		$data['input_telp']='';

		$this->load->view('form_user',$data);
	}

	public function form5_admin()
	{
		$data['style']=$this->uicss;
		$data['script1']=$this->jquery;
		$data['script2']=$this->uijs;
		$data['an']='boy/insert_user';
		$data['input_nama']='';
		$data['input_password']='';
		$data['input_email']='';
		$data['input_telp']='';

		$this->load->view('form_user_admin',$data);
	}	

	public function form6($id)
	{
		
		$get=$this->base->getone('user','id',$id);
		foreach ($get as $get)
		{
		$data['an']='boy/update_user/'.$id;
		$data['input_nama']=$get['nama'];
		$data['input_password']=$get['password'];
		$data['input_email']=$get['email'];
		$data['input_telp']=$get['telp'];
		}
		$data['style']=$this->uicss;
		$data['script1']=$this->jquery;
		$data['script2']=$this->uijs;
		$this->load->view('form_user',$data);
	}

	public function form6_admin($id)
	{
		
		$get=$this->base->getone('user','id',$id);
		foreach ($get as $get)
		{
		$data['an']='boy/update_user/'.$id;
		$data['input_nama']=$get['nama'];
		$data['input_password']=$get['password'];
		$data['input_email']=$get['email'];
		$data['input_telp']=$get['telp'];
		}
		$data['style']=$this->uicss;
		$data['script1']=$this->jquery;
		$data['script2']=$this->uijs;
		$this->load->view('form_user_admin',$data);
	}

	public function show_detail_user($id)
	{
		$data=$this->base->getone('user','id',$id);
		$barang=$this->db->query("select * from albana where pemilik = '".$data[0]['nama']."'")->result_array();
		$this->load->view('detail_user_view',array('data'=>$data,'barang'=>$barang));
	}
}