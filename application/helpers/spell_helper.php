<?php

/* 
 * PHP functions to check Vietnamese spelling plus v1.2
 * MIT License
 * Nguyen Duc Anh - freehost.page
 */
require_once(APPPATH.'helpers/vietnam_helper.php');


//==============================================================================
function vn_spell_one_char($str)
{ // kiểm tra từ có một ký tự
    $rs = 0; // giả định ban đầu là sai chính tả

    // với từ chỉ có một từ thì để nó có nghĩa, nó phải thuộc về bộ nguyên âm một từ
    // phải khác ă và â, những nguyên âm cần có âm cuối
    if (in_array($str, vna_vowel_lett()) && $str != "ă" && $str != "â") { // nó buộc phải thuộc về bộ nguyên âm đơn
        $rs = 1;
    }

    return $rs;
}


//==============================================================================
function vn_spell_two_chars($str)
{ // kiểm tra từ có 2 ký tự
    $rs = 0;

    // nếu nó thuộc về mảng nguyên âm đôi, nó được xem là đúng chính tả && nó cần không được thuộc về mảng nguyên âm đôi cần âm cuối
    if (in_array($str, vna_diphthongs()) && !in_array($str, vna_final_csnt_req2()) && !in_array($str, vna_final_voc_req2())) { // nó có thể thuộc về bộ nguyên âm đôi
        $rs = 1;
    }

    // các trường hợp gồm một nguyên âm và một phụ âm
    $flett = mb_substr($str, 0, 1, 'UTF-8'); // lấy ký tự đầu tiên
    $slett = mb_substr($str, 1, 1, 'UTF-8'); // lấy ký tự thứ hai

    // một phụ âm đầu và một nguyên âm cuối, tất cả chỉ có một ký tự
    // vna_first_csnt1() là mảng phụ âm đầu hợp lệ && vna_vowel_lett() là mảng nguyên âm có một ký tự
    // phải khác ă và â vì những nguyên âm đơn này buộc phải có thêm âm cuối
    if (in_array($flett, vna_first_csnt1()) && in_array($slett, vna_vowel_lett()) && $slett != "ă" && $slett != "â") {
        $rs = 1;
    }

    // một nguyên âm đầu và một phụ âm cuối, tất cả chỉ có một ký tự
    // vna_vowel_lett() nguyên âm một ký tự && vna_last_csnt1() phụ âm cuối một ký tự hợp lệ
    if (in_array($flett, vna_vowel_lett()) && in_array($slett, vna_last_csnt1())) {
        $rs = 1;
    }

    return $rs;
}


