<?php
            session_start();
            include 'config.php';

            $username = $_POST['username'];
            $password = $_POST['password'];
            $qlogin = mysqli_query($config,"select * from tb_user where username='$username' and password='$password'");
            $q2login = mysqli_num_rows($qlogin);

            if($q2login > 0){
                $q3login = mysqli_fetch_assoc($qlogin);
                $_SESSION['username'] = $q3login['username'];
                $_SESSION['status'] = 'login';
                header("location:.");
            }else{
                
                header("location:login.php");
            }
            ?>