<?php 

require '../vendor/autoload.php';


function api() {
    $apiUrl = 'https://kodemuda.site/restfull_native/data.php';
    $apiToken = 'fira';  // Gantilah dengan token yang benar
    
    return array('url' => $apiUrl, 'token' => $apiToken);
}

function getAll() {
    // $startTime = microtime(true);
    
    $dataApi = api();
    $client = new \GuzzleHttp\Client();
    $response = $client->request('GET', $dataApi['url'], [
        'headers' => [
            'Auth' => 'Bearer ' . $dataApi['token'],
        ],
    ]);
    
    return $jsonResponse = json_decode($response->getBody(), true);
    // untuk cek waktu
    // $endTime = microtime(true);
    // $executionTime = ($endTime - $startTime); // Waktu dalam milidetik
    // echo "getAll execution time: {$executionTime} ms\n";
}

function getId($id) {
    $id = (int) $id;
    $dataApi = api();
    $client = new \GuzzleHttp\Client();

    try {
        //code...
        $response = $client->request('GET', $dataApi['url'], [
            'headers' => [
                'Auth' => 'Bearer ' . $dataApi['token'],
            ],
            'query' => [
                'id' => $id
            ]
        ]);
        if($response->getStatusCode() == 200) {
            return $jsonResponse = json_decode($response->getBody(), true);
        } else {
            return false;
        }
    } catch (\GuzzleHttp\Exception\ClientException $e) {
        return false;
        //throw $th;
    }
}

function addData($data) {
    $dataApi = api();
    $client = new \GuzzleHttp\Client();
    
    try {
        //code...
        $response = $client->request('POST', $dataApi['url'], [
            'headers' => [
                'Auth' => 'Bearer ' . $dataApi['token'],
            ],
            'json' => $data
        ]);
        if ($response->getStatusCode() == 200) {
            return true; // Berhasil menghapus data
        } else {
            return false;
        }
    } catch (\GuzzleHttp\Exception\ClientException $e) {
        return false;
    }
}

function editData($data) {
    $dataApi = api();
    $client = new \GuzzleHttp\Client();
    
    try {
        //code...
        $response = $client->request('PUT', $dataApi['url'], [
            'headers' => [
                'Auth' => 'Bearer ' . $dataApi['token'],
            ],
            'json' => $data
        ]);
        if ($response->getStatusCode() == 200) {
            return true; 
        } else {
            return false;
        }
    } catch (\GuzzleHttp\Exception\ClientException $e) {
        return false;
    }
}

function deleteData($id) {
    $id = (int) $id;
    $dataApi = api();
    $client = new \GuzzleHttp\Client();
    try {
        //code...
        $response = $client->request('DELETE', $dataApi['url'], [
            'headers' => [
                'Auth' => 'Bearer ' . $dataApi['token'],
            ],
            'json' => [
                'id' => $id
            ]
        ]);
        if ($response->getStatusCode() == 200) {
            return true; // Berhasil menghapus data
        } else {
            return false;
        }
    } catch (\GuzzleHttp\Exception\ClientException $e) {
        return false;
    }
}
?>