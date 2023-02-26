<?php
class TransactionController
{
   private $connection;

   public function __construct($connection)
   {
      $this->connection = $connection;
   }

   public function create($data)
   {
      $transaction_number = $this->generateRandomNumber();
      $customer_name = $data['customer_name'];
      $customer_address = $data['customer_address'];
      $customer_contact_number = $data['customer_contact_number'];
      $customer_payment_method = $data['customer_payment_method'];
      $items = $data['data'];

      foreach ($items as $item) {
         $flavor = $item['selFlavorItem'];
         $roast = $item['selRoastItem'];
         $grind = $item['selGrindItem'];
         $quantity = $item['txtQuantity'];
         $measurement = $item['selMeasurement'];
         $price = $item['txtPrice'];
         $status = 'Pending';
         $created_at = date('Y-m-d H:i:s');

         // prepare the statement
         $stmt = $this->connection->prepare("INSERT INTO `transactions` (`transaction_number`, `customer_name`, `customer_address`, `customer_contact_number`, `customer_payment_method`, `item_flavor`, `item_type_of_roast`, `item_type_of_grind`, `item_quantity`, `item_grams`, `item_price`, `status`, `created_at`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
         if (!$stmt) {
            return $this->getDataAsJSON([
               'status' => 500,
               'message' => 'Failed to prepare SQL statement'
            ]);
         }

         // bind the values
         $stmt->bind_param("sssssssssssss", $transaction_number, $customer_name, $customer_address, $customer_contact_number, $customer_payment_method, $flavor, $roast, $grind, $quantity, $measurement, $price, $status, $created_at);

         // execute the statement
         $result = $stmt->execute();
         if (!$result) {
            return $this->getDataAsJSON([
               'status' => 500,
               'message' => 'Failed to prepare SQL statement'
            ]);
         }
      }

      return $this->getDataAsJSON([
         'status' => 200,
         'message' => "New record created successfully"
      ]);
   }

   public function read($transaction_number = null)
   {
      if ($transaction_number) {
         $transaction_number = $this->connection->real_escape_string($transaction_number);
         $sql = "SELECT
            id,
            transaction_number,
            customer_name,
            customer_address,
            customer_contact_number,
            customer_payment_method,
            item_flavor,
            item_type_of_roast,
            item_type_of_grind,
            item_quantity,
            item_grams,
            item_price,
            status,
            DATE(created_at) as created_at
            FROM transactions
            WHERE transaction_number = $transaction_number";
      } else {
         $sql = "SELECT 
            t.id,
            t.transaction_number,
            t.customer_name,
            t.customer_address,
            t.customer_contact_number,
            t.customer_payment_method,
            DATE(t.created_at) as created_at,
            COUNT(1) as total_quantity,
            SUM(t.item_price) as total_price
            FROM transactions as t
            GROUP BY t.transaction_number";
      }

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

   public function numberOfTransaction() {
      $sql = "SELECT * FROM transactions";
      $result = $this->connection->query($sql);
      return $result->num_rows;
   }

   public function update($id, $data)
   {
      $id = $this->connection->real_escape_string($id);

      $columns = '';
      $i = 1;
      $total = count($data);
      foreach ($data as $key => $value) {
         $columns .= $key . "='" . $value . "'";
         if ($i < $total) {
            $columns .= ', ';
         }
         $i++;
      }

      $sql = "UPDATE transactions SET $columns WHERE id=$id";

      if ($this->connection->query($sql)) {
         return [
            'status' => 200,
            'message' => 'Transaction updated successfully'
         ];
      } else {
         return [
            'status' => 500,
            'message' => 'Failed to update transaction'
         ];
      }
   }

   public function delete($trans_no)
   {
      $transaction_number = $this->connection->real_escape_string($trans_no);
      $sql = "DELETE FROM `transactions` WHERE transaction_number = '$transaction_number'";

      $result = $this->connection->query($sql);

      if ($result) {
         if ($this->connection->affected_rows > 0) {
            return $this->getDataAsJSON([
               'status' => 200,
               'message' => 'Transaction deleted successfully'
            ]);
         } else {
            return $this->getDataAsJSON([
               'status' => 404,
               'message' => 'Transaction not found'
            ]);
         }
      } else {
         return $this->getDataAsJSON([
            'status' => 500,
            'message' => 'Failed to delete transaction'
         ]);
      }
   }

   public function getDataAsJSON($data)
   {
      header('Content-Type: application/json');
      return json_encode($data);
   }

   public function generateRandomNumber()
   {
      $six_digit_random_number = random_int(100000, 999999);
      return $six_digit_random_number;
   }
}
