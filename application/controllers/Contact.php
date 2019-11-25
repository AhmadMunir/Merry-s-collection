<?php
  class Contact extends CI_Controller
  {
      // public function __construct()
      // {
      //     parent::__construct();
      //     $this->load->model('m_register');
      //     $this->load->model('user/m_registeruser');
      //     // $this->load->library('email');
      // }

      public function index()
      {
          $this->load->view('contact');
      }
      public function kirim_masukan()
      {
          $nama = $this->input->post("nama");
          $email = $this->input->post("email");
          $subjek = $this->input->post('subjek');
          $message = $this->input->post('message');
          //generate simple random code
          $contact = array(
            'nama_user' => $this->input->post("nama"),
            'email'   => $this->input->post("email"),
            'subjek'  => $this->input->post("subjek"),
            'message'  => $this->input->post("message"));
          // $this->m_register->save($register);
          $this->load->library('mailer');

          $message = "
            <html>
            <head>
              <title>Saran & Masukan</title>
            </head>
            <body>
              <h2>Saran dan Masukan</h2>
              <p>Dari : ".$email."</p>
              <p>Subjek: ".$subjek."</p>
              <p>Nama: ".$nama."</p>
              <p>Message: ".$message."</p>
              <p><a href = 'mailto:".$email."?subject = FeedbackFromMerrys&body = tes'>Klik Disini Untuk Membalas</a>
            </body>
            </html>
            ";

          $email_penerima = 'merrys.collection2019@gmail.com';
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
          $this->session->set_flashdata('status', $send['status']);
              $this->load->view('home/contact');
          } else {
            $this->session->set_flashdata('status', $send['status']);
              echo "gagal kirim email";
          }
      }
    }