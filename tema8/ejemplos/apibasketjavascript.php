<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Api Basket</title>
</head>
<body>
    <h1>Api Basket</h1>


<script>
fetch("https://cors-anywhere.herokuapp.com/https://v1.basketball.api-sports.io/leagues", {
    "method": "GET",
    "headers": {
        "x-rapidapi-host": "v1.basketball.api-sports.io",
        "x-rapidapi-key": "fbb2492c4e5cb243ee897046da86eca6	"
    }
})
.then(response => {
    console.log(response);
})
.catch(err => {
    console.log(err);
});
</script>

</body>
</html>