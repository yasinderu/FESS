<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_fuzzy extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('M_fuzzy');
		$this->load->model('M_edit');
	}

	public function index()
	{			
   		$this->load->view('user_biasa');
		
	}

	    public function fuzzy(){
		if (isset($_POST['kirim'])) {
			$J_bencana = $this->input->post('jarakBencana', true);
			$J_sumberAir = $this->input->post('jarakSumberAir', true);
			$J_tempatIbadah = $this->input->post('jarakTempatIbadah', true);
			$J_layasehat = $this->input->post('jarakLayasehat', true);
			$J_pemukiman = $this->input->post('jarakPemukiman', true);

			#$id = $this->M_fuzzy->id_terakhir();

			#batas bawah-atas jarak bencana
			$b_bencanaDekat = $this->M_fuzzy->BBdekat_bencana();
			$b_bencanaJauh = $this->M_fuzzy->BBjauh_bencana();
			$a_bencanaDekat = $this->M_fuzzy->BAdekat_bencana();
			$a_bencanaJauh = $this->M_fuzzy->BAjauh_bencana();

			#batas bawah-atas jarak sumber air
			$b_sumberAirDekat = $this->M_fuzzy->BBdekat_sumberAir();
			$b_sumberAirJauh = $this->M_fuzzy->BBjauh_sumberAir();
			$a_sumberAirDekat = $this->M_fuzzy->BAdekat_sumberAir();
			$a_sumberAirJauh = $this->M_fuzzy->BAjauh_sumberAir();

			#batas bawah-atas jarak tempat ibadah
			$b_tempatIbadahDekat = $this->M_fuzzy->BBdekat_tempatIbadah();
			$b_tempatIbadahJauh = $this->M_fuzzy->BBjauh_tempatIbadah();
			$a_tempatIbadahDekat = $this->M_fuzzy->BAdekat_tempatIbadah();
			$a_tempatIbadahJauh = $this->M_fuzzy->BAjauh_tempatIbadah();

			#batas bawah-atas jarak layanan kesehatan
			$b_layasehatDekat = $this->M_fuzzy->BBdekat_layasehat();
			$b_layasehatJauh = $this->M_fuzzy->BBjauh_layasehat();
			$a_layasehatDekat = $this->M_fuzzy->BAdekat_layasehat();
			$a_layasehatJauh = $this->M_fuzzy->BAjauh_layasehat();

			#batas bawah-atas jarak pemukiman
			$b_pemukimanDekat = $this->M_fuzzy->BBdekat_pemukiman();
			$b_pemukimanJauh = $this->M_fuzzy->BBjauh_pemukiman();
			$a_pemukimanDekat = $this->M_fuzzy->BAdekat_pemukiman();
			$a_pemukimanJauh = $this->M_fuzzy->BAjauh_pemukiman();

			#batas bawah-atas kelayakan posko
			$b_kelayakanBaik = $this->M_fuzzy->BBbaik_kelayakan();
			$b_kelayakanBuruk = $this->M_fuzzy->BBburuk_kelayakan();
			$a_kelayakanBaik = $this->M_fuzzy->BAbaik_kelayakan();
			$a_kelayakanBuruk = $this->M_fuzzy->BAburuk_kelayakan();

			#membership function jarak bencana
			if ($J_bencana <= $a_bencanaDekat && $J_bencana >= $b_bencanaDekat) {
				$m_fucBencanaDekat = ($a_bencanaDekat - $J_bencana)/($J_bencana - $b_bencanaDekat);
			}else{
				$m_fucBencanaDekat = 0;
			}

			if ($J_bencana <= $a_bencanaJauh && $J_bencana >= $b_bencanaJauh) {
				$m_fucBencanaJauh = ($J_bencana - $b_bencanaJauh)/($a_bencanaJauh - $J_bencana);
			}else{
				$m_fucBencanaJauh = 0;
			}

			#membership function jarak sumber air
			if ($J_sumberAir <= $a_sumberAirDekat && $J_sumberAir >= $b_sumberAirDekat) {
				$m_fucSumberAirDekat = ($a_sumeberAirDekat - $J_sumberAir)/($J_sumberAir - $b_sumberAirDekat);
			}else{
				$m_fucSumberAirDekat = 0;
			}

			if ($J_sumberAir <= $a_bencanaJauh && $J_sumberAir >= $b_sumberAirJauh) {
				$m_fucSumberAirJauh = ($J_sumberAir - $b_sumberAirJauh)/($a_sumberAirJauh - $J_sumberAir);
			}else{
				$m_fucSumberAirJauh = 0;
			}

			#membership function jarak tempat ibadah
			if ($J_tempatIbadah <= $a_tempatIbadahDekat && $J_tempatIbadah >= $b_tempatIbadahDekat) {
				$m_fucTempatIbadahDekat = ($a_tempatIbadahDekat - $J_tempatIbadah)/($J_tempatIbadah - $b_tempatIbadahDekat);
			}else{
				$m_fucTempatIbadahDekat = 0;
			}

			if ($J_tempatIbadah <= $a_tempatIbadahJauh && $J_tempatIbadah >= $b_tempatIbadahJauh) {
				$m_fucTempatIbadahJauh = ($J_tempatIbadah - $b_tempatIbadahJauh)/($a_tempatIbadahJauh - $J_tempatIbadah);
			}else{
				$m_fucTempatIbadahJauh = 0;
			}

			#membership function jarak layanan kesehatan
			if ($J_layasehat <= $a_layasehatDekat && $J_layasehat >= $b_layasehatDekat) {
				$m_fucLayasehatDekat = ($a_layasehatDekat - $J_layasehat)/($J_layasehat - $b_layasehatDekat);
			}else{
				$m_fucLayasehatDekat = 0;
			}

			if ($J_layasehat <= $a_layasehatJauh && $J_layasehat >= $b_layasehatJauh) {
				$m_fucLayasehatJauh = ($J_layasehat - $b_layasehatJauh)/($a_layasehatJauh - $J_layasehat);
			}else{
				$m_fucLayasehatJauh = 0;
			}

			#membership function jarak pemukiman
			if ($J_pemukiman <= $a_pemukimanDekat && $J_pemukiman >= $b_pemukimanDekat) {
				$m_fucPemukimanDekat = ($a_pemukimanDekat - $J_pemukiman)/($J_pemukiman - $b_pemukimanDekat);
			}else{
				$m_fucPemukimanDekat = 0;
			}

			if ($J_pemukiman <= $a_pemukimanJauh && $J_pemukiman >= $b_pemukimanJauh) {
				$m_fucPemukimanJauh = ($J_pemukiman - $b_pemukimanJauh)/($a_pemukimanJauh - $J_pemukiman);
			}else{
				$m_fucPemukimanJauh = 0;
			}

			# rule

			// IF  sumber air DEKAT OR pusat kesehatan DEKAT THEN baik
			// IF  lokasi bencana DEKAT AND pemukiman DEKAT THEN buruk
			// IF sumber air DEKAT or pemukiman DEKAT THEN baik
			// IF pemukiman JAUH OR sumber air JAUH THEN buruk
			// IF tempat ibadah DEKAT AND pusat kesehatan DEKAT THEN baik

			$rule_1 = max($m_fucSumberAirDekat, $m_fucLayasehatDekat);
			$rule_2 = min($m_fucBencanaDekat, $m_fucPemukimanDekat);
			$rule_3 = max($m_fucSumberAirDekat, $m_fucPemukimanDekat);
			$rule_4 = max($m_fucPemukimanJauh, $m_fucSumberAirJauh);
			$rule_5 = min($m_fucTempatIbadahDekat, $m_fucLayasehatDekat);

			if ($rule_1 != 0) {
				$r1 = ($rule_1 * ($a_kelayakanBaik - $b_kelayakanBaik)) + $b_kelayakanBaik;
			}else {
				$r1 = 1;
			}

			if ($rule_2 != 0) {
				$r2 = $a_kelayakanBuruk - ($rule_2 * ($a_kelayakanBuruk - $b_kelayakanBuruk));
			}else {
				$r2 = 1;
			}

			if ($rule_3 != 0) {
				$r3 = ($rule_3 * ($a_kelayakanBaik - $b_kelayakanBaik)) + $b_kelayakanBaik;
			}else {
				$r3 = 1;
			}

			if ($rule_4 != 0) {
				$r4 = $a_kelayakanBuruk - ($rule_4 * ($a_kelayakanBuruk - $b_kelayakanBuruk));
			} else {
				$r4 = 1;
			}

			if ($rule_5 != 0) {
				$r5 = ($rule_5 * ($a_kelayakanBaik - $b_kelayakanBaik)) + $b_kelayakanBaik;
			}else {
				$r5 = 1;
			}

			$hasil = (($r1 * $rule_1) + ($r2 * $rule_2) + ($r3 * $rule_3) + ($r4 * $rule_4) + ($r5 * $rule_5))/($rule_1 + $rule_2 + $rule_3 + $rule_4 + $rule_5);

			$data = array(
				'hasil' => $hasil,
				'jarak_bencana' => $J_bencana,
				'jarak_sumberair' => $J_sumberAir,
				'jarak_tempatibadah' => $J_tempatIbadah,
				'jarak_layasehat' => $J_layasehat,
				'jarak_pemukiman' => $J_pemukiman
			);

			// Masukkan ke DB
			
			$insertM = $this->M_edit->inputM($data, 'input');
			redirect(base_url().'BasisPengetahuan/tampilHasil');			

		}
    }
}