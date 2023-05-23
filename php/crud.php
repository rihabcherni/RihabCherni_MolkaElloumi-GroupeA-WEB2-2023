<?php
    function getAllRecords($tableName, $conn){
        $stmt = $conn->prepare("SELECT * FROM $tableName");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getRecordById($tableName, $id, $conn){
        $stmt = $conn->prepare("SELECT * FROM $tableName WHERE student_id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    function searchRecords($tableName, $searchTerm, $searchAttributes, $conn) {
        $conditions = [];
        foreach ($searchAttributes as $attribute) {
            $conditions[] = $attribute . " LIKE :searchTerm";
        }     
        $query = "SELECT * FROM $tableName WHERE " . implode(" OR ", $conditions);
        $stmt = $conn->prepare($query);
        
        $searchValue = '%' . $searchTerm . '%';
        $stmt->bindParam(':searchTerm', $searchValue);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function insertRecord($tableName, $data, $conn) {
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        $query = "INSERT INTO $tableName ($columns) VALUES ($placeholders)";
        $stmt = $conn->prepare($query);
        foreach ($data as $key => $value) {
            if ($key == 'logo') { 
                $filename = $_FILES['logo']['name'];
                $tempname = $_FILES['logo']['tmp_name'];
                $folder = '../picture/clubLogo/'.$filename;
                move_uploaded_file($tempname, $folder);
                $stmt->bindValue(":$key", $folder);
            } else {
                $stmt->bindValue(":$key", $value);
            }
        }
        return $stmt->execute();
    }
    function updateRecord($tableName, $id, $data, $conn) {
        $setClause = '';
        foreach ($data as $key => $value) {
            if ($key == 'logo') {
                $filename = $_FILES['logo']['name'];
                $tempname = $_FILES['logo']['tmp_name'];
                $folder = '../picture/clubLogo/' . $filename;
                move_uploaded_file($tempname, $folder);
                $setClause .= "$key = :$key, ";
                $data[$key] = $folder;
            } else {
                $setClause .= "$key = :$key, ";
            }
        }
        $setClause = rtrim($setClause, ', ');
        $query = "UPDATE $tableName SET $setClause WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id', $id);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }
    function deleteRecord($tableName, $id, $conn){
        $stmt = $conn->prepare("DELETE FROM $tableName WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

?>