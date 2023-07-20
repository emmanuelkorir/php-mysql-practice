<?php

    ini_set('session.use_only_cookies', 1);
    ini_set('session.use_strict_mode', 1);

    session_set_cookie_params([
        'lifetime' => 1800,
        'path' => '/phpsessions',
        'domain' => 'localhost',
        'secure' => true,
        'httponly' => true,
    ]);

    session_start();

    if (!isset($_SESSION['last_regeneratrion'])) {

        //generate session
        session_regenerate_id(true);
        $_SESSION['last_regeneratrion'] = time();
    } else {

        $interval = 60 * 30; //change session id every 30 minutes

        if (time() - $_SESSION['last_regeneratrion'] > $interval) {

            //generate new session id
            session_regenerate_id(true);
            $_SESSION['last_regeneratrion'] = time();
        }
    }

    