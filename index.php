<?php
require 'config.php';
require 'opensea_api.php';
require 'data_processor.php';
require 'logger.php';

$api = new OpenSeaAPI();
$assets = $api->getTopAssets();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OpenSea NFT Demo</title>
    <style>
        .nft-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .nft {
            margin: 10px;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 8px;
            width: 200px;
        }
        .nft img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Popüler OpenSea NFT'leri</h1>
    <div class="nft-container">
        <?php foreach ($assets['assets'] as $asset): ?>
            <div class="nft">
                <h2><?= htmlspecialchars($asset['name']) ?></h2>
                <img src="<?= htmlspecialchars($asset['image_url']) ?>" alt="<?= htmlspecialchars($asset['name']) ?>">
                <!-- Diğer bilgiler eklenebilir -->
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>