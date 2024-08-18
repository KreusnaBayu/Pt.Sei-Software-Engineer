<?php
class Proyek_model extends CI_Model {

    private $api_url = 'http://localhost:8080/proyek';

    public function __construct() {
        parent::__construct();
        // No need to load the database if only using API
    }

    public function get_all() {
        $response = $this->curl_request($this->api_url);
        $data = json_decode($response, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            log_message('error', 'JSON Decode Error: ' . json_last_error_msg());
            return [];
        }
        
        return $data;
    }

    public function get_by_id($id) {
        if (!$id) {
            log_message('error', 'No ID provided for get_by_id');
            return [];
        }

        
        $url = $this->api_url . '/' . $id;
        $response = $this->curl_request($url);
        $data = json_decode($response, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            log_message('error', 'JSON Decode Error: ' . json_last_error_msg());
            return [];
        }

        return $data;
    }

    public function create($data) {
        $response = $this->curl_request($this->api_url, 'POST', $data);
        $result = json_decode($response, true);
    
        if (json_last_error() !== JSON_ERROR_NONE) {
            log_message('error', 'JSON Decode Error: ' . json_last_error_msg());
            return [];
        }
    
        return $result;
    }

    public function update($id, $data) {
        $url = $this->api_url . '/' . $id;
        $response = $this->curl_request($url, 'PUT', $data);
        $result = json_decode($response, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            log_message('error', 'JSON Decode Error: ' . json_last_error_msg());
            return [];
        }
        
        return $result;
    }
    
    public function delete($id) {
        $url = $this->api_url . '/' . $id;
        $response = $this->curl_request($url, 'DELETE');
        $result = json_decode($response, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            log_message('error', 'JSON Decode Error: ' . json_last_error_msg());
            return [];
        }
        
        return $result;
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

        if (curl_errno($ch)) {
            log_message('error', 'Curl error: ' . curl_error($ch));
            return '';
        }

        curl_close($ch);
        return $response;
    }
}
?>
