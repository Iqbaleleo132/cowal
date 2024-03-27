<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Halaman Login</title>
   <style>
body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-image: url('../../assets/images/hero01.jpg');
    background-size:1900px
    /* background: linear-gradient(90deg, rgba(34,193,195,1) 0%, rgba(240,45,253,1) 100%);  */

}

.kotak-login {
    width: 300px;
    background-color: #00224D;
    padding: 50px;
    border-radius: 30px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.kotak-login h4, h3 {
    margin-bottom: 20px;
    color: goldenrod;
    font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
}

.kotak-login label {
    margin-bottom: 5px;
    color:goldenrod;
    font-size: 14px;
}

.kotak-login input[type="text"],
.kotak-login input[type="password"] {
    width: 70%;
    padding: 10px;
    border: 1px solid black;
    border-radius: 5px;
    outline: none;
    font-size: 16px;
    margin-bottom: 20px;
}

.kotak-login input[type="text"]:focus,
.kotak-login input[type="password"]:focus {
    border-color: black;
}

.kotak-login button[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: black;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.kotak-login button[type="submit"]:hover {
    background-color: #3D3B40;
}

</style>

    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<body>




    <div class="kotak-login">
        <h3 >E -Ticketing Airplane</h3>
        <h4 >Silahkan Login</h4>

        <form action="process.php" method="POST">
            <label for="username" >Username</label><br />
            <input type="text" name="username" id="username" class="form-control"><br /><br />

            <label for="password" >Password</label><br />
            <input type="password" name="password" id="password" class="form-control"><br /> <br />

            <button type="submit" name="login" style="color: goldenrod;">Login</button>

        </form>
    </div>
</body>
</html>