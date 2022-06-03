<?php 

require "libs/rb.php";
    R::setup( 'mysql:host=localhost;dbname=u91297ut_1',
        'u91297ut_1', 'mUIp%tl6' );
    $data = $_POST;
    if( isset($data['up_status']) )
{
    $id = $data['id_status'];
    $order_up = R::load('orders',$id);
    $order_up->status = "1";
    //T=Tovar; K=Koli4
    if ($order_up->ispolnen=="0"){
   	$idTK = $order_up->id_tovarov;
   	$idMas = explode(",", $idTK);
    for($i=0;$i<count($idMas)-1;$i++){
    	$TK = explode(".", $idMas[$i]);
    	$tovar = R::findOne('items','id = ?',[$TK[0]]);
    	$tovar->sale+=$TK[1];
    	R::store($tovar);
    }}
    //
	if($order_up->user!=""){
    if ($order_up->ispolnen=="0"){
    $user_up = R::findOne('users','login = ?',[$order_up->user]);
    $user_up->money+=$order_up->summa_zakaza;
    R::store($user_up);}} 
    $order_up->ispolnen="1";
    R::store($order_up);


}

    if( isset($data['up_status2']) )
{
     $id = $data['id_status'];
    $order_up = R::load('orders',$id);
    $order_up->status = "2";

        if ($order_up->ispolnen=="0"){
   	$idTK = $order_up->id_tovarov;
   	$idMas = explode(",", $idTK);
    for($i=0;$i<count($idMas)-1;$i++){
    	$TK = explode(".", $idMas[$i]);
    	$tovar = R::findOne('items','id = ?',[$TK[0]]);
    	$tovar->sale+=$TK[1];
    	R::store($tovar);
    }}
    
	if($order_up->user!=""){
    if ($order_up->ispolnen=="0"){
    $user_up = R::findOne('users','login = ?',[$order_up->user]);
    $user_up->money+=$order_up->summa_zakaza;
    R::store($user_up);} }
    $order_up->ispolnen="1";
    R::store($order_up);
}

    header('Location: /admin');