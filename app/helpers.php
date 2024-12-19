<?php

use App\Models\Loginhistorique;
use App\Models\Loginstatus;

function uploadFile($image, $path)
{
    $file_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
    $file_name = str_replace(array('\\', '/',':' , '*', '"', "'", ">", "<", "|", '?', '؟', '.', ' ', '-'), '_', $file_name);
    $file_name = $file_name.date("_d_m_Y_G_i_s");
    $fileExtenssion = pathinfo($image->getClientOriginalName(), PATHINFO_EXTENSION);
    $full_name  = $file_name.'.'.$fileExtenssion;
    $image->storeAs('public/uloaded_files/'.$path, $full_name);
    return 'storage/uloaded_files/'.$path.'/'.$full_name;

}

function SaveLogin($user_id, $status)
{
    $status =  Loginstatus::where("name",$status)->first();
    $loginHistorique = new Loginhistorique();
    $loginHistorique->user_id    =$user_id ;
    $loginHistorique->login_status_id  = $status->id;
    $loginHistorique->save() ;

}
