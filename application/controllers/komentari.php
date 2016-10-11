<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Komentari extends Frontend_Controller {
    
       //Dodaj komentar
         function dodaj_komentar($id_oglas){
       
        
        $this->load->model('komentarimodel', 'komentari');
        $data = array(
            'id_oglas' => $id_oglas,
            'id_korisnik' => $this->session->userdata('id_kor'),
            'komentar' => $this->input->post('taKomentar'),
            'datum'=>date('Y-m-d')
        );
        $this->komentari->dodaj_komentar($data);
        redirect(base_url().'postovi/post/'.$id_oglas);
    }
        
}