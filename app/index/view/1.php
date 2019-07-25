
<!DOCTYPE html>
<html>
    <head>
        <title><?= $dn['domain'] ?> - <?= $dn['name'] ?> - <?= $dn['title'] ?></title>
        <meta name="description" content="<?= $dn['description'] ?>" />
        <meta name="keywords" content="<?= $dn['keywords'] ?>" />
        <meta content='width=device-width, initial-scale=1' name='viewport'>
        <meta content='notranslate' name='google'>
        <link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet'>
        <link crossorigin='anonymous' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' rel='stylesheet'>
        <style>
            body {
                font-family: 'Noto Sans', sans-serif; }

            #index .landing {
                position: fixed;
                top: 30vh;
                left: 0;
                right: 0;
                text-align: center; }
            #index .domain {
                font-size: 60px;
                font-weight: 700; }
            #index .domain span {
                color: #08d; }
            @media (max-width: 500px) {
                #index .domain {
                    font-size: 40px; } }
            #index .lucky {
                background: #08d;
                border: 1px solid #048;
                padding: 0.3rem 2rem; }
            #index .lucky:hover {
                background: #19e; }

            #domains h1 {
                font-weight: 700; }
            #domains h3 {
                margin-top: 1rem;
                font-weight: 700; }
            #domains .category {
                margin: 1rem 0;
                font-size: 17px;
                background-color: #08d;
                color: white;
                padding: 8px 10px; }
            #domains ul {
                padding-left: 0;
                list-style-type: none; }
            #domains li {
                line-height: 1.5; }

        </style>
    </head>
    <body id='index'>

        <script src='https://cdn.jsdelivr.net/npm/bubbly-bg@1.0.0/dist/bubbly-bg.js'></script>
        <script>
            function onReady() {
                const host = window.location.hostname;

                // remove www
                if (host.startsWith('www.')) {
                    const naked = host.replace('www.', '');
                    window.location.replace('//' + naked);
                    return;
                }

                // fix up domain text
                const parts = host.split('.');
                if (parts.length == 2) {
                    const base = parts[0];
                    const tld = parts[1];
                    document.title = host;
                    document.querySelector('.domain').innerHTML = base + '<span>.' + tld + '</span>';
                }

                bubbly({
                    colorStart: 'white',
                    colorStop: '#f0f0f0',
                    compose: 'source-over',
                    bubbleFunc: () => `hsla(203, 100%, 43%, ${Math.random() * 0.3})`,
                });
            }
            document.addEventListener('DOMContentLoaded', onReady, false);
        </script>



        <div class='landing'>
            <div>
                <?php
                if ($dn['logo'] != null) {
                    echo '<img src="' . $dn['logo'] . '">';
                }
                ?>
                <div class='domain'>
                    <span><?= $dn['domain'] ?></span>
                </div>
                <div class='mb-4'>
                    <?= unserialize(base64_decode($dn['data'])) ?>
                </div>
                <a class='lucky btn btn-primary' href='#'>联系我</a>
            </div>
        </div>
    </body>
</html>
