<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 *  =================================================
 *  Author      : MUHAMMAD SURYA IHSANUDDIN
 *  Email       : mutofiyah@gmail.com
 *  FB          : http://www.facebook.com/AdenKejawen
 *  Kaskus ID   : 4d3nk3j4w3n
 *  Blog        : http://belajarcoding.com
 *  =================================================
 *  
 *  Code ini ditulis menggunakan Netbeans IDE 7.0.1 dengan Sistem Operasi Windows 7 Ultimate Edition.
 *  Dilarang merubah, mendistribusikan ulang baik sebagaian maupun keseluruhan code dalam program ini tanpa sepengetahuan dari Author
 */
class Home extends MX_Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        if(!$this->session->userdata('p3nj4dw4l4n_L0993d')){
            redirect('home/login');
        }
        $this->load->view('main');
    }
    
    public function login(){
        $this->load->view('login');
    }
    
    public function proses(){
        require_once CORELIBRARY.'Form_validation'.EXT;
        $validate   = new CI_Form_validation();
        $validate->set_rules('username', 'Username', 'required|max_length[12]|trim|xss_clean');
        $validate->set_rules('password', 'Password', 'required|trim|xss_clean|md5');
        $user       = $this->input->post('username');
        $password   = $this->input->post('password');//md5(md5(md5($this->input->post('password'))));
        $query      = $this->db->where('uname',$user)
                    ->where('upass',$password)
                    ->get('user');
        if($query->num_rows() == '1'){
            $userdata = $query->row();
            $sess   = array(
                'p3nj4dw4l4n_L0993d'    => TRUE,
                'username'              => $userdata->uname,
                'level'                 => $userdata->ugroup
            );
            $this->session->set_userdata($sess);
            $msg    = array(
                'status'    => 'ok',
                'redirect'  => site_url('home')
            );
        }else{
            $msg    = array(
                'status'    => 'error',
                'msg'       => 'Username dan Password Tidak Sesuai'
            );
        }
        echo json_encode($msg);
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect('home');
    }
	
	public function login(){
    }
	
	public function saveSetup(){
    }
}