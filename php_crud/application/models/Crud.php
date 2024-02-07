<?php

/**
 * Crud Model
 */
class Crud extends CI_Model
{

	public function insert($table, $data)
	{
		$result = $this->db->insert($table, $data);
		return $result;
	}

	public function update($table, $data, $PenInc_No)
	{
		$result = $this->db->where('PenInc_No', $PenInc_No)->update($table, $data);
		return $result;
	}

	public function delete($table, $PenInc_No)
	{
		$this->db->where('PenInc_No',$PenInc_No);
		$this->db->update('employeepeninc1', array('EmpStatus'=>1));
		return $result;
		// $result = $this->db->delete($table, ['PenInc_No' => $PenInc_No]);
		// return $result;
	}

	public function get_records($table)
	{
		$sql = "SELECT * FROM employeepeninc1 WHERE EmpStatus='1'";
		$result =  $this->db->query($sql);
		return $result->result();

		// $result = $this->db->get($table)->result();
		// return $result;
	}

	public function soft_delete($PenInc_No) {
    $this->db->set('EmpStatus', 0); // or set 'deleted_at' to the current timestamp
    $this->db->where('PenInc_No', $PenInc_No);
    $this->db->update('employeepeninc1');
	return $this->db->affected_rows();
}

	public function search($PenInc)
   {
       
	$this->db->select('*');
	$this->db->from('employeepeninc1');
	$this->db->like('PenInc_No', $PenInc, 'both');
	$this->db->where('EmpStatus', 1);
	
	$query = $this->db->get();
	return $query->result();
   }

	public function find_record_by_id($table, $PenInc_No)
	{
		$result = $this->db->get_where($table, ['PenInc_No' => $PenInc_No])->row();
		return $result;
	}
	public function get_pen($limit, $start, $Pen = NULL) {
		if ($Pen == "NIL") $Pen = "";
		$this->db->like('PenInc_No', 'PI00');
		$this->db->limit($limit, $start);
		$query = $this->db->get('employeepeninc1');
		return $query->result();
	}
	
	public function get_pen_count($Pen = NULL) {
		if ($Pen == "NIL") $Pen = "";
		$this->db->like('PenInc_No', $Pen);
		$query = $this->db->get('employeepeninc1');
		return $query->num_rows();
	}

	// public function search_record_by_Id($table, $PenInc_No)
	// {
	// 	$result = $this->db->get_where($table, ['PenInc_No' => $PenInc_No])->row();
	// 	return $result;
	// }



	// public function is_peninc_exists($PenInc_no) {
    //     $this->db->where('PenInc_No', $PenInc_no);
    //     $query = $this->db->get('employeepeninc1');

    //     return $query->num_rows() > 0;
    // }

	

// 	public function getEIdSuggestions($term)
// {
//     $this->db->like('EId', $term);
//     $this->db->select('EId');
//     $this->db->limit(10); // Limit the number of suggestions
//     $query = $this->db->get('employeepeninc1'); // replace 'your_table_name' with your actual table name
//     return $query->result_array();
// }

public function searchByEId($eid)
{

 $this->db->select('*');
 $this->db->from('employeepeninc1');
 $this->db->like('EId', $eid);
 $this->db->where('EmpStatus', 1);
 
 $query = $this->db->get();
 return $query->result();
}


public function getEIdSuggestions($term)
{
    $this->db->like('EId', $term);
    $this->db->select('EId');
    $this->db->distinct(); // Ensure distinct values
    $this->db->limit(10); // Limit the number of suggestions
    $query = $this->db->get('employeepeninc1'); // replace 'your_table_name' with your actual table name
    return $query->result_array();
}

public function getLatestTimestamp()
{
    $this->db->select_max('EId'); // Assuming 'last_modified' is your timestamp column
    $query = $this->db->get('employeepeninc1'); // replace 'your_table_name' with your actual table name
    $result = $query->row();

    return $result->EId;
}
   
   }

