<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data["title"]; ?></title>
</head>

<body>
    <h1>Dashboard</h1>
    <code id="example"></code>
    <script>
        var output = document.getElementById("example");

        fetchDefault();

        async function fetchDefault() {
            var result = await fetch('/scratch/user/');
            console.log(result);
        }
    </script>
</body>

</html>