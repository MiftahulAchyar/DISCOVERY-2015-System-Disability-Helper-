<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class I extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('base_model','base');
		date_default_timezone_set('Asia/Jakarta');
		require "style_script.php";
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

	public function index()
	{
		$data['tentang']=$this->load->view('about','',true);
		if(!$this->session->userdata('nama_user'))
		{
			$data['menu1']='login';
			$data['link1']=base_url('i/login');
			$data['menu2']='Registrasi';
			$data['link2']=base_url('i/registrasi');
			$data['link3']=base_url('i/show_albana');
		}
		else
		{
			$data['menu1']='posting';
			$data['link1']=base_url('boy/insert_albana');
			$data['menu2']='logout';
			$data['link2']=base_url('boy/logout/i');
			$data['link3']=base_url('i/show_albana')."/".$this->session->userdata('id');
		}
		$prefs['day_type'] = 'abr';
		$prefs['template'] = '

		   {table_open}<table id="tabelku">
		   {/table_open}

		   {heading_row_start}<tr style="background-color:transparrent;color:white;font-family:calibri;font-size:16px">{/heading_row_start}

		   {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
		   {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
		   {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

		   {heading_row_end}</tr>{/heading_row_end}

		   {week_row_start}<tr>{/week_row_start}
		   {week_day_cell}<td style="padding:1px 4px">{week_day}</td>{/week_day_cell}
		   {week_row_end}</tr>{/week_row_end}

		   {cal_row_start}<tr>{/cal_row_start}
		   {cal_cell_start}<td class="date" style="box-shadow:0px 0px 2px white;padding:4px;text-align:center">{/cal_cell_start}

		   {cal_cell_content}<a style="color:red;font-weight:bold" href="{content}">{day}</a>{/cal_cell_content}
		   {cal_cell_content_today}<div style="color:#FF5555;font-weight:bold"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

		   {cal_cell_no_content}{day}{/cal_cell_no_content}
		   {cal_cell_no_content_today}<div style="color:#FF7F2A;font-weight:bold" class="highlight">{day}</div>{/cal_cell_no_content_today}

		   {cal_cell_blank}&nbsp;{/cal_cell_blank}

		   {cal_cell_end}</td>{/cal_cell_end}
		   {cal_row_end}</tr>{/cal_row_end}

		   {table_close}</table>{/table_close}
		';
		$i=0;
		$prefs['start_day']='monday';
		$prefs['show_next_prev']=FALSE;
		$prefs['next_prev_url']=base_url('i/index');
		$this->load->library('calendar', $prefs);

#Pengambilan tanggal pada bulan ini dan memasukkan link siiiiippp

		$j=0;
		if(!$this->uri->segment(4))
			$data3=$this->db->query("SELECT * FROM pelatihan WHERE MONTH(tanggal) = ".date('m'))->result_array();
		else		
			$data3=$this->db->query("SELECT * FROM pelatihan WHERE MONTH(tanggal) = ".$this->uri->segment(4))->result_array();
		foreach ($data3 as $data3) {
			$tanggal[$j]=explode('-',$data3['tanggal']);
			$link[$j]=$data3['id'];
			$j++;
		}
		$j=0;
		foreach ($tanggal as $tanggal) {
			$prefs[$tanggal[2]]=base_url('i/show_detail_pelatihan').'/'.$link[$j];
			$j++;
		}

		$data['calendar']=$this->calendar->generate($this->uri->segment(3),$this->uri->segment(4),$prefs);

		$data2=$this->db->query('select * from pelatihan')->result_array();
		$this->load->helper('date');
		foreach ($data2 as $data2) {
			$date1=($data2['tanggal']);
			$date2=(date('Y-m-d'));
			$time1=strtotime($date1);
			$time2=strtotime($date2);
			$selisih=($time1-$time2)/60/60/24;

			if(($selisih<=3)&&($selisih>=0))
				{
					$notifikasi[$i]['id']=$data2['id'];
					$notifikasi[$i]['judul']=$data2['judul'];
					$notifikasi[$i]['banner']=$data2['banner'];
					$notifikasi[$i]['tempat']=$data2['tempat'];

					$notifikasi[$i]['selisih']=$selisih;
					$i++;
				}
		}
		$data['notifikasi']=$notifikasi;
		$this->load->helper('text');
		$this->load->view('home_view',$data);
	}

	public function loading(){
		$this->load->view('loading');	
	}

	public function show_pelatihan()
	{
		$this->load->library('pagination');
		$config['base_url']=base_url('i/show_pelatihan');
		$config['total_rows'] = $this->db->get('pelatihan')->num_rows();
		$config['per_page'] = 6;
		$config['num_links'] = 5;
			
		$this->pagination->initialize($config);
		if(!$this->uri->segment(4))
			$uri=0;
		else
			$uri=$this->uri->segment(4);
		$pelatihan = $this->base->getlimit('pelatihan',$uri,$config['per_page'],'tanggal','desc');
		$this->load->view('front_pelatihan_view',array('pelatihan'=>$pelatihan));
	}

	public function show_detail_pelatihan($id)
	{
		$data=$this->base->getone('pelatihan','id',$id);
		$this->load->view('detail_pelatihan',array('data'=>$data));
	}

	public function show_albana($id='')
	{
		if($id!='')
			$data['post_user']=$this->db->query("select * from albana where id='".$id."'")->result_array();
		$data['kategori']=$this->base->getall('kategori_albana');
		$data['penglihatan']=$this->base->getmore('albana',array('kategori'=>'penglihatan'));
		$data['pendengaran']=$this->base->getmore('albana',array('kategori'=>'pendengaran'));
		$data['alat_gerak']=$this->base->getmore('albana',array('kategori'=>'alat_gerak'));
		$data['lainnya']=$this->base->getmore('albana',array('kategori'=>'lainnya'));

		$this->load->view('front_albana_view',$data);
	}

	public function show_kategori_albana($kategori)
	{
		$data=$this->base->getmore('albana',array('kategori'=>$kategori));
	}

	public function show_detail_albana($id)
	{
		$data=$this->base->getmore('albana',array('id'=>$id));
		foreach ($data as $data) {
		$this->load->view('front_detail_view',$data);
		}
	}

	public function login()
	{
		$data['username']='email';
		$data['target']=base_url('boy/cek_login/user');
		$data['judul']='User Login Page';
		$this->load->view('login_view',$data);
	}

	public function show_about()
	{
		$this->load->view('about');	
	}
	public function show_contact()
	{
		$this->load->view('contact');
	}

	public function tes()
	{
		$i=0;
		$data=$this->db->query("SELECT tanggal FROM pelatihan WHERE MONTH(tanggal) = ".date('m'))->result_array();
		foreach ($data as $data) {
			$tanggal[$i]=explode('-',$data['tanggal']);
			$i++;
		}
			
		foreach ($tanggal as $tanggal) {
			echo $tanggal[2]."<br>";
		}
	}
	
	public function registrasi()
	{
		$this->load->library('form_validation');
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
	
	public function post($id)
	{
		if(isset($id))
		{
			$data['style']=$this->uicss;
			$data['script1']=$this->jquery;
			$data['script2']=$this->uijs;
			$data['drop_down']=$this->base->getall('kategori_albana');
			$data['an']='boy/insert_albana';
			$data['input_nama_albana']='';
			$data['input_foto']='';
			$data['input_pemilik']='';
			$data['input_posisi']='';
			$data['input_kontak']='';
			$data['input_email']='';
			$data['input_kategori']='';
			$this->load->view('form_albana',$data);	
		}
		else{
			redirect('i');
		}
	}

	public function cari($kata)
	{
		$this->load->model('search_model','search');
		$result=$this->search->cari($kata);
	}

}