//==============================================================================
function vn_spell_three_chars($str)
{ // kiểm tra từ có 3 ký tự
    $rs = 0;

    // nếu nó thuộc về mảng nguyên âm ba nó được xem là đúng chính tả & khác uyê cần phụ âm cuối
    if (in_array($str, vna_triphthongs()) && $str != "uyê") { // nó có thể thuộc về bộ nguyên âm ba
        $rs = 1;
    }

    // các trường hợp khác gồm phụ âm và nguyên âm
    $flett = mb_substr($str, 0, 1, 'UTF-8'); // lấy ký tự đầu tiên
    $lslett = mb_substr($str, 1, 2, 'UTF-8'); // lấy 2 ký tự cuối

    $slett = mb_substr($str, 1, 1, 'UTF-8'); // lấy ký tự thứ hai

    $fslett = mb_substr($str, 0, 2, 'UTF-8'); // lấy 2 ký tự đầu tiên
    $llett = mb_substr($str, 2, 1, 'UTF-8'); // lấy ký tự cuối cùng


    // phụ âm đầu 1 ký tự, nguyên âm sau 2 ký tự
    // vna_first_csnt1() phụ âm đầu một ký tự được phép && vna_diphthongs() nguyên âm 2 ký tự && vna_final_voc_req2(), vna_final_csnt_req2() không thuộc về mảng nguyên âm đôi cần có phụ âm cuối
    if (in_array($flett, vna_first_csnt1()) && in_array($lslett, vna_diphthongs()) && !in_array($str, vna_final_csnt_req2()) && !in_array($str, vna_final_voc_req2())) {
        $rs = 1;
    }

    // phụ âm đầu 2 ký tự, nguyên âm sau 1 ký tự
    // vna_first_csnt2() phụ âm đầu 2 ký tự hợp lệ && vna_vowel_lett() nguyên âm một ký tự && nguyên âm đơn phải khác ă và â, cái cần âm cuối
    if (in_array($fslett, vna_first_csnt2()) && in_array($llett, vna_vowel_lett()) && $llett != "ă" && $llett != "â") {
        $rs = 1;
    }

    // nguyên âm đầu 1 ký tự, phụ âm sau 2 ký tự
    // vna_vowel_lett() mảng nguyên âm một ký tự && vna_last_csnt2() mảng phụ âm 2 ký tự hợp lệ
    if (in_array($flett, vna_vowel_lett()) && in_array($lslett, vna_last_csnt2())) {
        $rs = 1;
    }

    // nguyên âm đầu 2 ký tự, phụ âm sau 1 ký tự
    // vna_diphthongs() nguyên âm đầu 2 ký tự & vna_last_csnt1() phụ âm cuối 1 ký tự hợp lệ && vna_no_sound_end2() không thuộc về mảng nguyên âm đôi không được có âm cuối
    if (in_array($fslett, vna_diphthongs()) && in_array($llett, vna_last_csnt1()) && !in_array($fslett, vna_no_sound_end2())) {
        $rs = 1;
    }

    // phụ âm đầu 1 ký tự, nguyên âm giữa 1 ký tự, phụ âm cuối 1 ký tự
    // vna_first_csnt1() phụ âm đầu 1 ký tự hợp lệ, vna_vowel_lett() nguyên âm 1 ký tự, vna_last_csnt1() phụ âm một ký tự hợp lệ
    if (in_array($flett, vna_first_csnt1()) && in_array($slett, vna_vowel_lett()) && in_array($llett, vna_last_csnt1())) {
        $rs = 1;
    }

    return $rs;
}


