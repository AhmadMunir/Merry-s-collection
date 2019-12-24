<?php
  class Email extends CI_Controller
  {
      public function __construct()
      {
          parent::__construct();
          $this->load->model('m_register');
          $this->load->model('user/m_registeruser');
          // $this->load->library('email');
      }

      public function after_update(){
        $this->load->view('email_done');
      }
      public function up_email()
      {
        $username = $this->session->userdata('nama');
        // $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // $code = substr(str_shuffle($set), 0, 12);
        // $data['kode'] = $code;
        // $query = $this->m_registeruser->activate($data, $username);
          $user = $this->m_registeruser->getUser($username);
          // $this->m_register->save($register);
          $this->load->library('mailer');

          $message = "
						<html>
						<head>
							<title>Verification Code</title>
						</head>
						<body>
							<h2>Thank you for Registering.</h2>
							<p>Your Account:</p>
							<p>Please click the link below to verify your Email.</p>
							<h4><a href='".base_url()."email/activate/".$username."/".$user['kode']."'>Verify My Account</a></h4>
						</body>
						</html>
						";

          $email_penerima = $user['email'];
          $subjek = "Registration Verification Email";
          $sendmail = array(
     'email_penerima'=>$email_penerima,
     'subjek'=>$subjek,
     'content'=>$message,
   );

          if (empty($attachment['name'])) { // Jika tanpa attachment
     $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
          } else { // Jika dengan attachment
     $send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
          }

          // echo "<b>".."</b><br />";
          if ($send['status'] == "Sukses") {
              $this->session->set_flashdata('ceke', 'ceke');
              redirect(base_url('user/profile'));
          } else {
              echo "gagal kirim email";
          }
      }
      public function activate()
      {
          $username = $this->uri->segment(3);
          $kode = $this->uri->segment(4);

          $user = $this->m_registeruser->getUser($username);

          if ($user['kode'] == $kode) {
              //update user active status
              $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
              $code = substr(str_shuffle($set), 0, 12);
              $data['kode'] = $code;
              $data['status_email'] = "unverified";
              $query = $this->m_registeruser->activate($data, $username);

              if ($query) {
                  redirect(base_url('email/after_update'));
              } else {
                  echo "error cuy";
              }
          } else {
              $this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
          }
      }


      public function setCode()
      {
          $data = $this->m_register->kode();
          echo json_encode($data);
      }
  }
