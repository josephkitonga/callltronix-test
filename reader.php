<?php 

	class reader {

       
		public function __construct()
		{

			include 'connection.php';

			error_reporting(E_ERROR | E_PARSE);

			
		}
		

		function readJson()
		{
			// Read JSON file
			$json = file_get_contents('./interview_201909.json');

			//Decode JSON
			$json_data = json_decode($json,true);

			//Print data
			// print_r($json_data);

			return $json_data;
		}


		function populateSql()
		{
			// include 'connection.php';
			$connect = new connection();
            $conn = $connect->db();
       
			$data = $this->readJson();

			   // begin the transaction
		    $conn->beginTransaction();

            $count=0;
		    foreach ($data[1]['Report'] as $row)
		    {

		    	  if ($doneWithcontArrays[$row['contactType']]!="X")
		    	  {
		    	  	 $contact_type_id = uniqid();
		    	 	 $conn->exec("INSERT INTO contact_type (contact_type_id, name) VALUES ('".$contact_type_id."','".$row['contactType']."')");
		    	 	 $logArrayAssoc[$row['contactType']] = $contact_type_id;
	              }

	              if ($doneWithcontArrays[$row['callType']]!="X")
		    	  {
		    	  	 $call_type_id = uniqid();
		    	 	 $conn->exec("INSERT INTO call_type (call_type_id, name) VALUES ('".$call_type_id."','".$row['callType']."')");
		    	 	 $logArrayAssoc[$row['callType']] = $call_type_id;
	              }

	              if ($doneWithcontArrays[$row['sourceName']]!="X")
		    	  {
		    	  	 $source_name_id = uniqid();
		    	 	 $conn->exec("INSERT INTO source_name (source_name_id, name) VALUES ('".$source_name_id."','".$row['sourceName']."')");
		    	 	 $logArrayAssoc[$row['sourceName']] = $source_name_id;
	              }

	              if ($doneWithcontArrays[$row['storeName']]!="X")
		    	  {
		    	  	$store_name_id = uniqid();
		    	  	$conn->exec("INSERT INTO store_name (store_name_id, name) VALUES ('".$store_name_id."','".$row['storeName']."')");
		    	  	$logArrayAssoc[$row['storeName']] = $store_name_id;
	              }

	              if ($doneWithcontArrays[$row['questionType']]!="X")
		    	  {
		    	  	$question_type_id = uniqid();
		    	  	$conn->exec("INSERT INTO question_type (question_type_id, name) VALUES ('".$question_type_id."','".$row['questionType']."')");
		    	  	$logArrayAssoc[$row['questionType']] = $question_type_id;
	              }

	              if ($doneWithcontArrays[$row['questionSubType']]!="X")
		    	  {
		    	  	$question_sub_type_id = uniqid();
		    	  	$conn->exec("INSERT INTO question_sub_type (question_sub_type_id, name) VALUES ('".$question_sub_type_id."','".$row['questionSubType']."')");
		    	  	$logArrayAssoc[$row['questionSubType']] = $question_sub_type_id;
	              }

	              if ($doneWithcontArrays[$row['dispositionName']]!="X")
		    	  {
		    	  	$disposition_name_id = uniqid();
		    	  	$conn->exec("INSERT INTO disposition_name (disposition_name_id, name) VALUES ('".$disposition_name_id."','".$row['dispositionName']."')");
		    	  	 $logArrayAssoc[$row['dispositionName']] = $disposition_name_id;
	              }

	              // sleep(1);


              $contact_type_id = $this->getContactType('id',$row['contactType']) ? $this->getContactType('id',$row['contactType']) : $logArrayAssoc[$row['contactType']];
              $call_type_id = $this->getCallType('id',$row['callType']) ? $this->getCallType('id',$row['callType']) : $logArrayAssoc[$row['callType']];
              $source_name_id = $this->getSourceName('id',$row['sourceName']) ? $this->getSourceName('id',$row['sourceName']) : $logArrayAssoc[$row['sourceName']];
              $store_name_id = $this->getStoreName('id',$row['storeName']) ? $this->getStoreName('id',$row['storeName']) : $logArrayAssoc[$row['storeName']];
              $question_type_id = $this->getQuestionType('id',$row['questionType']) ? $this->getQuestionType('id',$row['questionType']) : $logArrayAssoc[$row['questionType']];
              $question_sub_type_id = $this->getQuestionSubType('id',$row['questionSubType']) ?  $this->getQuestionSubType('id',$row['questionSubType']) : $logArrayAssoc[$row['questionSubType']];
              $disposition_name_id = $this->getDispositionName('id',$row['dispositionName']) ? $this->getDispositionName('id',$row['dispositionName']) : $logArrayAssoc[$row['dispositionName']];
	    		    	
			 //SQL statements

			 $conn->exec("INSERT INTO clients (ticket_id, client_name, mobile_no, contact_type_id, call_type_id, source_name_id, store_name_id, question_type_id, question_sub_type_id, disposition_name_id, date_created)VALUES ('".$row['ticketID']."','".$row['clientName']."','".$row['mobileNo']."','".$contact_type_id."','".$call_type_id."','".$source_name_id."','".$store_name_id."','".$question_type_id."','".$question_sub_type_id."','".$disposition_name_id."','".$row['dateCreated']."')");



		    	$doneWithcontArrays[$row['contactType']] = "X";
		    	$doneWithcontArrays[$row['callType']] = "X";
		    	$doneWithcontArrays[$row['sourceName']] = "X";
		    	$doneWithcontArrays[$row['storeName']] = "X";
		    	$doneWithcontArrays[$row['questionType']] = "X";
		    	$doneWithcontArrays[$row['questionSubType']] = "X";
		    	$doneWithcontArrays[$row['dispositionName']] = "X";

		    }
             
		    
		    // commit the transaction
		    $conn->commit();
		    // echo "New records created successfully";
		    


		}


		function getContactType($type,$param)
		{

			$connect = new connection();
            $conn = $connect->db();
            $contactTypeArray = array();
            $checkContactTypeArray = array();

			$contact_type = $conn->prepare("SELECT * FROM contact_type");
			$contact_type->execute();
			$contactType = $contact_type->fetchAll();

			switch ($type)
			{
				case 'check':
					foreach ($contactType as $row) { $checkContactTypeArray[$row['name']] = 'X'; }
					return $checkContactTypeArray[$param];
					break;
				case 'id':
					foreach ($contactType as $row) { $contactTypeArray[$row['name']] = $row['contact_type_id']; }
					return $contactTypeArray[$param];
					break;	
				default:
					foreach ($contactType as $row) { $contactTypeArray[$row['contact_type_id']] = $row['name']; }
					return $contactTypeArray[$param];
					break;
			}
		}

		function getCallType($type,$param)
		{
			$connect = new connection();
            $conn = $connect->db();
            $assocArray = array();
            $nameAssocArray = array();

			$sql = $conn->prepare("SELECT * FROM call_type");
			$sql->execute();
			$datArray = $sql->fetchAll();

			switch ($type)
			{
				case 'check':
					foreach ($datArray as $row) { $assocArray[$row['name']] = 'X'; }
					return $assocArray[$param];
					break;
				case 'id':
					foreach ($datArray as $row) { $nameAssocArray[$row['name']] = $row['call_type_id']; }
					return $nameAssocArray[$param];
					break;
				default:
					foreach ($datArray as $row) { $nameAssocArray[$row['call_type_id']] = $row['name']; }
					return $nameAssocArray[$param];
					break;		
			}
		}

		function getSourceName($type,$param)
		{
			$connect = new connection();
            $conn = $connect->db();
            $assocArray = array();
            $nameAssocArray = array();

			$sql = $conn->prepare("SELECT * FROM source_name");
			$sql->execute();
			$datArray = $sql->fetchAll();

			switch ($type)
			{
				case 'check':
					foreach ($datArray as $row) { $assocArray[$row['name']] = 'X'; }
					return $assocArray[$param];
					break;
				case 'id':
					foreach ($datArray as $row) { $nameAssocArray[$row['name']] = $row['source_name_id']; }
					return $nameAssocArray[$param];
					break;	
				default:
					foreach ($datArray as $row) { $nameAssocArray[$row['source_name_id']] = $row['name']; }
					return $nameAssocArray[$param];
					break;			
			}
		}

		function getStoreName($type,$param)
		{
			$connect = new connection();
            $conn = $connect->db();
            $assocArray = array();
            $nameAssocArray = array();

			$sql = $conn->prepare("SELECT * FROM store_name");
			$sql->execute();
			$datArray = $sql->fetchAll();

			switch ($type)
			{
				case 'check':
					foreach ($datArray as $row) { $assocArray[$row['name']] = 'X'; }
					return $assocArray[$param];
					break;
				case 'id':
					foreach ($datArray as $row) { $nameAssocArray[$row['name']] = $row['store_name_id']; }
					return $nameAssocArray[$param];
					break;	
				default:
					foreach ($datArray as $row) { $nameAssocArray[$row['store_name_id']] = $row['name']; }
					return $nameAssocArray[$param];
					break;		
			}
		}

		function getQuestionType($type,$param)
		{
			$connect = new connection();
            $conn = $connect->db();
            $assocArray = array();
            $nameAssocArray = array();

			$sql = $conn->prepare("SELECT * FROM question_type");
			$sql->execute();
			$datArray = $sql->fetchAll();

			switch ($type)
			{
				case 'check':
					foreach ($datArray as $row) { $assocArray[$row['name']] = 'X'; }
					return $assocArray[$param];
					break;
				case 'id':
					foreach ($datArray as $row) { $nameAssocArray[$row['name']] = $row['question_type_id']; }
					return $nameAssocArray[$param];
					break;	
				default:
					foreach ($datArray as $row) { $nameAssocArray[$row['question_type_id']] = $row['name']; }
					return $nameAssocArray[$param];
					break;	
			}
		}

		function getQuestionSubType($type,$param)
		{
			$connect = new connection();
            $conn = $connect->db();
            $assocArray = array();
            $nameAssocArray = array();

			$sql = $conn->prepare("SELECT * FROM question_sub_type");
			$sql->execute();
			$datArray = $sql->fetchAll();

			switch ($type)
			{
				case 'check':
					foreach ($datArray as $row) { $assocArray[$row['name']] = 'X'; }
					return $assocArray[$param];
					break;
				case 'id':
					foreach ($datArray as $row) { $nameAssocArray[$row['name']] = $row['question_sub_type_id']; }
					return $nameAssocArray[$param];
					break;	
				default:
					foreach ($datArray as $row) { $nameAssocArray[$row['question_sub_type_id']] = $row['name']; }
					return $nameAssocArray[$param];
					break;		
			}
		}
         
        function getDispositionName($type,$param)
		{
			$connect = new connection();
            $conn = $connect->db();
            $assocArray = array();
            $nameAssocArray = array();

			$sql = $conn->prepare("SELECT * FROM disposition_name");
			$sql->execute();
			$datArray = $sql->fetchAll();

			switch ($type)
			{
				case 'check':
					foreach ($datArray as $row) { $assocArray[$row['name']] = 'X'; }
					return $assocArray[$param];
					break;
				case 'id':
					foreach ($datArray as $row) { $nameAssocArray[$row['name']] = $row['disposition_name_id']; }
					return $nameAssocArray[$param];
					break;	
				default:
					foreach ($datArray as $row) { $nameAssocArray[$row['disposition_name_id']] = $row['name']; }
					return $nameAssocArray[$param];
					break;			
			}
		}
		
		function getClients()
		{
			// include 'connection.php';
			$connect = new connection();
            $conn = $connect->db();

			$stmt = $conn->prepare("SELECT * FROM clients");
			$stmt->execute();
          

			return $stmt->fetchAll();
		}
         


}
