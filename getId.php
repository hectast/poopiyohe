<!-- <!DOCTYPE html>
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


    <div class="test">Test</div>
    <div class="list"></div>

    <script src="assets/js/jquery-2.1.4.min.js"></script>
    <script>
        var el_down = document.getElementById("gfgDown");

        function gfgClick(clicked) {
            el_down.innerHTML = "ID = " + clicked;
        }

        $('body').on('click', '.test', function() {

            var $this = $(this),
                count = $this.data('i') || 1,
                $test = $('.test'),
                list = $('.list');

            count++;
            $this.data('i', count);

            var result = [];

            for (var i = 1; i < count; i++) {
                result.push(i);
            }

            $test.attr('data-count', result.toString());
            var data_count = $test.attr('data-count');
            list.innerHTML = result;
            // console.log(list.attr = data_count);
        });
    </script>
</body>

</html> -->

<?php
include 'app/env.php';
$query = "SELECT * FROM auditor";
$result = $mysqli->query($query);

?>

<!DOCTYPE html>
<html>

<head>
    <title>
        Appending new elements to document body .
    </title>
</head>

<body>
    <?php
    while ($r = mysqli_fetch_assoc($result)) {
        echo "";
    ?>
        <button id="list<?= $r['id'] ?>" value="<?= $r['nama'] ?>">
            <?= $r['nama'] ?>
        </button>

        <script src="assets/js/jquery-2.1.4.min.js"></script>
        <script>
            // var Elements = $("#list");

            // function AddElementsByPureJs() {
            //     var fragment = document.createDocumentFragment();
            //     var e = document.createElement("li");
            //     e.innerHTML = Elements.val();
            //     fragment.append(e);
            //     var UlElement = document.getElementById('Languages');
            //     UlElement.append(fragment);
            // }

            $(document).ready(function() {
                $('#list<?= $r['id']; ?>').click(function() {
                    // $('#Languages > li').after('<li></li>');
                    const e = document.createElement("tr");
                    // e.className ="cek";
                    const td = "<td>" + $('#list<?= $r['id']; ?>').val() + "</td> <td> <button id='hapus<?= $r['id']; ?>' value='hapus'>X</button</td>";
                    e.innerHTML = td;
            
                    // console.log($(this).text());
                  
                    // console.log(e);
                    $('#Languages').append(e);

                    $('#hapus<?= $r['id']; ?>').click(function() {
                        e.remove();
                    });
                    
                });
            });
        </script>
    <?php
        echo "";
    }
    ?>
    <div id="LanguagesDiv">
        <table border="1" id="Languages">
        </table>
    </div>
    <script>
                                                
                                                $(function() {
                                                    $('#list<?= $r['id']; ?>').click(function() {
                                                        // $('#Languages > li').after('<li></li>');
                                                        const e = document.createElement("tr");
                                                        // e.className ="cek";
                                                        // const td = "<td>" + $('#list').val() + "</td> <td> <button id='hapus' value='hapus'>X</button</td>";
                                                        // const isiList = $('#list').val();
                                                        e.innerHTML = "<td><?= $nmr++; ?></td>";
                                                        e.innerHTML += "<td>" + $('#list<?= $r['id']; ?>').val() + "</td>";
                                                        e.innerHTML += "<td><button id='hapus<?= $r['id']; ?>' value='hapus' class='btn btn-sm btn-danger'><i class='fe fe-trash'></i></button><td>";

                                                        // console.log($(this).text());

                                                        // console.log(e);
                                                        $('#tblBody').append(e);
                                                        $('#hapus<?= $r['id']; ?>').click(function() {
                                                            e.remove();
                                                        });

                                                    });
                                                });
                                            </script>

</body>

</html>