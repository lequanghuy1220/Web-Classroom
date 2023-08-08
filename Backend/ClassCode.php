<?php 
    function classCode() {
        $character = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $classCode = '';
        for($i = 0 ; $i < 6 ; $i++) {
            #lấy random index
            $index = rand(0 , strlen($character) - 1);
            #lấy 6 lần, mỗi lần lặp lấy 1 ký tự
            $classCode .= $character[$index];
        }
        return $classCode;
    }

?>