//==============================================================================
function vn_spell_four_chars($str)
{ // kiểm tra từ có 4 ký tự
    $rs = 0;

    $fslett = mb_substr($str, 0, 2, 'UTF-8'); // lấy 2 ký tự đầu tiên
    $lslett = mb_substr($str, 2, 2, 'UTF-8'); // lấy 2 ký tự cuối cùng

    $flett = mb_substr($str, 0, 1, 'UTF-8'); // lấy 1 ký tự đầu tiên
    $slett = mb_substr($str, 1, 1, 'UTF-8'); // lấy 1 ký tự thứ hai 
    $tlett = mb_substr($str, 2, 1, 'UTF-8'); // lấy 1 ký tự thứ ba

    $stlett = mb_substr($str, 1, 2, 'UTF-8'); // lấy 2 ký tự ở giữa 

    $ftlett = mb_substr($str, 0, 3, 'UTF-8'); // lấy 3 ký tự đầu tiên
    $ltlett = mb_substr($str, 1, 3, 'UTF-8'); // lấy 3 ký tự cuối cùng
    $llett = mb_substr($str, 3, 1, 'UTF-8'); // lấy 1 ký tự cuối cùng

    // nguyên âm đầu 1 ký tự, phụ âm cuối 3 ký tự // không có trường hợp này
    // vì không có phụ âm cuối 3 ký tự

    // nguyên âm đầu 2 ký tự, phụ âm cuối 2 ký tự
    // nguyên âm 2 ký tự vna_diphthongs() && phụ âm cuối 2 ký tự vna_last_csnt2() && không thuộc vna_no_sound_end2() các là các nguyên âm đôi không được phép có ký tự cuối
    if (in_array($fslett, vna_diphthongs()) && in_array($lslett, vna_last_csnt2()) && !in_array($fslett, vna_no_sound_end2())) {
        $rs = 1;
    }

    // nguyên âm đầu 3 ký tự, phụ âm cuối 1 ký tự
    // nguyên âm 3 ký tự vna_triphthongs() && phụ âm cuối 1 ký tự vna_last_csnt1() && không thuộc mảng nguyên âm 3 không được phép có ký tự ở cuối 
    if (in_array($ftlett, vna_triphthongs()) && in_array($llett, vna_last_csnt1()) && !in_array($ftlett, vna_no_sound_end3())) {
        $rs = 1;
    }

    //phụ âm đầu 1 ký tự, nguyên âm giữa 2 ký tự, phụ âm cuối 1 ký tự
    // vna_first_csnt1() phụ âm đầu 1 ký tự hợp lệ && vna_diphthongs() nguyên âm 2 ký tự && không thuộc vna_no_sound_end2() mảng nguyên âm đôi không được phép có ký tự cuối
    // vna_last_csnt1() mảng phụ âm cuối 1 ký tự hợp lệ
    if (in_array($flett, vna_first_csnt1()) && in_array($stlett, vna_diphthongs()) && !in_array($stlett, vna_no_sound_end2()) && in_array($llett, vna_last_csnt1())) {
        $rs = 1;
    }

    // phụ âm đầu 1 ký tự, nguyên âm cuối 3 ký tự
    // vna_first_csnt1() phụ âm đầu 1 ký tự hợp lệ && vna_triphthongs() mảng nguyên âm 3 ký tự  && khác nguyên âm ba cần phụ âm cuối
    if (in_array($flett, vna_first_csnt1()) && in_array($ltlett, vna_triphthongs()) && $ltlett != "uyê") {
        $rs = 1;
    }

    // phụ âm đầu 1 ký tự, nguyên âm giữa 1 ký tự, phụ âm cuối 2 ký tự
    // vna_first_csnt1() phụ âm 1 kt hợp lệ && vna_vowel_lett() mảng nguyên âm 1 kt && vna_last_csnt2 phụ âm cuối 2 ký tự hợp lệ
    if (in_array($flett, vna_first_csnt1()) && in_array($slett, vna_vowel_lett()) && in_array($lslett, vna_last_csnt2())) {
        $rs = 1;
    }

    //phụ âm đầu 2 ký tự, nguyên âm cuối 2 ký tự
    // vna_first_csnt2() phụ âm đầu 2 ký tự hợp lệ && vna_diphthongs() nguyên âm đôi, 
    // vna_final_csnt_req2() và vna_final_voc_req2() là mảng các nguyên âm đôi cần âm cuối
    if (in_array($fslett, vna_first_csnt2()) && in_array($lslett, vna_diphthongs()) && !in_array($str, vna_final_csnt_req2()) && !in_array($str, vna_final_voc_req2())) {
        $rs = 1;
    }

    // phụ âm đầu 2 ký tự, nguyên âm giữa 1 ký tự, phụ âm cuối 1 ký tự
    // vna_first_csnt2() mảng phụ âm đôi hợp lệ && vna_vowel_lett() mảng nguyên âm 1 ký tự && vna_last_csnt1() phụ âm cuối 1 ký tự 
    if (in_array($fslett, vna_first_csnt2()) && in_array($tlett, vna_vowel_lett()) && in_array($llett, vna_last_csnt1())) {
        $rs = 1;
    }

    //phụ âm đầu 3 ký tự, nguyên âm cuối 1 ký tự
    // vna_first_csnt3() phụ âm đầu 3 ký tự hợp lệ && vna_vowel_lett() nguyên âm một ký tự
    // phụ âm đầu 3 ký tự chỉ có trường hợp ngh
    // nguyên âm đơn cuối cần khác ă và â vì trường hợp này cần âm cuối
    if ($ftlett == "ngh" && in_array($llett, vna_vowel_lett()) && $llett != "ă" && $llett != "â") {
        $rs = 1;
    }

    return $rs;
}


