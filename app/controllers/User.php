<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class User extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('user_model');
    }
    public function login()
    {
        $this->call->view('login');
    }
    public function register()
    {
        $this->call->view('register');
    }
    public function sign_up()
    {
        if ($this->form_validation->submitted()) {

            $first_name = $this->io->post('first_name');
            $last_name =   $this->io->post('last_name');
            $email = $this->io->post('email');
            $password = $this->io->post('password');
            $con_password = $this->io->post('con_password');
            if ($password !== $con_password) {
                return set_flash_alert('error', 'Mismatch Password');
            }
            if ($this->user_model->create($last_name, $first_name, $email, $password)) {
                
                $this->session->set_userdata('email', $email);
                $this->send($email);
                redirect('/confirmation');
            } else {
                redirect('/register');
            }
        }
    }
    
    public function verify()
    {
        if ($this->form_validation->submitted()) {
            $email = $this->io->post('email');
            $password = $this->io->post('password');
        }
        $data = $this->user_model->verify($email, $password);
        $user_email = '';
        $user_password = '';
        $status = '';
        if (!empty($data)) {
            foreach ($data as $row) {
                $user_email = $row['email'];
                $user_password = $row['password'];
                $status = $row['status'];
            }
            if ($status === 'pending') {
                set_flash_alert('error', 'Account is pending for activation');
                redirect('/');
            }
            if ($user_email == $email && $password == $user_password) {
                redirect('/home');
            }
        } else {
            set_flash_alert('error', 'Invalid Email or Password');
            redirect('/');
        }
    }
    public function home()
    {
        $this->call->view('home');
    }
    public function confirm()
    {

        $this->call->view('confirmation');
    }

    private function random_number($length = 6)
    {
        $code = '';
        for ($i = 0; $i <= $length; $i++) {
            $code .= rand(0, 9);
        }
        return $code;
    }
    public function activate(){
        $email = $this->session->userdata('email');
        $code = $this->session->userdata('code');
        if ($this->io->post('code') == $code) {
            $this->user_model->activate($email);
            redirect('/home');
        } else {
            set_flash_alert('error', 'Invalid Code');
            redirect('/confirmation');
        }
    }

    public function resend(){
        $email = $this->session->userdata('email');
        $this->send($email);
        redirect('/confirmation');
    }
    public function send($email){
        $code = $this->random_number();
        $this->session->set_userdata('code', $code);;
        $con =  $this->session->userdata('code');
        $this->send_mail($email,'<p>Your confirmation code: <strong>' . $con . '</strong> click this link to redirect to confirmation page <strong> http://localhost:8000/confirmation </strong> </p>', 'D:\Downloads\sddefault.jpg');
    }

    public function send_mail($email,$message,$path)
    {
        $this->call->library('email');
        $this->email->sender('h4ckwiz@gmail.com');
        $this->email->recipient($email);

        $this->email->subject('Confirmation');
        $this->email->email_content($message,'html');
        $this->email->attachment($path);
        $this->email->send();
        echo 'email sent';
    }
}
