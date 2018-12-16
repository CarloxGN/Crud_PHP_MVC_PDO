<?php
defined('WEBSITEPATH') OR exit('No direct script access allowed');

include_once 'class/Reports.class.php';
include_once 'class/Users.class.php';
include_once 'class/Countries.class.php';

class controllerReports {
	//Atributos
	private $report;

	//Metodos
	public function __construct() {
		$this->report = new Reports();
	}

	public function createReport($code, $user, $track, $id_concept, $id_transaction, $banc, $cost, $iva, $name_invoice, $rif_invoice, $address_invoice, $contact_invoice, $date, $date_transfer, $status, $stage, $image, $observation){
		$this->report->set('code_report', $code);
		$this->report->set('id_user_report', $user);
		$this->report->set('track_report', $track);
		$this->report->set('id_concept_report', $id_concept);
		$this->report->set('id_transaction_report', $id_transaction);
		$this->report->set('banc_report', $banc);
		$this->report->set('cost_report', $cost);
		$this->report->set('iva_report', $iva);
		$this->report->set('name_invoice_report', $name_invoice);
		$this->report->set('rif_invoice_report', $rif_invoice);
		$this->report->set('address_invoice_report', $address_invoice);
		$this->report->set('contact_invoice_report', $contact_invoice);
		$this->report->set('date_report', $date);
		$this->report->set('date_transfer_report', $date_transfer);
		$this->report->set('status_report', $status);
		$this->report->set('stage_report', $stage);
		$this->report->set('image_report', $image);
		$this->report->set('observation_report', $observation);
		
		$result = $this->report->create_report();
		return $result;
	}

	public function listReportColumn($column, $value) {
		$this->report->set($column, $value);
		$result = $this->report->get_report();
		return $result;
	}

	public function listReportsUser($id_user, $date_start, $date_end) {
		$this->report->set('id_user_report', $id_user);
		$this->report->set('start_date', $date_start);
		$this->report->set('end_date', $date_end);
		$result = $this->report->get_reports_user();
		return $result;
	}

	public function listReports($start, $end) {
		$this->report->set('start_date', $start);
		$this->report->set('end_date', $end);
		$result = $this->report->get_reports();
		return $result;
	}

	public function listReportsReconciled($start, $end) {
		$this->report->set('start_date', $start);
		$this->report->set('end_date', $end);
		$this->report->set('stage_report', 2);
		$result = $this->report->get_reports_filter();
		return $result;
	}

	public function listReportsReview($start, $end, $date_now) {
		$this->report->set('start_date', $start);
		$this->report->set('end_date', $end);
		$this->report->set('date_now', $date_now);
		$this->report->set('stage_report', 1);
		$result = $this->report->get_reports_review();
		return $result;
	}

	public function listReportsNoClosed($start, $end, $date_now) {
		$this->report->set('start_date', $start);
		$this->report->set('end_date', $end);
		$this->report->set('date_now', $date_now);
		$result = $this->report->get_reports_no_closed();
		return $result;
	}

	public function numReports() {
		$result = $this->report->get_num_reports();
		return $result;
	}

	public function deleteReport($id_report) {
		$this->report->set('id_report', $id_report);
		$result = $this->report->delete_report();
		return $result;
	}

	public function updateReport($id_concept, $tracking, $banc, $id_transaction, $name_invoice, $rif_invoice, $address_invoice, $contact_invoice, $cost, $date_transfer, $observation, $id) {
		$this->report->set('id_concept_report', $id_concept);
		$this->report->set('track_report', $tracking);
		$this->report->set('banc_report', $banc);
		$this->report->set('id_transaction_report', $id_transaction);
		$this->report->set('name_invoice_report', $name_invoice);
		$this->report->set('rif_invoice_report', $rif_invoice);
		$this->report->set('address_invoice_report', $address_invoice);
		$this->report->set('contact_invoice_report', $contact_invoice);
		$this->report->set('cost_report', $cost);
		$this->report->set('date_transfer_report', $date_transfer);
		$this->report->set('observation_report', $observation);
		$this->report->set('id_report', $id);
		$result = $this->report->update_report();
		return $result;
	}

	public function changeStatusReport($id, $status){
		$this->report->set('id_report', $id);
		$this->report->set('status_report', $status);
		$data = $this->report->update_status_report();
		return $data;
	}

	public function changeStageReport($id, $stage, $final_cost_report, $final_date_report, $id_user_close_report, $observation_report){
		$this->report->set('id_report', $id);
		$this->report->set('stage_report', $stage);
		$this->report->set('final_cost_report', $final_cost_report);
		$this->report->set('final_date_report', $final_date_report);
		$this->report->set('id_user_close_report', $id_user_close_report);
		$this->report->set('observation_report', $observation_report);
		$data = $this->report->update_stage_report();
		return $data;
	}
}

class controllerUsers {
	private $user;

	public function __construct() {
		$this->user = new Users();
	}

	public function createUser($document, $name, $lastname, $email, $telf, $country, $message) {
		$this->user->set('document_user', 	$document);
		$this->user->set('name_user', 		$name);
		$this->user->set('lastname_user', 	$lastname);
		$this->user->set('email_user', 		$email);
		$this->user->set('phone_user', 		$telf);
		$this->user->set('id_country', 		$country);
		$this->user->set('message_user', 	$message);
		$data = $this->user->insert_user();
		return $data;
	}
	
	public function updateUser($document, $name, $lastname, $email, $telf, $country, $message, $id_user) {
		$this->user->set('document_user', 	$document);
		$this->user->set('name_user', 		$name);
		$this->user->set('lastname_user', 	$lastname);
		$this->user->set('email_user', 		$email);
		$this->user->set('phone_user', 		$telf);
		$this->user->set('id_country', 		$country);
		$this->user->set('message_user', 	$message);
		$this->user->set('id_user', 		$id_user);
		$data = $this->user->update_user();
		return $data;
	}

	public function listUser($user) {
		$this->user->set('id_user', $user);
		$data = $this->user->get_user_multiple();
		return $data;
	}

	public function listUsers() {
		$data = $this->user->get_users_multiple();
		return $data;
	}

	public function validateUser($document) {
		$this->user->set('document_user', $document);
		$data = $this->user->validate_user();
		return $data;
	}

	public function deleteUser($id_user) {
		$this->user->set('id_user', $id_user);
		$data = $this->user->delete_user();
		return $data;
	}
}

class controllerCountries {
	private $country;

	public function __construct() {
		$this->country = new Countries();
	}
	
	public function listCountry($country) {
		$this->country->set('id_country', $country);
		$data = $this->country->get_country();
		return $data;
	}

	public function listCountries() {
		$data = $this->country->get_countries();
		return $data;
	}
}

