<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <input type="text" name="imie" id="imie">
    <button onclick="szukaj()">szukaj</button>
    <div id="result"></div>
    <script>
        function szukaj(){
            const dane = {
                imie: document.getElementById('imie').value
            }
            fetch(
                "api.php",{
                    method: "POST",
                    headers:{
                        "Content-Type":"application/json"
                    },
                    body: JSON.stringify(dane)
                }
            )
                .then(response=>response.json())
                .then(data=>{
                    const result = document.getElementById('result');
                    console.log(data)
                    result.innerHTML="";
                    data.forEach(pies=>{
                        console.log(pies.imie)
                        result.innerHTML += "imie  "+pies.imie+" waga "+pies.waga+"<br />"
                    })
                })
        }
    </script>
</body>
</html>