//==============================================================================
function vn_spell_five_chars($str)
{ // kiểm tra từ có 5 ký tự
    $rs = 0;
    $lett01 = mb_substr($str, 0, 1, 'UTF-8'); // lấy 1 ký tự đầu tiên
    $lett02 = mb_substr($str, 0, 2, 'UTF-8'); // lấy 2 ký tự đầu tiên

    $lett12 = mb_substr($str, 1, 2, 'UTF-8'); // lấy 2 ký tự sau ký tự đầu tiên
    $lett13 = mb_substr($str, 1, 3, 'UTF-8'); // lấy 3 ký tự sau ký tự đầu tiên
    $lett22 = mb_substr($str, 2, 2, 'UTF-8'); // lấy 2 ký tự sau 2 ký tự đầu tiên    

    $lett03 = mb_substr($str, 0, 3, 'UTF-8'); // lấy 3 ký tự đầu tiên

    $lett21 = mb_substr($str, 2, 1, 'UTF-8'); // lấy 1 ký tự thứ ba  

    $lett41 = mb_substr($str, 4, 1, 'UTF-8'); // lấy 1 ký tự cuối cùng
    $lett31 = mb_substr($str, 3, 1, 'UTF-8'); // lấy 1 ký tự ngay trước ký tự cuối cùng
    $lett32 = mb_substr($str, 3, 2, 'UTF-8'); // lấy 2 ký tự cuối cùng
    $lett23 = mb_substr($str, 2, 3, 'UTF-8'); // lấy 3 ký tự cuối cùng

    // 1 nguyên âm đầu, 4 phụ âm cuối, không có trường hợp này------------------
    // 1 nguyên âm đầu, 3 phụ âm cuối, 1 nguyên âm cuối không có trường hợp này----
    // nguyên âm đầu 2 ký tự, phụ âm cuối 3 ký tự, không có trường hợp này------

    // nguyên âm đầu 3 ký tự, phụ âm cuối 2 ký tự
    // vna_triphthongs() mảng nguyên âm 3 ký tự, vna_last_csnt2() mảng phụ âm cuối 2 ký tự, vna_no_sound_end3() mảng các nguyên âm 3 không được phép có âm cuối 
    if (in_array($lett03, vna_triphthongs()) && in_array($lett32, vna_last_csnt2()) && !in_array($lett03, vna_no_sound_end3())) {
        $rs = 1;
    }

    // nguyên âm đầu 4 ký tự, phụ âm cuối 1 ký tự, không có trường hợp này------
    // nguyên âm đầu 5 ký tự, không có trường hợp này---------------------------
    // phụ âm đầu 1 ký tự, nguyên âm cuối 4 ký tự, không có trường hợp này------

    // phụ âm đầu 1 ký tự, nguyên âm tiếp theo 3 ký tự, phụ âm cuối 1 ký tự
    // vna_first_csnt1() mảng phụ âm đầu 1 ký tự, vna_triphthongs() mảng nguyên âm 3 ký tự, vna_last_csnt1() mảng phụ âm cuối 1 ký tự
    // vna_no_sound_end3() mảng nguyên âm 3 không được phép có âm cuối
    if (in_array($lett01, vna_first_csnt1()) && in_array($lett13, vna_triphthongs()) && in_array($lett41, vna_last_csnt1()) && !in_array($lett13, vna_no_sound_end3())) {
        $rs = 1;
    }

    // phụ âm đầu 1 ký tự, nguyên âm tiếp theo 2 ký tự, phụ âm cuối 2 ký tự 
    // vna_first_csnt1() mảng phụ âm đầu 1 ký tự, vna_diphthongs() mảng nguyên âm 2 ký tự, vna_last_csnt2() mảng phụ âm cuối 2 ký tự
    // vna_no_sound_end2() mảng nguyên âm 2 ký tự không được phép có âm cuối
    if (in_array($lett01, vna_first_csnt1()) && in_array($lett12, vna_diphthongs()) && in_array($lett32, vna_last_csnt2()) && !in_array($lett12, vna_no_sound_end2())) {
        $rs = 1;
    }

    // phụ âm đầu 1 ký tự, nguyên âm tiếp theo 1 ký tự, phụ âm cuối 3 ký tự, trường hợp này không tồn tại------------

    // phụ âm đầu 2 ký tự, nguyên âm tiếp theo 3 ký tự
    // vna_first_csnt2() mảng phụ âm đầu 2 ký tự, vna_triphthongs() mảng nguyên âm 3 ký tự, khác uyê vì đây là nguyên âm 3 cần phụ âm cuối
    if (in_array($lett02, vna_first_csnt2()) && in_array($lett23, vna_triphthongs()) && $lett23 != "uyê") {
        $rs = 1;
    }

    // phụ âm đầu 2 ký tự, nguyên âm tiếp theo 2 ký tự, phụ âm cuối 1 ký tự
    // vna_first_csnt2() mảng phụ âm đầu 2 ký tự, vna_diphthongs() mảng nguyên âm 2 ký tự, vna_last_csnt1() phụ âm cuối 1 ký tự
    // vna_no_sound_end2() mảng nguyên âm không được phép có âm cuối
    if (in_array($lett02, vna_first_csnt2()) && in_array($lett22, vna_diphthongs()) && in_array($lett41, vna_last_csnt1()) && !in_array($lett22, vna_no_sound_end2())) {
        $rs = 1;
    }

    // phụ âm đầu 2 ký tự, nguyên âm tiếp theo 1 ký tự, phụ âm cuối 2 ký tự
    // vna_first_csnt2() phụ âm đầu 2 ký tự, vna_vowel_lett() nguyên âm 1 ký tự, vna_last_csnt2() phụ âm cuối 2 ký tự 
    if (in_array($lett02, vna_first_csnt2()) && in_array($lett21, vna_vowel_lett()) && in_array($lett32, vna_last_csnt2())) {
        $rs = 1;
    }

    // phụ âm đầu 3 ký tự, nguyên âm tiếp theo 2 ký tự
    // vna_first_csnt3() phụ âm đầu 3 ký tự (chỉ có mỗi ngh), vna_diphthongs() nguyên âm 2 ký tự
    // vna_final_csnt_req2() và vna_final_voc_req2() là các nguyên âm đôi cần âm cuối
    if ($lett03 == "ngh" && in_array($lett32, vna_diphthongs()) && !in_array($lett32, vna_final_csnt_req2()) && !in_array($lett32, vna_final_voc_req2())) {
        $rs = 1;
    }

    // phụ âm đầu 3 ký tự, nguyên âm tiếp theo 1 ký tự, phụ âm cuối 1 ký tự
    // phụ âm đầu 3 ký tự chỉ có mỗi trường hợp ngh, vna_vowel_lett() nguyên âm một ký tự
    // vna_last_csnt1() phụ âm cuối 1 ký tự
    if ($lett03 == "ngh" && in_array($lett31, vna_vowel_lett()) && in_array($lett41, vna_last_csnt1())) {
        $rs = 1;
    }

    return $rs;
}


