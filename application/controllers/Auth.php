<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
        check_already_login();
		$this->load->view('login');
    }
    public function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($post['login'])){
           $this->load->model('user_m');
           $query = $this->user_m->login($post);
           ?>
           <link rel="stylesheet" href="<?=base_url()?>assets/plugins/sweetalert2/sweetalert2.min.css">
            <script src="<?=base_url()?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
            <style>
            body{
                font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                font-size: 1.124em;
                font-weight: normal;
            }
            </style>
            <body></body>
            <?php
           if($query->num_rows()>0){
               $row = $query->row();
               $params = array(
                   'userid' => $row->user_id,
                   'level' => $row->level
               );
               $this->session->set_userdata($params);
               ?>
               <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Selamat, login berhasil'
                }).then((result) => {
                    window.location='<?=site_url('dashboard')?>';
                })
               </script>
               <?php
           }
           else {
            ?>
               <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Failure',
                    text: 'Login gagal, username/password salah'
                }).then((result) => {
                window.location='<?=site_url('auth/login')?>';
                
                })
               </script>
               <?php
           }
        }
    }
    public function logout(){
        $params = array('userid', 'level');
        $this->session->unset_userdata($params);
        redirect('auth/login');
    }
}
