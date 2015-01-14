<?php
class FoodModel extends Model{
    public function findFoodByCategory($cate)
    {
        $conn=  $this->getConnection();
        $conn->query("SET NAMES UTF8;");//important
        $stmt = [];
        if (!($stmt = $conn->prepare("select name, recipe_availability, recipe_link from gourylls.food where class like '" .$cate. "' limit 40;"))) {
            echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
        }
//        if (!$stmt->bind_param("i", $num)) {
//            echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
//        }
        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        return $stmt->get_result();
    }
}
