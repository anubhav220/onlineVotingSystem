<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System - Registration</title>
    <link rel="stylesheet" href="stylesregister.css">
</head>
<body>
    <div id="background">
        <div class="shape shape1"></div>
        <div class="shape shape2"></div>
        <div class="shape shape3"></div>
        <div class="shape shape4"></div>
    </div>
    <div id="container">
        <div id="header">
            <h1>Online Voting System</h1>
            <hr>
        </div>
        <div id="bodySection">
            <h3>Registration</h3>
            <form action="../connection/register.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="name" placeholder="Voter's name" required>
                </div>
                <div class="form-group">
                    <input type="number" name="number" placeholder="Mobile number" required>
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="password" name="cpassword" placeholder="Confirm password" required>
                </div>
                <div class="form-group">
                    <input type="text" name="address" placeholder="Address" id="address" required>
                </div>
                <div class="form-group">
                    <label for="photo">Upload here:</label>
                    <input type="file" name="photo" required>
                </div>
                <div class="form-group">
                    <label for="role">Select Role:</label>
                    <select name="role" id="role" required>
                        <option value="1">Voter</option>
                        <option value="2">Group</option>
                    </select>
                </div>
                <button id="button" type="submit">Register</button>
                <div class="text-center">
                    <br>
                    Already a user? <a href="../index.html">Login here</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
