<?php 

require "libs/rb.php";
    R::setup( 'mysql:host=localhost;dbname=u91297ut_1',
        'u91297ut_1', 'mUIp%tl6' );
    $data = $_POST;
    $NewDate = $data['NewDate'];
    $OldDate = $data['OldDate'];

    $Brom = R::load('settings', 12);
    $Brom->data=$NewDate;
    R::store($Brom);
    $Brom = R::load('settings', 13);
    $Brom->data=$OldDate;
    R::store($Brom);


    $w=0;
    $provodka=1;
    $OrderDate = R::getCol('SELECT `data_time` FROM orders');
    $OrderIdTovarov = R::getCol('SELECT `id_tovarov` FROM orders');
    $OrderIspolnen = R::getCol('SELECT `ispolnen` FROM orders');
    $ItemsTemp = R::getCol('SELECT `temp` FROM items');
    $ItemsId = R::getCol('SELECT `id` FROM items');
    $StopItems = R::count('items');
    $Stop = R::count('orders');
    if($NewDate==$OldDate){
        $AllDay=$OldDate;
        //обнулить temp
        for($i=0;$i<=$StopItems-1;$i++){
            $UpTemp=R::load('items',$ItemsId[$i]);
            $UpTemp->temp=0;
            R::store($UpTemp);}

        //id
    for($i=0;$i<=$Stop-1;$i++){
        $DataT = explode(" ", $OrderDate[$i]);
        if($DataT[0]==$AllDay){
            if($OrderIspolnen[$i]!=0){
                $AllId[$w]=$OrderIdTovarov[$i];$w++;}}}
                if ($AllId=="")header('Location: /ot4');
            //обновить temp
        for($w=0;$w<=count($AllId)-1;$w++){
            $NoZap = explode(",", $AllId[$w]);
        
        for($s=0;$s<=count($NoZap)-2;$s++){
            $NoToch = explode(".", $NoZap[$s]);
            $Obnova = R::load('items', $NoToch[0]);
            $Obnova->temp+=$NoToch[1];
            R::store($Obnova);

        }}
 header('Location: /ot4');}
 else {
    $AllDay = createRange($NewDate, $OldDate);
    //id
    for($i=0;$i<=$Stop-1;$i++){
        $DataT = explode(" ", $OrderDate[$i]);
        //проверка даты
        for($f=0;$f<=count($AllDay)-1;$f++){
            if($DataT[0]==$AllDay[$f]){
                if($OrderIspolnen[$i]!=0){
                $AllId[$w]=$OrderIdTovarov[$i];$w++;}
            }}} if ($AllId=="")header('Location: /ot4');
            //обнулить temp
        for($i=0;$i<=$StopItems-1;$i++){
            $UpTemp=R::load('items',$ItemsId[$i]);
            $UpTemp->temp=0;
            R::store($UpTemp);}

            
            //обновить temp
        for($w=0;$w<=count($AllId)-1;$w++){
            $NoZap = explode(",", $AllId[$w]);
        
        for($i=0;$i<=count($NoZap)-2;$i++){
            $NoToch = explode(".", $NoZap[$i]);
            $Obnova = R::load('items', $NoToch[0]);
            $Obnova->temp+=$NoToch[1];
            R::store($Obnova);
        }}


header('Location: /ot4');}

function createRange($startDate, $endDate) {
    $tmpDate = new DateTime($startDate);
    $tmpEndDate = new DateTime($endDate);

    $outArray = array();
    do {
        $outArray[] = $tmpDate->format('Y-m-d');
    } while ($tmpDate->modify('+1 day') <= $tmpEndDate);

    return $outArray;
}