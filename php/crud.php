<?php

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
        $value = ':' . implode(', :', array_keys($data));
        $query = "INSERT INTO $tableName ($columns) VALUES ($value)";
        $stmt = $conn->prepare($query);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }
    function updateRecord($tableName, $id, $data, $conn) {
        $setClause = '';
        foreach ($data as $key => $value) {
            $setClause .= "$key = :$key, ";
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