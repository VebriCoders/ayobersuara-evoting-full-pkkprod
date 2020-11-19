<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_pemilih extends CI_Controller
{

  public function __construct() {
        parent::__construct();
        $this->load->model('TemaModel');
        $this->load->model('HasilModel');
    }

    public function index() {
        if($this->input->post('login-pemilih')) {
            $this->form_validation->set_message('required', 'Nomor Pemilihan Tidak Boleh Kosong');
            $this->form_validation->set_rules('nomor_pemilih', 'Nomor Pemilih', 'required|trim');
                if($this->form_validation->run() == FALSE)
                {
                  $site = $this->Konfigurasi_model->listing();
                  $data = array(
                      'title'     => 'Register | '.$site['nama_website'],
                      'favicon'   => $site['favicon'],
                      'site'      => $site
                  );
                    $this->load->view('layout/pemilih_login',$data);
                }
                else
                {
                    $this->_loginPemilih();
                }
            }
        else
        {
          $site = $this->Konfigurasi_model->listing();
          $data = array(
              'title'     => 'Register | '.$site['nama_website'],
              'favicon'   => $site['favicon'],
              'site'      => $site
          );
            $this->load->view('layout/pemilih_login',$data);
        }
    }

    private function _loginPemilih() {
        $nomor_pemilih = $this->input->post('nomor_pemilih');
        $user = $this->db->get_where('tbl_pemilih', ["nomor_pemilih" => $nomor_pemilih])->row_array();

        if ($this->session->userdata('id_role') == "1") {
            redirect('pemilih/home');
        }

        if($user) {
          if($user['active'] == 1) {
              if($user['verifikasi_pemilih'] == 1) {
                  if($user['status_logout'] == 0) { //status seharusnya 0
                      $data = [
                          'nomor_pemilih' => $user['nomor_pemilih']
                          // 'status_memilih' => $user['status_memilih']
                      ];
                      $this->session->set_userdata($data);
                      redirect('pemilih/home');
                  } else {
                      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                      Anda Sudah Memilih!</div>');
                      redirect('Auth_pemilih');
                  }
              } else {
                  $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                  Data Anda Belum Diverifikas!</div>');
                  redirect('Auth_pemilih');
              }
          } else {
              $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
              Email Anda Belum Diverifikas!</div>');
              redirect('Auth_pemilih');
          }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data Anda Tidak Terdaftar!</div>');
            redirect('Auth_pemilih');
        }
    }

    public function logout() {
        $this->user['user'] = $this->db->get_where('tbl_pemilih', ['nomor_pemilih'  => $this->session->userdata('nomor_pemilih')])->row_array();
        if($this->user['user'] == "") {
            redirect('Auth_pemilih', 'refresh');
        }

        $this->db->where('nomor_pemilih', $this->user['user']['nomor_pemilih']);
        $this->db->update('tbl_pemilih', ['status_logout' => "1"]);
        $this->session->set_flashdata('berhasil', 'Anda Sudah Berhasil Memilih');
        $this->_logout();
    }

    private function _logout() {
        $this->session->unset_userdata('nomor_pemilih');
        redirect('Auth_pemilih');
    }



    public function register()
    {
       date_default_timezone_set("Asia/Bangkok");
            $this->form_validation->set_message('required', 'Data Tidak Boleh Kosong');
            $this->form_validation->set_rules('nomor_pemilih', 'NIK/NISN', 'required|trim|is_unique[tbl_pemilih.nomor_pemilih]', [
               'is_unique' => 'Nomor Ini Sudah Terdaftar!'
            ]);
            $this->form_validation->set_rules('nama_pemilih', 'Nama Pemilih', 'required|trim');
            $this->form_validation->set_rules('no_telp', 'Nomor Telp/Wa', 'required|trim');
            $this->form_validation->set_rules('alamat_pemilih', 'Alamat Pemilih', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_pemilih.email]', [
                'is_unique' => 'Email Ini Sudah Terdaftar!'
            ]);

            if ($this->form_validation->run() == false) {
              $site = $this->Konfigurasi_model->listing();
              $data = array(
                  'title'     => 'Register | '.$site['nama_website'],
                  'favicon'   => $site['favicon'],
                  'site'      => $site
              );
              $this->load->view('layout/pemilih_daftar',$data);
            } else {
              $email = $this->input->post('email', true);
              $nomor_pemilih = $this->input->post('nomor_pemilih');
              $nama_pemilih = $this->input->post('nama_pemilih');
              $alamat_pemilih = $this->input->post('alamat_pemilih');
              $no_telp = $this->input->post('no_telp');
              $jk = $this->input->post('jk');

              $data = [
                  'nomor_pemilih' => $nomor_pemilih,
                  'nama_pemilih' => $nama_pemilih,
                  'email' => htmlspecialchars($email),
                  'alamat_pemilih' => $alamat_pemilih,
                  'no_telp' => $no_telp,
                  'jk' => $jk,
                  'photo' => 'default.jpg',
                  'pemilih_kategori' => 1,
                  'verifikasi_pemilih' => 0,
                  'status_memilih' => 0,
                  'created_on' => date('Y-m-d  h:i:s a'),
                  'active' => 0,
                  'date_created_email' => time(),
              ];

              // siapkan token
              $token = base64_encode(random_bytes(32));
              $user_token = [
                  'email' => $email,
                  'token' => $token,
                  'date_created_email' => time()
              ];

              $this->db->insert('tbl_pemilih', $data);
              $this->db->insert('tbl_pemilih_token', $user_token);

              $this->_sendEmail($token, 'verify');

              $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please activate your account</div>');

              redirect('Auth_pemilih');
            }
        // $this->template->load('authentication/layout/template', 'authentication/register', $data);
    }

    private function _sendEmail($token, $type)
    {
      $config = [
          'protocol'  => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_user' => 'ayobersuaraevoting@gmail.com',
          'smtp_pass' => '<>()*&^bersuara0890*',
          'smtp_port' => 465,
          'mailtype'  => 'html',
          'charset'   => 'utf-8',
          'newline'   => "\r\n"
      ];

      $this->email->initialize($config);

        $this->email->from('ayobersuaraevoting@gmail.com', 'Verifikasi Pemilih - Ayo Bersuara EVoting');
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
            $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'Auth_pemilih/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'Auth_pemilih/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
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

        $user = $this->db->get_where('tbl_pemilih', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('tbl_pemilih_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created_email'] < (60 * 60 * 24)) {
                    $this->db->set('active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('tbl_pemilih');

                    $this->db->delete('tbl_pemilih_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
                    redirect('Auth_pemilih');
                } else {
                    $this->db->delete('tbl_user', ['email' => $email]);
                    $this->db->delete('tbl_user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                    redirect('Auth_pemilih');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
                redirect('Auth_pemilih');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
            redirect('Auth_pemilih');
        }
    }

}
