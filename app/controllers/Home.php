<?php

class Home extends Controller {

    public function index($firstName = '', $lastName = '') {//index function !!!!!!
        //echo $firstName;
        $user = $this->model('User');
        //$user->name=$firstName.' '.$lastName;
        //echo $user->name;
        //$this->view('home/index',['name'=>$user->name]);
        $this->view('home/index');
    }

    public function dice() {
        $cate='';
        switch($_POST['category'])
        {
            case 0:
                $cate='%';
                break;
            case 1:
                $cate='breakfast';
                break;
            case 2:
                $cate='lunch';
                break;
            case 3:
                $cate='dinner';
                break;
            case 4:
                $cate='dessert';
                break;
            default :
                $cate='%';
        }
        
        $result=$this->model("Food")->findFoodByCategory($cate);
        $tips='{"tips":[';
        $num=$result->num_rows;
        for($i=0;$i<$num;$i++)
        {
            $tips.=json_encode($result->fetch_assoc(),JSON_UNESCAPED_UNICODE);
            if($i<$num-1)
            {
                $tips.=',';
            }
        }
        $tips.=']}';
        
//        while($food=$result->fetch_assoc())
//        {
//            $tips[$i]=$food;
//            $i++;
//        }
        //$food = $this->model("Food")->findFoodByCategory($cate)->fetch_assoc();
        echo $tips;
        
//        while ($row = $result->fetch_assoc()) {
//                        //echo "id: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
//                        $this->ID = $row['id'];
//                        $this->name = $row['name'];
//                        if ($row['icon_path'] != '') {
//                            $this->iconPath = $row['icon_path'];
//                        }
//                        $this->numOfPics = $row['numOfPhotos'];
//                    }
    }

}
