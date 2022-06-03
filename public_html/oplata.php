<?php 
$price = $_GET['sum'];
$id = $_GET['tel'];

    $params = array(
      'receiver' => "410011975416409",
      'quickpay-form' => 'small',
      'targets' => 'Оплата заказа №'.$id,
      'paymentType' => "AC",
      'sum' => $price,
      'label' => '432432',
      'successURL' => 'http://'.$_SERVER["HTTP_HOST"].'/api/yandex/success/'.$id
    );

    header("Location: https://money.yandex.ru/quickpay/confirm.xml?".http_build_query($params));
?>