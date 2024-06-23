<?php
session_start();
if (!isset($_SESSION['userdata'])) {
    header("location: ../index.html");
}
$userdata = $_SESSION["userdata"];
$groups = $_SESSION["groupsdata"];
if ($_SESSION['userdata']['status'] == 0) {
    $status = '<b style="color: red">not voted</b>';
} else {
    $status = '<b style="color:green">voted</b>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../stylesHEET/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #header {
            width: 100%;
            background-color: #007bff;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        #main {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 1200px;
            width: 90%;
            margin-top: 20px;
        }

        #profile,
        #group {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            margin-bottom: 20px;
        }

        #profile {
            max-width: 400px;
            text-align: center;
        }

        #group {
            overflow-y: auto;
            max-height: 600px;
        }

        #back,
        #login {
            display: inline-block;
            text-decoration: none;
            padding: 8px;
            font-size: 15px;
            border: 2px solid black;
            border-radius: 4px;
            background-color: #fff;
            color: #000;
            margin-bottom: 10px;
        }

        #btttn {
            margin-top: 10px;
            padding: 8px;
            font-size: 18px;
            border: none;
            width: 100%;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        #btttn:hover {
            background-color: #0056b3;
        }

        .group-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
        }

        .group-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-right: 20px;
            border-radius: 50%;
        }

        .group-info {
            flex: 1;
        }

        .group-info h3 {
            margin: 0;
            color: #333;
        }

        .group-info p {
            margin: 5px 0;
            color: #555;
        }

        .group-vote {
            flex-shrink: 0;
        }

        @media (min-width: 768px) {
            #main {
                flex-direction: row;
                justify-content: space-between;
            }

            #group {
                width: 65%;
            }

            #profile {
                width: 30%;
                margin-right: 20px;
            }
        }
    </style>
</head>

<body>
    <div id="header">
        <a href="#" id="back">Back</a>
        <a href="../index.html" id="login">Login</a>
        <h1>Online Voting System</h1>
    </div>
    <div id="main">
        <div id="profile">
            <img src="../uploads/<?php echo $userdata['image'] ?>" alt="Profile Image" width="200px" height="200px">
            <h3>Name: <?php echo $userdata['name'] ?></h3>
            <p>Number: <?php echo $userdata['mobile'] ?></p>
            <p>Address: <?php echo $userdata['address'] ?></p>
            <p>Status: <?php echo $status ?></p>
        </div>
        <div id="group">
            <?php foreach ($groups as $group) { ?>
                <div class="group-item">
                    <img src="../uploads/<?php echo $group['image'] ?>" alt="Group Image">
                    <div class="group-info">
                        <h3>Group name: <?php echo $group['name'] ?></h3>
                        <p>Vote count: <?php echo $group['votes'] ?></p>
                    </div>
                    <div class="group-vote">
                        <form action="../connection/vote.php" method="post">
                            <input type="hidden" name="gvotes" value="<?php echo $group['votes'] ?>">
                            <input type="hidden" name="gid" value="<?php echo $group['id'] ?>">
                            <input type="submit" name="vbtn" value="Vote" id="btttn">
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>