//==============================================================================
function vn_spell_six_chars($str)
{ // kiểm tra từ có 6 ký tự
    $rs = 0;

    $lett01 = mb_substr($str, 0, 1, 'UTF-8'); // lấy 1 ký tự đầu tiên
    $lett02 = mb_substr($str, 0, 2, 'UTF-8'); // lấy 2 ký tự đầu tiên

    $lett13 = mb_substr($str, 1, 3, 'UTF-8'); // lấy 3 ký tự sau ký tự đầu tiên
    $lett22 = mb_substr($str, 2, 2, 'UTF-8'); // lấy 2 ký tự sau 2 ký tự đầu tiên
    $lett32 = mb_substr($str, 3, 2, 'UTF-8'); // lấy 2 ký tự sau 3 ký tự đầu tiên    
    $lett23 = mb_substr($str, 2, 3, 'UTF-8'); // lấy 3 ký tự sau 2 ký tự đầu tiên 

    $lett03 = mb_substr($str, 0, 3, 'UTF-8'); // lấy 3 ký tự đầu tiên
    $lett31 = mb_substr($str, 3, 1, 'UTF-8'); // lấy 1 ký tự sau 3 ký tự đầu

    $lett51 = mb_substr($str, 5, 1, 'UTF-8'); // lấy 1 ký tự cuối cùng
    $lett42 = mb_substr($str, 4, 2, 'UTF-8'); // lấy 2 ký tự cuối cùng
    $lett33 = mb_substr($str, 3, 3, 'UTF-8'); // lấy 3 ký tự cuối cùng

    // nguyên âm đầu 1 ký tự, phụ âm cuối 5 ký tự, không có trường hợp này------------------
    // nguyên âm đầu 1 ký tự, phụ âm cuối 4 ký tự, nguyên âm cuối 1 ký tự, không có trường hợp này-----
    // nguyên âm đầu 2 ký tự, phụ âm cuối 4 ký tự, không có trường hợp này------
    // nguyên âm đầu 3 ký tự, phụ âm cuối 3 ký tự, không có trường hợp này------
    // nguyên âm đầu 5 ký tự, phụ âm cuối 1 ký tự, không có trường hợp này------
    // nguyên âm đầu 6 ký tự, không có trường hợp này---------------------------

    // phụ âm đầu 1 ký tự, nguyên âm cuối 5 ký tự, không có trường hợp này------

    // phụ âm đầu 1 ký tự, nguyên âm tiếp theo 3 ký tự, phụ âm cuối 2 ký tự
    // vna_first_csnt1() phụ âm đầu 1 ký tự, vna_triphthongs() nguyên âm 3 ký tự, vna_last_csnt2() phụ âm cuối 2 ký tự
    // vna_no_sound_end3() nguyên âm 3 ký tự không được phép có âm cuối
    if (in_array($lett01, vna_first_csnt1()) && in_array($lett13, vna_triphthongs()) && in_array($lett42, vna_last_csnt2()) && !in_array($lett13, vna_no_sound_end3())) {
        $rs = 1;
    }
    // phụ âm đầu 1 ký tự, nguyên âm tiếp theo 2 ký tự, phụ âm cuối 3 ký tự, trường hợp này không tồn tại----- 
    // phụ âm đầu 1 ký tự, nguyên âm tiếp theo 1 ký tự, phụ âm cuối 4 ký tự, không có trường hợp này----

    // phụ âm đầu 2 ký tự, nguyên âm tiếp theo 4 ký tự, không có trường hợp này--------

    // phụ âm đầu 2 ký tự, nguyên âm tiếp theo 3 ký tự, phụ âm cuối 1 ký tự
    // vna_first_csnt2() phụ âm 2 ký tự, vna_triphthongs() nguyên âm 3 ký tự, vna_last_csnt1() phụ âm cuối 1 ký tự
    // vna_no_sound_end3() mảng nguyên âm 3 không được phép có ký tự ở cuối
    if (in_array($lett02, vna_first_csnt2()) && in_array($lett23, vna_triphthongs()) && in_array($lett51, vna_last_csnt1()) && !in_array($lett23, vna_no_sound_end3())) {
        $rs = 1;
    }

    // phụ âm đầu 2 ký tự, nguyên âm tiếp theo 2 ký tự, phụ âm cuối 2 ký tự
    // vna_first_csnt2() phụ âm đầu 2 ký tự, vna_diphthongs() nguyên âm 2 ký tự, vna_last_csnt2() phụ âm cuối 2 ký tự
    // vna_no_sound_end2() mảng nguyên âm đôi không được phép có âm cuối
    if (in_array($lett02, vna_first_csnt2()) && in_array($lett22, vna_diphthongs()) && in_array($lett42, vna_last_csnt2()) && !in_array($lett22, vna_no_sound_end2())) {
        $rs = 1;
    }

    // phụ âm đầu 2 ký tự, nguyên âm tiếp theo 1 ký tự, phụ âm cuối 3 ký tự, không có trường hợp này----

    // phụ âm đầu 3 ký tự, nguyên âm tiếp theo 3 ký tự
    // phụ âm đầu 3 ký tự chỉ có ngh, vna_triphthongs() mảng nguyên âm 3 ký tự
    if ($lett03 == "ngh" && in_array($lett33, vna_triphthongs())) {
        $rs = 1;
    }

    // phụ âm đầu 3 ký tự, nguyên âm tiếp theo 2 ký tự, phụ âm cuối 1 ký tự
    // vna_diphthongs() mảng nguyên âm 2 ký tự, vna_last_csnt1() phụ âm cuối 1 ký tự
    // vna_no_sound_end2() mảng các nguyên âm đôi không được có âm cuối
    if ($lett03 == "ngh" && in_array($lett32, vna_diphthongs()) && in_array($lett51, vna_last_csnt1()) && !in_array($lett22, vna_no_sound_end2())) {
        $rs = 1;
    }

    // phụ âm đầu 3 ký tự, nguyên âm tiếp theo 1 ký tự, phụ âm cuối 2 ký tự
    // vna_vowel_lett() mảng nguyên âm một ký tự, vna_last_csnt2() mảng phụ âm 2 ký tự
    if ($lett03 == "ngh" && in_array($lett31, vna_vowel_lett()) && in_array($lett42, vna_last_csnt2())) {
        $rs = 1;
    }

    return $rs;
}


