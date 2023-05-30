<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Doctors By Location</title>
</head>
<style>
    body {
        background-color: rgb(9, 52, 69);
    }

    .attribute {
        font-size: 18px;
        font-style: normal;
        position: relative;
        top: 60px;
        left: 10px;
        font-family: 'Times New Roman', Times, serif;
    }

    .banner {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 600px;
        height: 300px;
        margin: auto;
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
        background-color: rgb(131, 208, 239);
        position: relative;
        top: 100px;
        border-radius: 5px;
    }

    label {
        position: relative;
        right: 10px;
    }

    .banner form input[type="submit"] {
        float: left;
        display: block;
        color: rgb(219, 216, 216);
        text-align: center;
        padding: 15px;
        text-decoration: none;
        font-size: 19px;
        background-color: rgb(9, 52, 69);
        margin: 10px;
        border-radius: 5px;
        font-family: 'Times New Roman', Times, serif;
        border: none;
        position: relative;
        top: 40px;
        left: 240px;
        transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        cursor: pointer;
    }

    .banner form input[type="submit"]:hover {
        background-color: lightcyan;
        color: #000;
    }

    .banner form input[type="email"] {
        width: 220px;
        font-family: 'Times New Roman', Times, serif;
    }

    .banner form input[type="checkbox"] {
        width: 40px;
        height: 15px;
        position: relative;
        left: 7px;
    }

    .banner .check {
        font-family: 'Times New Roman', Times, serif;
        color: rgb(9, 52, 69);
        position: relative;
        right: 20px;
        top: 15px;
    }

    h2 {
        color: rgb(9, 52, 69);
        position: relative;
        top: 50px;
    }

    label {
        font-size: 20px;
    }
</style>

<body>

    <div class="banner">
        <h2>Filter Doctors By Location</h2>
        <!--  -->
        <form method="GET" action="submitlocation.php">
            <div class="attribute">
                <div class="check">
                    <input type="checkbox" name="doctorlocation[]" value="Boardbazar">
                    <label>Boardbazar</label>
                    <input type="checkbox" name="doctorlocation[]" value="Joydebpur">
                    <label>Joydebpur</label>
                    <input type="checkbox" name="doctorlocation[]" value="Kalameshwar">
                    <label>Kalameshwar</label>
                    <input type="checkbox" name="doctorlocation[]" value="Kaligonj">
                    <label>Kaligonj</label>

                </div>
                <input type="submit" name="submit">
        </form>

    </div>
</body>

</html>