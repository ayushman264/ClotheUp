<?php
    function isLoggedin($conn)
    {
        //$_POST, $_GET
        $cookieName = "91706c1d7634c6537fbe65cc50941843";
        if(!isset($_COOKIE[$cookieName]))
            return false;
        else
        {
            $val = $_COOKIE[$cookieName];//dict[key] = val;
            $val = mysqli_real_escape_string($conn, $val);
            $sql = "SELECT * FROM userprofile WHERE cookie = '$val'";
            echo $sql;
            $result = $conn->query($sql);
            if($result->num_rows > 0)
            {
                $row = $result->fetch_assoc();
                return $row;
            }
            else
                return false;
        }
    }
?>