// chỉ áp dụng với một từ, kiểm tra chính tả
function vn_spell_chr_small($str)
{
    $rs = 1; // ban đầu cho là đúng chính tả
    $str2 = vn_low_rmv($str); // xóa khoảng trắng dư thừa, chuyển thành ký tự thường
    $str3 = vn_remove_accents($str); // xóa dấu
    $count_char = vn_num_char($str3); // số lượng ký tự

    // không được có ký tự nước ngoài
    if (vn_foreign_check_low($str2)) {
        $rs = 0;
    }

    // từ tiếng Việt có nhiều chữ cái nhất là nghiêng với 7 chữ cái
    // các từ đúng chính tả chỉ có 6 chữ cái trở xuống
    if ($rs == 1) { // để nó đỡ phải thực hiện kiểm tra quá nhiều
        if (($str2 != "nghiêng") && (vn_num_char($str2) > 6)) {
            $rs = 0;
        }
    }

    // số lượng từ có dấu không được lớn hơn 1
    if ($rs == 1) { // để nó đỡ phải thực hiện kiểm tra quá nhiều
        if (vn_num_acc_char($str2) > 1) {
            $rs = 0;
        }
    }

    // tối đa 3 nguyên âm, tối thiểu 1 nguyên âm và các nguyên âm cần phải đứng cạnh nhau
    if ($rs == 1) { // để nó đỡ phải thực hiện kiểm tra quá nhiều
        if (vn_vowel_next_other($str2) == 0) {
            $rs = 0;
        }
    }

    // nếu từ có một ký tự
    if ($count_char == 1) {
        if (vn_spell_one_char($str3) == 0) {
            $rs = 0;
        }
    }

    // nếu từ có hai ký tự
    if ($count_char == 2) {
        if (vn_spell_two_chars($str3) == 0) {
            $rs = 0;
        }
    }

    // nếu từ có ba ký tự
    if ($count_char == 3) {
        if (vn_spell_three_chars($str3) == 0) {
            $rs = 0;
        }
    }

    // nếu từ có bốn ký tự
    if ($count_char == 4) {
        if (vn_spell_four_chars($str3) == 0) {
            $rs = 0;
        }
    }

    // nếu từ có năm ký tự
    if ($count_char == 5) {
        if (vn_spell_five_chars($str3) == 0) {
            $rs = 0;
        }
    }

    // nếu từ có sáu ký tự
    if ($count_char == 6) {
        if (vn_spell_six_chars($str3) == 0) {
            $rs = 0;
        }
    }

    return $rs;
}


// thiết kế kiểm tra chính tả cho một cụm nhiều từ
function vn_spell_chr_big($str)
{
    $rs = 1; // gán cho đúng chính tả lúc ban đầu 
    $str2 = vn_rmv_wsp($str); // xóa bỏ khoảng trắng dư thừa
    $words = mb_split(' ', $str2); // tách từ

    foreach ($words as $word) {
        if ($word != NULL) {
            if (vn_spell_chr_small($word) == 0) {
                $rs = 0;
                break;
            }
        }
    }

    return $rs;
}
