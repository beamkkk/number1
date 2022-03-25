<?php 
 
    require_once '../conn.php';
    session_start();

    if($_SERVER['REQUEST_METHOD'] == "POST") {
 
        $password = $_POST['password'];
        $email = $_POST['email'];

        $query = "SELECT * FROM users WHERE email = :email";
        $check_data = $conn->prepare($query);
        $check_data->bindParam(":email", $email);
        $check_data->execute();
        $row = $check_data->fetch(PDO::FETCH_ASSOC);

        
        if ($check_data->rowCount() > 0) {
            if ($email == $row['email']) {
                if (password_verify($password, $row['password'])) {
                    $_SESSION['urole'] = $row['urole'];
                    $object = new stdClass();
                    $object->status = "success";
                    $object->message = "เข้าสู่ระบบสำเร็จ";
                    $object->page = "index.php";
                    $object->urole = $row['urole'];
                }else {
                    $object = new stdClass();
                    $object->status = "error";
                    $object->message = "รหัสผ่านไม่ถูกต้อง";
                }
            }else {
                $object = new stdClass();
                $object->status = "error";
                $object->message = "ไม่พบอีเมลในระบบ";
            }
        }else {
            $object = new stdClass();
            $object->status = "error";
            $object->message = "ไม่พบข้อมูลในระบบ";
        }


        echo json_encode($object);
        http_response_code(200);
    }else {
        http_response_code(405);
    }

?>