<?php

// Allow manipulative iFraming
header("Access-Control-Allow-Origin: *");

if(isset($_GET["success"])) {

?>

<html class="success">
<body>
    <input id="id" type="hidden" value="12345" />
    <h1>Success</h1>
    <script>
    window.addEventListener('message', function(event) {

        console.log(event.data);
        window.parent.postMessage("test-a", '*');
        return;
        // IMPORTANT: Check the origin of the data!
        // if (~event.origin.indexOf('http://yoursite.com')) {
            // The data has been sent from your site

            // The data sent with postMessage is stored in event.data
            // console.log(event.data);
        // } else {
            // The data hasn't been sent from your site!
            // Be careful! Do not use it.
            // return;
        // }
    });
    </script>
</body>
</html>

<?php

} else {

?>

<html class="pending">
<body>
    <h1>Auth</h1>
    <a href="?success=true">Link<a>
</body>
</html>

<?php

}
