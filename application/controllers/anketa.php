<?php
if (!defined('BASEPATH'))
 exit('No direct script access allowed');
class Anketa extends CI_Controller {
 public function index() {
 redirect(base_url());
 }
 function odgovori() {
  $this->load->model('home_model');
 $odgovori = $this->input->post('odgovori');
 if ($odgovori) {
 $this->home_model->dodajOdgovor($odgovori);
 $rezultati = $this->home_model->anketeOdgovori();
 $rezultatIspis = '';
 $i = 0;
 foreach ($rezultati as $rezultat) {
 $i++;
 $klasa = '';
 if ($i % 2 == 0) {
 $klasa = 'padding-right-30';
 }
 $rezultatIspis .= '<td class=' . $klasa . '>' . $rezultat['Odgovor'] . ' - ' .
$rezultat['Rezultat'] . '</td>';
 }
 echo json_encode($rezultatIspis, JSON_UNESCAPED_SLASHES);
 }
 }


 function izmeniAnketu($id) {
 $this->load->model('admin_model');
 // HEADER
 $podaci['meni'] = $this->home_model->getMenu();
 //
 $podaci['anketa'] = $this->admin_model->getAnketa($id);
 $podaci['odgovori'] = $this->admin_model->getOdgovoriZaAnketu($id);
 $this->load->view('header', $podaci);
 $this->load->view('content_update_anketa', $podaci);
 $this->load->view('footer');
 }
 function updateAnketa() {
 $odg1 = $this->input->post('odgovor1');
 $odg2 = $this->input->post('odgovor2');
 $id1 = $this->input->post('id1');
 $id2 = $this->input->post('id2');
 $this->load->model('admin_model');
 $this->admin_model->updateAnketaPitanja($id1, $odg1);
 $this->admin_model->updateAnketaPitanja($id2, $odg2);
 redirect(base_url('admin'));
 }
}
