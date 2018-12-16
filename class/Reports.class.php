<?php
//include_once 'Database.class.php';
class Reports{
    private static $instance;
    private $id_report;
    private $code_report;
    private $id_user_report;
    private $track_report;
    private $id_concept_report;
    private $id_transaction_report;
    private $banc_report;
    private $cost_report;
    private $iva_report;
    private $name_invoice_report;
    private $rif_invoice_report;
    private $address_invoice_report;
    private $contact_invoice_report;
    private $date_report;
    private $date_transfer_report;
    private $status_report;
    private $stage_report;
    private $image_report;
    private $final_cost_report;
    private $final_date_report;
    private $id_user_close_report;
    private $observation_report;

    private $start_date;
    private $end_date;
    private $date_now;
    private $column;

    private $attrib;
    private $conn;

    public function __construct(){
      $this->conn = new Database();
    }

    public function set($attrib, $content) {
      $this->$attrib = $content;
      $this->column = $attrib;
      $this->attrib = $content;
    }

    public function get($attrib) {
      return $this->$attrib;
    }

    public function get_report(){
      try {
        $this->query = $this->conn->prepare('select * from tbl_reports 
            inner join tbl_users on tbl_reports.id_user_report = tbl_users.id_user 
            inner join tbl_transactions on tbl_reports.id_transaction_report = tbl_transactions.id_transaction 
            inner join tbl_concepts on tbl_reports.id_concept_report = tbl_concepts.id_concept 
            inner join tbl_careers on tbl_users.career_user = tbl_careers.id_career 
            inner join tbl_stages on tbl_reports.stage_report = tbl_stages.id_stage
            where 
            tbl_reports.'.$this->column.' = :value');
        $this->query->bindValue(':value', $this->attrib, PDO::PARAM_INT);
        $this->query->execute();
        $result = $this->query->fetchAll();
        $this->query = null;
        return $result;
      }catch (PDOException $e) {
          $e->getMessage();
      }
    }

    public function get_reports(){
      try {
        $this->query = $this->conn->prepare('select * from tbl_reports 
            inner join tbl_users on tbl_reports.id_user_report = tbl_users.id_user 
            inner join tbl_transactions on tbl_reports.id_transaction_report = tbl_transactions.id_transaction 
            inner join tbl_concepts on tbl_reports.id_concept_report = tbl_concepts.id_concept 
            inner join tbl_careers on tbl_users.career_user = tbl_careers.id_career 
            inner join tbl_stages on tbl_reports.stage_report = tbl_stages.id_stage
            where 
              date_transfer_report between 
                :start_date 
                and 
                :end_date');
        $this->query->bindValue(':start_date', $this->start_date, PDO::PARAM_INT);
        $this->query->bindValue(':end_date', $this->end_date, PDO::PARAM_INT);
        $this->query->execute();
        $result = $this->query->fetchAll();
        $this->query = null;
        return $result;
      }catch (PDOException $e) {
        $e->getMessage();
      }
    }

    public function get_reports_filter(){
      try {
        $this->query = $this->conn->prepare('select * from tbl_reports 
            inner join tbl_users on tbl_reports.id_user_report = tbl_users.id_user 
            inner join tbl_transactions on tbl_reports.id_transaction_report = tbl_transactions.id_transaction 
            inner join tbl_concepts on tbl_reports.id_concept_report = tbl_concepts.id_concept 
            inner join tbl_careers on tbl_users.career_user = tbl_careers.id_career 
            inner join tbl_stages on tbl_reports.stage_report = tbl_stages.id_stage 
            where
              date_transfer_report between 
                :start_date 
                and 
                :end_date
                and
                tbl_reports.stage_report = :stage_report');

        $this->query->bindValue(':stage_report', $this->attrib, PDO::PARAM_INT);
        $this->query->bindValue(':start_date', $this->start_date, PDO::PARAM_INT);
        $this->query->bindValue(':end_date', $this->end_date, PDO::PARAM_INT);
        $this->query->execute();
        $result = $this->query->fetchAll();
        $this->query = null;
        return $result;
      }catch (PDOException $e) {
        $e->getMessage();
      }
    }

    public function get_reports_review(){
      try {
        $this->query = $this->conn->prepare('select * from tbl_reports 
            inner join tbl_users on tbl_reports.id_user_report = tbl_users.id_user 
            inner join tbl_transactions on tbl_reports.id_transaction_report = tbl_transactions.id_transaction 
            inner join tbl_concepts on tbl_reports.id_concept_report = tbl_concepts.id_concept 
            inner join tbl_careers on tbl_users.career_user = tbl_careers.id_career 
            inner join tbl_stages on tbl_reports.stage_report = tbl_stages.id_stage
            where 
              date_transfer_report between 
                :start_date 
                and 
                :end_date
                and
                    :date_now - UNIX_TIMESTAMP(date_transfer_report) < 345600 
                and
                    stage_report = :stage_report
                ');
        $this->query->bindValue(':date_now', $this->date_now, PDO::PARAM_INT);
        $this->query->bindValue(':stage_report', $this->attrib, PDO::PARAM_INT);
        $this->query->bindValue(':start_date', $this->start_date, PDO::PARAM_INT);
        $this->query->bindValue(':end_date', $this->end_date, PDO::PARAM_INT);
        $this->query->execute();
        $result = $this->query->fetchAll();
        $this->query = null;
        return $result;
      }catch (PDOException $e) {
        $e->getMessage();
      }
    }

    public function get_reports_no_closed(){
      try {
        $this->query = $this->conn->prepare('select * from tbl_reports 
            inner join tbl_users on tbl_reports.id_user_report = tbl_users.id_user 
            inner join tbl_transactions on tbl_reports.id_transaction_report = tbl_transactions.id_transaction 
            inner join tbl_concepts on tbl_reports.id_concept_report = tbl_concepts.id_concept 
            inner join tbl_careers on tbl_users.career_user = tbl_careers.id_career 
            inner join tbl_stages on tbl_reports.stage_report = tbl_stages.id_stage
            where 
              date_transfer_report between 
                :start_date 
                and 
                :end_date
                and
                    :date_now - UNIX_TIMESTAMP(date_transfer_report) >= 345600 
                and
                    stage_report = 1
                ');
        // timestampdiff(date_transfer_report, :date_now) > 96 
        $this->query->bindValue(':date_now', $this->date_now, PDO::PARAM_INT);
        $this->query->bindValue(':start_date', $this->start_date, PDO::PARAM_INT);
        $this->query->bindValue(':end_date', $this->end_date, PDO::PARAM_INT);
        $this->query->execute();
        $result = $this->query->fetchAll();
        $this->query = null;
        return $result;
      }catch (PDOException $e) {
        $e->getMessage();
      }
    }

    public function get_reports_user(){
      try {
        $this->query = $this->conn->prepare('select * from tbl_reports 
            inner join tbl_users on tbl_reports.id_user_report = tbl_users.id_user 
            inner join tbl_transactions on tbl_reports.id_transaction_report = tbl_transactions.id_transaction 
            inner join tbl_concepts on tbl_reports.id_concept_report = tbl_concepts.id_concept 
            inner join tbl_careers on tbl_users.career_user = tbl_careers.id_career 
            inner join tbl_stages on tbl_reports.stage_report = tbl_stages.id_stage
          where 
            tbl_reports.id_user_report = :id_user_report 
            and
            date_transfer_report between 
              :start_date 
              and 
              :end_date');
        $this->query->bindValue(':id_user_report', $this->id_user_report, PDO::PARAM_INT);
        $this->query->bindValue(':start_date', $this->start_date, PDO::PARAM_INT);
        $this->query->bindValue(':end_date', $this->end_date, PDO::PARAM_INT);
        $this->query->execute();
        $result = $this->query->fetchAll();
        $this->query = null;
        return $result;
      }catch (PDOException $e) {
        $e->getMessage();
      }
    }

    public function delete_report(){
      try {
          $this->query = $this->conn->prepare('delete from tbl_reports where id_report = :id_report');
          $this->query->bindValue(':id_report', $this->id_report, PDO::PARAM_INT);
          $this->query->execute();
          $result = $this->query->rowCount();
          $this->query = null;
          return $result;
      } catch (PDOException $e) {
          $e->getMessage();
      }
    }

    public function create_report(){
      try {
        //insert into tbl_reports values (null, :code_report, :id_user_report, :track_report, :id_concept_report, :id_transaction_report, :banc_report, :cost_report, :iva_report, :name_invoice_report, :rif_invoice_report, :address_invoice_report, :contact_invoice_report, :date_report, :date_transfer_report, :status_report, :stage_report, :image_report, null, null, null, :observation_report)

        $this->query = $this->conn->prepare('insert into tbl_reports values (null, :code_report, :id_user_report, :track_report, :id_concept_report, :id_transaction_report, :banc_report, :cost_report, :iva_report, :name_invoice_report, :rif_invoice_report, :address_invoice_report, :contact_invoice_report, :date_report, :date_transfer_report, :status_report, :stage_report, :image_report, null, null, null, :observation_report)');
              
        $this->query->bindValue(':code_report', $this->code_report, PDO::PARAM_INT);
        $this->query->bindValue(':id_user_report', $this->id_user_report, PDO::PARAM_INT);
        $this->query->bindValue(':track_report', $this->track_report, PDO::PARAM_INT);
        $this->query->bindValue(':id_concept_report', $this->id_concept_report, PDO::PARAM_INT);
        $this->query->bindValue(':id_transaction_report', $this->id_transaction_report, PDO::PARAM_INT);
        $this->query->bindValue(':banc_report', $this->banc_report, PDO::PARAM_INT);
        $this->query->bindValue(':cost_report', $this->cost_report, PDO::PARAM_INT);
        $this->query->bindValue(':iva_report', $this->iva_report, PDO::PARAM_INT);
        $this->query->bindValue(':name_invoice_report', $this->name_invoice_report, PDO::PARAM_INT);
        $this->query->bindValue(':rif_invoice_report', $this->rif_invoice_report, PDO::PARAM_INT);
        $this->query->bindValue(':address_invoice_report', $this->address_invoice_report, PDO::PARAM_INT);
        $this->query->bindValue(':contact_invoice_report', $this->contact_invoice_report, PDO::PARAM_INT);
        $this->query->bindValue(':date_report', $this->date_report, PDO::PARAM_INT);
        $this->query->bindValue(':date_transfer_report', $this->date_transfer_report, PDO::PARAM_INT);
        $this->query->bindValue(':status_report', $this->status_report, PDO::PARAM_INT);
        $this->query->bindValue(':stage_report', $this->stage_report, PDO::PARAM_INT);
        $this->query->bindValue(':image_report', $this->image_report, PDO::PARAM_INT);
        $this->query->bindValue(':observation_report', $this->observation_report, PDO::PARAM_INT);
        $this->query->execute();
        $result = $this->query->rowCount();
        $this->conn = null;
        return $result;
      } catch (PDOException $e) {
        $e->getMessage();
      }
    }

    public function update_report(){
        try {
           $this->query = $this->conn->prepare('update tbl_reports set 
                id_concept_report = :id_concept_report,
                track_report = :track_report,
                banc_report = :banc_report,
                id_transaction_report = :id_transaction_report,
                name_invoice_report = :name_invoice_report,
                rif_invoice_report = :rif_invoice_report,
                address_invoice_report = :address_invoice_report,
                contact_invoice_report = :contact_invoice_report,
                cost_report = :cost_report,
                date_transfer_report = :date_transfer_report,
                observation_report = :observation_report 
              WHERE 
                id_report = :id_report');

            $this->query->bindValue(':id_concept_report', $this->id_concept_report, PDO::PARAM_INT);
            $this->query->bindValue(':track_report', $this->track_report, PDO::PARAM_INT);
            $this->query->bindValue(':banc_report', $this->banc_report, PDO::PARAM_INT);
            $this->query->bindValue(':id_transaction_report', $this->id_transaction_report, PDO::PARAM_INT);
            $this->query->bindValue(':name_invoice_report', $this->name_invoice_report, PDO::PARAM_INT);
            $this->query->bindValue(':rif_invoice_report', $this->rif_invoice_report, PDO::PARAM_INT);
            $this->query->bindValue(':address_invoice_report', $this->address_invoice_report, PDO::PARAM_INT);
            $this->query->bindValue(':contact_invoice_report', $this->contact_invoice_report, PDO::PARAM_INT);
            $this->query->bindValue(':cost_report', $this->cost_report, PDO::PARAM_INT);
            $this->query->bindValue(':date_transfer_report', $this->date_transfer_report, PDO::PARAM_INT);
            $this->query->bindValue(':observation_report', $this->observation_report, PDO::PARAM_INT);
            $this->query->bindValue(':id_report', $this->id_report, PDO::PARAM_INT);
            $this->query->execute();
            $result = $this->query->rowCount();
            $this->conn = null;
            return $result;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function update_status_report(){
        try {
            $this->query = $this->conn->prepare('update tbl_reports set status_report = :status_report WHERE id_report = :id_report');
            $this->query->bindValue(':status_report', $this->status_report, PDO::PARAM_INT);
            $this->query->bindValue(':id_report', $this->id_report, PDO::PARAM_INT);
            $this->query->execute();
            $result = $this->query->rowCount();
            $this->conn = null;
            return $result;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function update_stage_report(){
        try {
            $this->query = $this->conn->prepare('update tbl_reports set 
                stage_report = :stage_report, 
                final_cost_report = :final_cost_report, 
                final_date_report = :final_date_report, 
                id_user_close_report = :id_user_close_report, 
                observation_report = :observation_report 
                WHERE id_report = :id_report');
            $this->query->bindValue(':stage_report', $this->stage_report, PDO::PARAM_INT);
            $this->query->bindValue(':final_cost_report', $this->final_cost_report, PDO::PARAM_INT);
            $this->query->bindValue(':final_date_report', $this->final_date_report, PDO::PARAM_INT);
            $this->query->bindValue(':id_user_close_report', $this->id_user_close_report, PDO::PARAM_INT);
            $this->query->bindValue(':observation_report', $this->observation_report, PDO::PARAM_INT);
            $this->query->bindValue(':id_report', $this->id_report, PDO::PARAM_INT);
            $this->query->execute();
            $result = $this->query->rowCount();
            $this->conn = null;
            return $result;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function update_column_report(){
        try {
            $this->query = $this->conn->prepare('update tbl_reports set '.$this->column.' = :stage_report WHERE id_report = :id_report');
            $this->query->bindValue(':value', $this->attrib, PDO::PARAM_INT);
            $this->query->bindValue(':id_report', $this->id_report, PDO::PARAM_INT);
            $this->query->execute();
            $result = $this->query->rowCount();
            $this->conn = null;
            return $result;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function __clone(){
        trigger_error('Clone option do not allowed!.', E_USER_ERROR);
    }
}
