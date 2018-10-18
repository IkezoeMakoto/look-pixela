<?php

$pixelaUrl = 'https://pixe.la';

$uri = $_SERVER['REQUEST_URI'];
$originalUrl = $pixelaUrl . $uri;

$uris = explode('/', $uri);

$user = $uris[3] ?? null;
$graph = $uris[5] ?? null;

$title = $user . 'の' . $graph . 'グラフ';

?>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <meta charset="utf-8">
    <meta itemprop="name" content="<?php echo $title; ?>">
    <meta itemprop="image" content="<?php echo $originalUrl; ?>">

    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:type" content="graph">
    <meta property="og:url" content="<?php echo $originalUrl; ?>">
    <meta property="og:image" content="<?php echo $originalUrl; ?>">
    <meta property="og:description" content="<?php echo $title; ?>">
    <meta property="og:site_name" content="<?php echo $title; ?>">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:image" content="<?php echo $originalUrl; ?>">
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

