<?php
class CustomerController
{
   private $connection;

   public function __construct($connection)
   {
      $this->connection = $connection;
   }

   public function read()
   {
      $sql = "SELECT * FROM customers";

      $result = $this->connection->query($sql);

      if ($result) {
         if ($result->num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
               $data[] = $row;
            }

            return $this->getDataAsJSON([
               'status' => 200,
               'data' => $data
            ]);
         } else {
            return $this->getDataAsJSON([
               'status' => 404,
               'message' => 'No data found'
            ]);
         }
      } else {
         return $this->getDataAsJSON([
            'status' => 500,
            'message' => 'Failed to retrieve data from database'
         ]);
      }
   }

   public function getDataAsJSON($data)
   {
      header('Content-Type: application/json');
      return json_encode($data);
   }
}
