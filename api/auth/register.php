<?php 

    require_once('../conn.php');
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $urole = 'user';

        $check_email = $conn->prepare("SELECT email FROM users WHERE email = :email");
        $check_email->bindParam(":email", $email);
        $check_email->execute();
        $row = $check_email->fetch(PDO::FETCH_ASSOC);
        $num = $check_email->rowCount();

        if ($num <= 0) {
            $passwordhash = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO users (username, password, email, urole) VALUES (?,?,?,?)";
            $stmt = $conn->prepare($query);
            if($stmt->execute([$username,$passwordhash,$email,$urole])) {
                $object = new stdClass();
                $object->status = "success";
                $object->message = "สมัครสมาชิกสำเร็จ";
            }else {
                $object = new stdClass();
                $object->status = "error";
                $object->message = "เกิดข้อผิดพลาด";
            }
        }else {
            $object = new stdClass();
            $object->status = "error";
            $object->message = "มีอีเมลนี้แล้ว";
        }

        echo json_encode($object);
        http_response_code(200);
    }else {
        http_response_code(405);
    }

?>