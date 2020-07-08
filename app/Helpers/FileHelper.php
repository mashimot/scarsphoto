<?php
namespace App\Helpers;

class FileHelper {

    public static function getUserImagePath(
        $user_id = null, $user_root_raw = "images/users"/*, $padding_length = 16, 
        $split_length = 6, $hash_length = 12, $hide_leftover = true*/
    ){    // our db user_id should be nummeric
        if (!is_numeric($user_id))
            return null;
    
        // clean trailing slashes  
        $user_root_rtrim = rtrim( $user_root_raw, '/\\' );
        $user_root_ltrim = ltrim( $user_root_rtrim, '/\\' );
        $user_root = $user_root_ltrim;
    
        //$user_id_padded = str_pad($user_id, $padding_length, "0", STR_PAD_LEFT); //pad it with zeros  
    
        $user_hash = md5($user_id); // build md5 hash
        $username_first_letter = substr($user_hash, 0, 1); // the first letter
        $username_first_two_letters = substr($user_hash, 0, 2); // the first two letters
        
    
        $user_image_path = "{$user_root}/{$username_first_letter}/{$username_first_two_letters}"; //build final path
    
        return $user_image_path;
    }
}