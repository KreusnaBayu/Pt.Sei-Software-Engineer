<?php
class Lokasi_model extends CI_Model {

    private $api_url = 'http://localhost:8080/lokasi';

    public function get_all() {
        $response = $this->curl_request($this->api_url);
        $data = json_decode($response, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            log_message('error', 'JSON Decode Error: ' . json_last_error_msg());
        }
        
        return $data;
    }
    
    public function get_lokasi_by_id($id) {
        $url = $this->api_url . '/' . $id;
        $response = $this->curl_request($url);
        $data = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            log_message('error', 'JSON Decode Error: ' . json_last_error_msg());
        }

        return $data;
    }

    public function create($data) {
        $response = $this->curl_request($this->api_url, 'POST', $data);
        return json_decode($response, true);
    }

    public function update($id, $data) {
        $url = $this->api_url . '/' . $id;
        $response = $this->curl_request($url, 'PUT', $data);
        return json_decode($response, true);
    }

    public function delete($id) {
        $url = $this->api_url . '/' . $id;
        $response = $this->curl_request($url, 'DELETE');
        return json_decode($response, true);
    }

    private function curl_request($url, $method = 'GET', $data = array()) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

        if ($method != 'GET') {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen(json_encode($data))
            ));
        }

        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}


?>
