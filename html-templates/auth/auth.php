<?php

// Allow manipulative iFraming
header("Access-Control-Allow-Origin: *");

if(isset($_GET["success"])) {

?>

<html class="success">
<body>
    <input id="id" type="hidden" value="12345" />
    <h1>Success</h1>
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
