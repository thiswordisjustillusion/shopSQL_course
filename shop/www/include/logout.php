<?php
        define ('ThisWorldIsJustIllusion', true);
        session_start();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            unset($_SESSION['auth']);
            echo true;
        }