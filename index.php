<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>

</head>

<body>
    <h1>hotel</h1>

    <?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    ?>

    <?php

    $parking_request = false;

    if (isset($_GET['parking']) && $_GET['parking'] == 'on') {
        $parking_request = true;
    }


    $minimum_vote = 0;
    if (isset($_GET['minimum_vote']) && is_numeric($_GET['minimum_vote']) && $_GET['minimum_vote'] > 0 && $_GET['minimum_vote'] < 10) {
        $minimum_vote = (int) $_GET['minimum_vote'];
    }


    ?>


    <form action="./index.php" method="GET">

        <input type="checkbox" , id="parking" name="parking">
        <label for="parking">parcheggio</label>

        <button>Filtra</button>


        <div class="form-controll">
            <input id="minimum_vote" name="minimum_vote" type="number" min="0" max="5">
            <label for="">Voto minimo</label>
        </div>






        <table class="table">
            <thead>
                <tr>
                    <th scope="col">NAME</th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">VOTE</th>
                    <th scope="col">PARKING</th>
                    <th scope="col">DISTANCE TO CENTER</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hotels as $hotel) {

                    if ($parking_request) {

                        if (!$hotel['parking']) {
                            continue;
                        }

                    }

                    if ($hotel['vote'] < $minimum_vote) {
                        continue;
                    }

                    ?>
                    <td><?php echo $hotel['name']; ?></td>
                    <td><?php echo $hotel['description']; ?></td>
                    <td><?php echo $hotel['vote']; ?></td>
                    <td><?php echo $hotel['parking'] ? 'presente' : 'assente'; ?></td>
                    <td><?php echo $hotel['distance_to_center']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>









        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
</body>

</html>