<?php
  class Lupapass extends CI_Controller
  {
      public function __construct()
      {
          parent::__construct();
          $this->load->model('m_lupapassword');
          $this->load->model('user/m_registeruser');
          // $this->load->library('email');
      }

      public function index()
      {
        $data['username'] = 'a';
          $this->load->view('lupapassword', $data);
      }

      public function reset(){
        $email = $this->input->post("email");

        $cek = $this->m_lupapassword->cek_email(array('email'=>$email));

        if ($cek>0) {
          // echo "email ada";
          $get =$this->m_lupapassword->get_code(array('email'=>$email));
          foreach ($get as $k) {
            $code = $k->kode;
            $username = $k->username;
            $email = $k->email;
          }

          $this->load->library('mailer');

                 $message = "
       						<html>
       						<head>
       							<title>Reset PASSWORD</title>
       						</head>
       						<body>
       							<h2>Reset password for merrys account</h2>
       							<p>Your Account:</p>
       							<p>Email: ".$email."</p>
                     <p>Username: ".$username."</p>

       							<p>Please click the link below to reset your password.</p>
       							<h4><a href='".base_url()."Lupapass/passreset/".encrypt_url($username)."/".$code."'>Reset Password</a></h4>
       						</body>
       						</html>
       						";

                 $email_penerima = $email;
                 $subjek = "Password RESEt Email";
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
                     // $this->m_register->save($register);
                     $this->session->set_flashdata('success', 'Check your email for reset your password');
                     redirect(base_url("user/login"));
                 } else {
                     echo "gagal kirim email";
                 }
          // echo $kode;
        }else {
          echo "email tidak ada";
        }

      }

   //    public function registeradmin()
   //    {
   //        $nama = $this->input->post("nama");
   //        $username = $this->input->post("username");
   //        $email = $this->input->post("email");
   //        $password = $this->input->post('password');
   //        $notel = $this->input->post("no_telp");
   //        $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   //        $code = substr(str_shuffle($set), 0, 12);
   //
   //
   //        $register = array(
   //          'nama_admin' => $nama,
   //          'email'		=> $email,
   //          'username'	=> $username,
   //          'password'	=> $password,
   //          'no_telp'	=> $notel,
   //          'kode' => $code);
   //        // $this->m_register->save($register);
   //        $this->load->library('mailer');
   //
   //        $message = "
		// 				<html>
		// 				<head>
		// 					<title>WELCOME TO MERRY'S COLLECTION</title>
		// 				</head>
		// 				<body>
		// 					<h2>Thank you for Registering.</h2>
		// 					<p>Your Account:</p>
		// 					<p>Email: ".$email."</p>
   //            <p>Username: ".$username."</p>
		// 					<p>Password: ".$password."</p>
		// 					<p>Please click the link below to activate your account.</p>
		// 					<h4><a href='".base_url()."Register/activate/".$username."/".$code."'>Activate My Account</a></h4>
		// 				</body>
		// 				</html>
		// 				";
   //
   //        $email_penerima = $email;
   //        $subjek = "Registration Verification Email";
   //        $sendmail = array(
   //         'email_penerima'=>$email_penerima,
   //         'subjek'=>$subjek,
   //         'content'=>$message,
   //       );
   //
   //        if (empty($attachment['name'])) { // Jika tanpa attachment
   //            $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
   //        } else { // Jika dengan attachment
   //          $send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
   //        }
   //
   //        // echo "<b>".."</b><br />";
   //        if ($send['status'] == "Sukses") {
   //            $this->m_register->saveadmin($register);
   //            // $this->session->set_flashdata('success', 'Check your email for verify');
   //            redirect(base_url("user/login"));
   //        } else {
   //            echo "gagal kirim email";
   //        }
   //    }
   //
   //
   //    public function add()
   //    {
   //        $username = $this->input->post("username");
   //        $email = $this->input->post("email");
   //        $password = $this->input->post('password');
   //        //generate simple random code
   //        $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   //        $code = substr(str_shuffle($set), 0, 12);
   //
   //
   //        $register = array(
   //          'nama_user' => $this->input->post("nama"),
   //          'email'		=> $this->input->post("email"),
   //          'username'	=> $this->input->post("username"),
   //          'password'	=> $this->input->post("password"),
   //          'no_telp'	=> $this->input->post("no_telp"),
   //          'kode' => $code);
   //        // $this->m_register->save($register);
   //        $this->load->library('mailer');
   //
   //        $message = "
		// 				<html>
		// 				<head>
		// 					<title>Verification Code</title>
		// 				</head>
		// 				<body>
		// 					<h2>Thank you for Registering.</h2>
		// 					<p>Your Account:</p>
		// 					<p>Email: ".$email."</p>
   //            <p>Username: ".$username."</p>
		// 					<p>Password: ".$password."</p>
		// 					<p>Please click the link below to activate your account.</p>
		// 					<h4><a href='".base_url()."Register/activate/".$username."/".$code."'>Activate My Account</a></h4>
		// 				</body>
		// 				</html>
		// 				";
   //
   //        $email_penerima = $email;
   //        $subjek = "Registration Verification Email";
   //        $sendmail = array(
   //   'email_penerima'=>$email_penerima,
   //   'subjek'=>$subjek,
   //   'content'=>$message,
   // );
   //
   //        if (empty($attachment['name'])) { // Jika tanpa attachment
   //   $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
   //        } else { // Jika dengan attachment
   //   $send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
   //        }
   //
   //        // echo "<b>".."</b><br />";
   //        if ($send['status'] == "Sukses") {
   //            $this->m_register->save($register);
   //            $this->session->set_flashdata('success', 'Check your email for verify');
   //            redirect(base_url("user/login"));
   //        } else {
   //            echo "gagal kirim email";
   //        }
   //    }
   //
      public function passreset()
      {
          $username =decrypt_url($this->uri->segment(3));
          $kode = $this->uri->segment(4);

          $user = $this->m_registeruser->getUser($username);

          if ($user['kode'] == $kode) {
              //update user active status
              $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
              $code = substr(str_shuffle($set), 0, 12);
              $data['kode'] = $code;
              // $data['status_email'] = "verified";
              $query = $this->m_registeruser->activate($data, $username);

              if ($query) {
                $data['username'] = encrypt_url($username);
                  $this->load->view('lupapassword', $data);
              } else {
                  echo "error cuy";
              }
          } else {
              echo "link expired";
          }
      }
   //
   //
   //    public function setCode()
   //    {
   //        $data = $this->m_register->kode();
   //        echo json_encode($data);
   //    }
  }
