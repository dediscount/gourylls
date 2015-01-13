<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PictureModel
 *
 * @author Administrator
 */
class PictureModel extends Model {

    public $ID;
    public $userID;
    public $title;
    public $uploadingDate;
    public $picPath;
    public $format;
    public $size;
    public $likes;
    public $description;

    public function __construct($data = []) {
        
    }

    public function addPicture($userID, $picPath, $title, $format, $size, $description) {

        $conn = $this->getConnection();
        $likes = 0;
        $stmt = [];
        if (!($stmt = $conn->prepare("INSERT INTO gourylls.pictures (pic_path,title,description,format,size,userID,likes) VALUES (?,?,?,?,?,?,?)"))) {
            echo "Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error;
        }
        if (!$stmt->bind_param("ssssiii", $picPath, $title, $description, $format, $size, $userID, $likes)) {
            echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
    }

    public function getPicturesByUser($userID) {
        $conn = $this->getConnection();
        $stmt = [];
        if (!($stmt = $conn->prepare("select id,pic_path from gourylls.pictures where userID = (?) order by id desc"))) {
            echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
        }
        if (!$stmt->bind_param("i", $userID)) {
            echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        return $stmt->get_result();
    }
    public function getPictureByID($ID)
    {
        $conn = $this->getConnection();
        $stmt = [];
        if (!($stmt = $conn->prepare("select id,pic_path,title,description,uploadingdate,likes from gourylls.pictures where ID = (?)"))) {
            echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
        }
        if (!$stmt->bind_param("i", $ID)) {
            echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        if (!$stmt->execute()) {
            echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        }
        return $stmt->get_result()->fetch_assoc();
    }
}
