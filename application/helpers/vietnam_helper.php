<?php

/* 
 * PHP array Vietnamese vowels and consonants v1.2
 * MIT License
 * Nguyen Duc Anh - freehost.page
 */



////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////



// lett viết tắt của letters nghĩa là các chữ cái
function vna_all_lett() { // mảng chữ cái tiếng Việt, gồm 29 chữ cái
    $letters = array("a","ă","â","b","c","d","đ","e","ê","g","h","i","k","l","m","n","o","ô","ơ","p","q","r","s","t","u","ư","v","x","y");

return $letters;    
}



////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////



// mã hóa hex của dấu tiếng Việt, thanh bằng không có dấu
function vna_hex_timbre(){
    $timbre = array("cc81","cc80","cc89","cc83","cca3"); // sắc, huyền, hỏi, ngã, nặng

return $timbre;    
}

// cc81: sắc

// cc80: huyền

// cc89: hỏi

// cc83: ngã

// cca3: nặng



////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////



// vowel nghĩa là nguyên âm
function vna_vowel_lett() { // mảng nguyên âm đơn tiếng Việt, mã hóa phổ thông, không kèm dấu, 12 nguyên âm đơn
    $sv = array("a","ă","â","e","ê","i","o","ô","ơ","u","ư","y");
    
return $sv;
}



////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////



// diphthongs nghĩa là nguyên âm đôi
function vna_diphthongs() { //nguyên âm đôi tiếng Việt, không kèm dấu, 32 nguyên âm đôi
    $diphthongs = array("ai", "ao", "au", "âu", "ay", "ây", "eo", "êu", "ia", "iê", "yê", "iu", "oa", "oă", "oe", "oi", "ôi", "ơi", "oo", "ôô", "ua", "uă", "uâ", "ưa", "uê", "ui", "ưi", "uo", "uô", "uơ", "ươ", "ưu", "uy"); 

return $diphthongs;    
}



////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////



// triphthongs nghĩa là nguyên âm ba
function vna_triphthongs() { //nguyên âm ba tiếng Việt, không kèm dấu, 14 nguyên âm ba
    $triphthongs = array("iêu", "yêu", "oai", "oao", "oay", "oeo", "uây", "uôi", "ươi", "ươu", "uya", "uyu", "uyê", "uao");
    
return $triphthongs;     
}



////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////



// 26 phụ âm được phép đứng đầu từ
function vna_first_csnt() { // phụ âm đầu được phép trong tiếng Việt, gồm 26 phụ âm đầu
    $vfc = array("b","c","ch","d","đ","g","gh","gi","h","k","kh","l","m","n","nh","ng","ngh","ph","qu","r","s","t","th","tr","v","x");

return $vfc;   
}

// 15 phụ âm đơn được phép đứng đầu từ
function vna_first_csnt1() {
    $vfc = array("b","c","d","đ","g","h","k","l","m","n","r","s","t","v","x");

return $vfc;   
}

// 10 phụ âm đôi được phép đứng đầu từ
function vna_first_csnt2() { 
    $vfc = array("ch","gh","gi","kh","nh","ng","ph","qu","th","tr");

return $vfc;   
}

// 1 phụ âm ba được phép đứng đầu từ
function vna_first_csnt3() { 
    $vfc = array("ngh");

return $vfc;   
}

////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////



// 8 phụ âm được phép đứng cuối từ, không có phụ âm cuối nào có hơn 2 ký tự
function vna_last_csnt() { // phụ âm cuối được phép trong tiếng Việt, gồm 8 phụ âm, mã hóa hex phổ thông
    $vlc = array("c","ch","m","n","nh","ng","p","t");

return $vlc;    
}

// 5 phụ âm đơn được phép đứng cuối từ
function vna_last_csnt1() { 
    $vlc = array("c","m","n","p","t");

return $vlc;    
}

// 3 phụ âm đôi được phép đứng cuối từ
function vna_last_csnt2() { 
    $vlc = array("ch","nh","ng");

return $vlc;    
}


////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////



// 6 nguyên âm bắt bắt buộc phải có phụ âm cuối
function vna_final_csnt_req() { // những nguyên âm bắt buộc phải có phụ âm cuối, không được phép là nguyên âm
    $fcr = array("ă","oă","oo","ôô","uă","uyê");
    
return $fcr;     
}

