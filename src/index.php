<?php

$pixelaUrl = 'https://pixe.la';
$host = 'https://look-pixela.zoe.tools';
$uri = $_SERVER['REQUEST_URI'];
$ogpImageUrl = $host.$uri.'.jpg';
$originalUrl = $pixelaUrl . $uri;

$uris = explode('/', $uri);

$user = $uris[3] ?? null;
$graph = $uris[5] ?? null;

$title = $user . 'の' . $graph . 'グラフ';
// jpgの時
if (pathinfo($uri, PATHINFO_EXTENSION) === 'jpg') {

    $uris[5] = pathinfo($uri, PATHINFO_FILENAME);
    $originalUrl = $pixelaUrl . implode('/', $uris);
    $result = '<?xml version="1.0" encoding="UTF-8"?>'.file_get_contents($originalUrl . '?mode=short');
    $imagick = new Imagick();
    $svg = $result;
    $imagick->readImageBlob($svg);
    $imagick->resizeImage(325, 200, imagick::FILTER_LANCZOS, 1);
    $imagick->setImageFormat("jpg");
    header("Content-Type: image/jpeg");
    header('Accept-Ranges: none');
    echo $imagick;
    return ;
}
?>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
    <meta charset="utf-8">
    <meta itemprop="name" content="<?php echo $title; ?>">
    <meta itemprop="image" content="<?php echo $ogpImageUrl; ?>">

    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:type" content="article">
    <meta property="og:image" content="<?php echo $ogpImageUrl; ?>">
    <meta property="og:description" content="<?php echo $title; ?>">
    <meta property="og:site_name" content="<?php echo $title; ?>">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="<?php echo $ogpImageUrl; ?>">
    <meta name="twitter:title" content="<?php echo $title; ?>">
    <meta name="twitter:description" content="<?php echo $title; ?>">
    <meta name="twitter:app:name:iphone" content="<?php echo $title; ?>">

    <title><?php echo $title; ?></title>
</head>
<body>
<h1><?php echo $title; ?></h1>
<img src="<?php echo $originalUrl; ?>">
</body>
</html>

