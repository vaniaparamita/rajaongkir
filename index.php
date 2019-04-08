<!DOCTYPE html>
<html long="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale-1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
 <?php

    $curl = curl_init();
    $api_key = '0cd6f8691c39c9a83e4ed513bc5601a6';


    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "key: $api_key"
     ),     
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
    echo "cURL Error #:" . $err;
}   else {
//   echo $response;
}
echo "<label>Provinsi Tujuan</label><br>";
echo "<select name='provinsi' id='provinsi'>";
echo "<option>Pilih Provinsi Tujuan</option>";
$data = json_decode($response, true);
for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
    echo "<option value='".$data['rajaongkir']['results'][$i]['province']."'>".$data
    ['rajaongkir']['results'][$i]['province']."
    </option>";
 }
 echo "</select><br><br>";
 
 echo "<br><br><br>";
 $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "key: $api_key"
    ),
   ));
    echo "<label>Kota Asal</label><br>";
    echo "<select>";
    echo "<option>Pilih Kota Asal</option>";
    for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
        echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data
        ['rajaongkir']['results'][$i]['city_name']."
        </option>";
     }
     echo "</select><br><br>";
?>     
</body>
</html>