// 1 nguyên âm đơn bắt bắt buộc phải có phụ âm cuối
function vna_final_csnt_req1() { 
    $fcr = array("ă");
    
return $fcr;     
}

// 4 nguyên âm đôi bắt bắt buộc phải có phụ âm cuối
function vna_final_csnt_req2() { 
    $fcr = array("oă","oo","ôô","uă");
    
return $fcr;     
}

// 1 nguyên âm ba bắt bắt buộc phải có phụ âm cuối
function vna_final_csnt_req3() {
    $fcr = array("uyê");
    
return $fcr;     
}


////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////



// 6 nguyên âm bắt buộc phải có âm cuối
function vna_final_voc_req() { // những nguyên âm cần có âm cuối và có thể là nguyên âm hoặc phụ âm đều được
    $fvr = array("â","iê","uâ","uô","ươ","yê");

return $fvr;    
}

// 1 nguyên âm đơn bắt buộc phải có âm cuối
function vna_final_voc_req1() { 
    $fvr = array("â");

return $fvr;    
}

// 5 nguyên âm đôi bắt buộc phải có âm cuối
function vna_final_voc_req2() {
    $fvr = array("iê","uâ","uô","ươ","yê");

return $fvr;    
}

////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////



// 29 nguyên âm đôi và ba không được phép có âm cuối
// gồm 16 nguyên âm đôi và 13 nguyên âm ba
function vna_no_sound_end() { // những nguyên âm không được phép có âm cuối, dù âm cuối là nguyên âm hay phụ âm
    $nse = array("ai","ao","au","âu","eo","êu","ia","iu","oi","ôi","ơi","ưa","ui","ưi","ưu","uơ","iêu","yêu","oai","oao","oay","oeo","uai","uây","uôi","ươi","ươu","uya","uyu");                    

return $nse;    
}

function vna_no_sound_end2() { // 16 nguyên âm đôi không được phép có âm cuối, dù âm cuối là nguyên âm hay phụ âm
    $nse = array("ai","ao","au","âu","eo","êu","ia","iu","oi","ôi","ơi","ưa","ui","ưi","ưu","uơ");                    

return $nse;    
}

function vna_no_sound_end3() { // 13 nguyên âm ba không được phép có âm cuối, dù âm cuối là nguyên âm hay phụ âm
    $nse = array("iêu","yêu","oai","oao","oay","oeo","uai","uây","uôi","ươi","ươu","uya","uyu");

return $nse;    
}

////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////



// 60 nguyên âm có dấu đi kèm
function vna_acc_char_array() { // mảng nguyên âm đơn có dấu, mã hóa hex phổ thông, gồm 60 ký tự
    $acc = array("á","à","ả","ã","ạ","ắ","ằ","ẳ","ẵ","ặ","ấ","ầ","ẩ","ẫ","ậ","é","è","ẻ","ẽ","ẹ","ế","ề","ể","ễ","ệ","ó","ò","ỏ","õ","ọ","ố","ồ","ổ","ỗ","ộ","ờ","ớ","ở","ỡ","ợ","ú","ù","ủ","ũ","ụ","ứ","ừ","ử","ữ","ự","ý","ỳ","ỷ","ỹ","ỵ","í","ì","ỉ","ĩ","ị");

return $acc;
}



////////////////////////////////////////////////////////////////////////////////
// các ký tự viết HOA từ tiếng Việt, bao gồm cả có dấu và không dấu
function vn_upp_letters() {
    $upp = array("A","Á","À","Ả","Ã","Ạ","Ă","Ắ","Ằ","Ẳ","Ẵ","Ặ","Â","Ấ","Ầ","Ẩ","Ẫ","Ậ","E","É","È","Ẻ","Ẽ","Ẹ","Ê","Ế","Ề","Ể","Ễ","Ệ","O","Ó","Ò","Ỏ","Õ","Ọ","Ô","Ố","Ồ","Ổ","Ỗ","Ộ","Ơ","Ờ","Ớ","Ở","Ỡ","Ợ","U","Ú","Ù","Ủ","Ũ","Ụ","Ư","Ứ","Ừ","Ử","Ữ","Ự","Y","Ý","Ỳ","Ỷ","Ỹ","Ỵ","I","Í","Ì","Ỉ","Ĩ","Ị","Đ","B","C","D","G","H","K","L","M","N","P","Q","R","S","T","V","X");

return $upp;    
}

/////////////////////////////////////////////////////////////////////// End code