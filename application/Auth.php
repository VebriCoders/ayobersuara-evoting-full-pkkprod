<?php defined('BASEPATH') or exit('No direct script access allowed');
#=======================================================|
# Simple Code By Pradana Industries By.vebritok_blo     |
#=======================================================|
class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Auth_model');
    }

    public function check_account()
    {
        //validasi login
        $email      = $this->input->post('email');
        $password   = $this->input->post('password');

        //ambil data dari database untuk validasi login
        $query = $this->Auth_model->check_account($email, $password);

        if ($query === 1) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box alert-danger">
        			<div class="info-box-icon">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>Email yang Anda masukkan tidak terdaftar.</div>
        			</div>
        			</p>
            ');
        } elseif ($query === 2) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
              <div class="info-box alert-info">
              <div class="info-box-icon">
              <i class="fa fa-info-circle"></i>
              </div>
              <div class="info-box-content" style="font-size:14">
              <b style="font-size: 20px">GAGAL</b><br>Akun yang Anda masukkan tidak aktif, silakan hubungi Administrator.</div>
              </div>
              </p>'
            );
        } elseif ($query === 3) {
            $this->session->set_flashdata('alert', '<p class="box-msg">
        			<div class="info-box alert-danger">
        			<div class="info-box-icon">
        			<i class="fa fa-warning"></i>
        			</div>
        			<div class="info-box-content" style="font-size:14">
        			<b style="font-size: 20px">GAGAL</b><br>Password yang Anda masukkan salah.</div>
        			</div>
        			</p>
              ');
        } else {
            //membuat session dengan nama userData yang artinya nanti data ini bisa di ambil sesuai dengan data yang login
            $userdata = array(
              'is_login'    => true,
              'id'          => $query->id,
              'password'    => $query->password,
              'id_role'     => $query->id_role,
              'username'    => $query->username,
              'first_name'  => $query->first_name,
              'last_name'   => $query->last_name,
              'email'       => $query->email,
              'phone'       => $query->phone,
              'photo'       => $query->photo,
              'created_on'  => $query->created_on,
              'last_login'  => $query->last_login
            );
            $this->session->set_userdata($userdata);
            return true;
        }
    }
    public function login()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'     => 'Login | '.$site['nama_website'],
            'favicon'   => $site['favicon'],
            'site'      => $site
        );
        //melakukan pengalihan halaman sesuai dengan levelnya
        if ($this->session->userdata('id_role') == "1") {
            redirect('admin/home');
        }
        if ($this->session->userdata('id_role') == "2") {
            redirect('kandidat/home');
        }
        if ($this->session->userdata('id_role') == "3") {
            redirect('panitia/home');
        }

        //proses login dan validasi nya
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[5]|max_length[50]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[22]');
            $error = $this->check_account();

            if ($this->form_validation->run() && $error === true) {
                $data = $this->Auth_model->check_account($this->input->post('email'), $this->input->post('password'));

                //jika bernilai TRUE maka alihkan halaman sesuai dengan level nya
                if ($data->id_role == '1') {
                    //Update Last Login
                    date_default_timezone_set("Asia/Bangkok");
                    $id = $this->session->userdata('id');
                    $data = [
                        'last_login' => date('Y-m-d  h:i:s a'),
                    ];
                    $this->db->where('id', $id)->update('tbl_user', $data);
                    redirect('admin/home');
                } elseif ($data->id_role == '2') {
                    //Update Last Login
                    date_default_timezone_set("Asia/Bangkok");
                    $id = $this->session->userdata('id');
                    $data = [
                        'last_login' => date('Y-m-d  h:i:s a'),
                    ];
                    $this->db->where('id', $id)->update('tbl_user', $data);
                    redirect('kandidat/home');
                }elseif ($data->id_role == '3') {
                    //Update Last Login
                    date_default_timezone_set("Asia/Bangkok");
                    $id = $this->session->userdata('id');
                    $data = [
                        'last_login' => date('Y-m-d  h:i:s a'),
                    ];
                    $this->db->where('id', $id)->update('tbl_user', $data);
                    redirect('panitia/home');
                }


            } else {
                $this->template->load('authentication/layout/template', 'authentication/login', $data);
            }
        } else {
            $this->template->load('authentication/layout/template', 'authentication/login', $data);
        }
    }
    public function logout()
    {
        date_default_timezone_set("Asia/Bangkok");
        $id = $this->session->userdata('id');
        // echo "string ".$id;
        $data = [
            'last_logout' => date('Y-m-d  h:i:s a'),
        ];
        // $this->db->update('tbl_user', $data);
        $this->db->where('id', $id)->update('tbl_user', $data);

        $this->session->sess_destroy();
        redirect('auth/login');
    }

    public function register()
    {
       date_default_timezone_set("Asia/Bangkok");

            $this->form_validation->set_rules('username', 'Username', 'required|trim');
            $this->form_validation->set_rules('first_name', 'Username', 'required|trim');
            $this->form_validation->set_rules('last_name', 'Username', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]', [
                'is_unique' => 'This email has already registered!'
            ]);
            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|max_length[22]|matches[passwordkonfirmasi]', [
                'matches' => 'Password Tidak Sama!',
                'min_length' => 'Password Terlalu Pendek!'
            ]);
            $this->form_validation->set_rules('passwordkonfirmasi', 'Password', 'required|trim|matches[password]');

            if ($this->form_validation->run() == false) {
              $site = $this->Konfigurasi_model->listing();
              $data = array(
                  'title'     => 'Register | '.$site['nama_website'],
                  'favicon'   => $site['favicon'],
                  'site'      => $site
              );
              $this->template->load('authentication/layout/template', 'authentication/register', $data);
            } else {
              $email = $this->input->post('email', true);
              $user = $this->input->post('username');
              $awal = $this->input->post('first_name');
              $akhir = $this->input->post('last_name');
              $phone = $this->input->post('phone');

              $data = [
                  'username' => $user,
                  'first_name' => $awal,
                  'last_name' => $akhir,
                  'phone' => $phone,
                  'photo' => 'default.jpg',
                  'email' => htmlspecialchars($email),
                  'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                  'id_role' => 3,
                  'active' => 0,
                  'created_on' => date('Y-m-d  h:i:s a'),
                  'date_created_email' => time(),
              ];

              // siapkan token
              $token = base64_encode(random_bytes(32));
              $user_token = [
                  'email' => $email,
                  'token' => $token,
                  'date_created_email' => time()
              ];

              $this->db->insert('tbl_user', $data);
              $this->db->insert('tbl_user_token', $user_token);

              $this->_sendEmail($token, 'verify');

              $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please activate your account</div>');

              redirect('auth/login');
            }

        // $this->template->load('authentication/layout/template', 'authentication/register', $data);
    }

    public function forgot_Password()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
          $site = $this->Konfigurasi_model->listing();
          $data = array(
              'title'     => 'Forgot Password  | '.$site['nama_website'],
              'favicon'   => $site['favicon'],
              'site'      => $site
          );
          $this->template->load('authentication/layout/template', 'authentication/forgot_Password', $data);
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('tbl_user', ['email' => $email, 'active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created_email' => time()
                ];

                $this->db->insert('tbl_user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your email to reset your password!</div>');
                redirect('auth/forgot_password');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered or activated!</div>');
                redirect('auth/forgot_password');
            }
        }
    }

    private function _sendEmail($token, $type)
    {
      $config = [
          'protocol'  => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_user' => 'ayobersuaraevoting@gmail.com',
          'smtp_pass' => '<>()*&^bersuara0890*',
          'smtp_port' => 587,
          'mailtype'  => 'html',
          'charset'   => 'utf-8',
          'newline'   => "\r\n",
          'crlf'      => "\r\n"
      ];

      $this->email->initialize($config);

        $this->email->from('ayobersuaraevoting@gmail.com', 'Verifikasi User Ayo Bersuara E-Voting');
        $this->email->to($this->input->post('email'));

        //COBA BUAT TEMPLATE
        // $data_email_smtp = [
        //     'email' => $this->input->post('email'),
        //     'token' => urlencode($token),
        // ];
        // $body = $this->template->load('authentication/email_kirim', 'authentication/email_kirim', $data_email_smtp,TRUE);
        // $body = $this->load->view('authentication/email_kirim',$data_email_smtp,TRUE);

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            // $this->email->message($body);
            $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('tbl_user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created_email'] < (60 * 60 * 24)) {
                    $this->db->set('active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('tbl_user');

                    $this->db->delete('tbl_user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
                    redirect('auth/login');
                } else {
                    $this->db->delete('tbl_user', ['email' => $email]);
                    $this->db->delete('tbl_user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
            redirect('auth/login');
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('tbl_user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth/login');
        }

        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]|matches[passwordkonfirmasi]');
        $this->form_validation->set_rules('passwordkonfirmasi', 'Repeat Password', 'trim|required|min_length[3]|matches[password]');

        if ($this->form_validation->run() == false) {
          $site = $this->Konfigurasi_model->listing();
          $data = array(
              'title'     => 'Change Password  | '.$site['nama_website'],
              'favicon'   => $site['favicon'],
              'site'      => $site
          );
          $this->template->load('authentication/layout/template', 'authentication/change_Password', $data);
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('tbl_user');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('tbl_user_token', ['email' => $email]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
            redirect('auth/login');
        }
    }

}
