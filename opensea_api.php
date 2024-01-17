<?php
// opensea_api.php

class OpenSeaAPI {
    private $apiUrl = 'https://api.opensea.io/api/v1/assets';
    private $limit = 20; // Çekilecek NFT sayısı

    public function getTopAssets() {
        $params = [
            'order_by' => 'sale_count',
            'order_direction' => 'desc',
            'offset' => '0',
            'limit' => $this->limit
        ];

        $url = $this->apiUrl . '?' . http_build_query($params);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            // API anahtarı gerekiyorsa: 'X-API-KEY: ' . OPENSEA_API_KEY
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }
}
