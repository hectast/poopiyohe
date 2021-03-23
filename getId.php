<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=d, initial-scale=1.0">
    <title>Get ID of Clicked button using JavaScript</title>
</head>
<body>
    <button id="1" onclick="gfgClick(this.id)">Button 1</button>
    <button id="2" onclick="gfgClick(this.id)">Button 2</button>
    <button id="3" onclick="gfgClick(this.id)">Button 3</button>
    <p id="gfgDown">

    </p>

    <script>
        var el_down = document.getElementById("gfgDown"); 

        function gfgClick(clicked)
        {
            el_down.innerHTML = "ID = " + clicked;
        }
    </script>
</body>
</html>
