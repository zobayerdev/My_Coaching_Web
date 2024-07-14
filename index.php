<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
    <title>Admin Panel</title>
    <style>
        * {
            font-family: "Space Grotesk", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            font-family: "Space Grotesk", sans-serif;
            min-height: 100vh;
        }

        a {
            font-family: "Space Grotesk", sans-serif;
            text-decoration: none;
        }

        li {
            font-family: "Space Grotesk", sans-serif;
            list-style: none;
        }

        h1,
        h2 {
            font-family: "Space Grotesk", sans-serif;
            color: #444;
        }

        h3 {
            font-family: "Space Grotesk", sans-serif;
            color: #999;
        }

        .btn {
            font-family: "Space Grotesk", sans-serif;
            background: #45a049;
            color: white;
            padding: 5px 10px;
            text-align: center;
        }

        .btn:hover {
            font-family: "Space Grotesk", sans-serif;
            color: #45a049;
            background: white;
            padding: 3px 8px;
            border: 2px solid #45a049;
        }

        .title {
            font-family: "Space Grotesk", sans-serif;
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding: 15px 10px;
            border-bottom: 2px solid #999;
        }

        table {
            font-family: "Space Grotesk", sans-serif;
            padding: 10px;
        }

        th,
        td {
            font-family: "Space Grotesk", sans-serif;
            text-align: left;
            padding: 8px;
        }

        .side-menu {
            font-family: "Space Grotesk", sans-serif;
            position: fixed;
            background: #45a049;
            width: 20vw;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .side-menu .brand-name {
            font-family: "Space Grotesk", sans-serif;
            height: 10vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .side-menu li {
            font-family: "Space Grotesk", sans-serif;
            font-size: 24px;
            padding: 10px 40px;
            color: white;
            display: flex;
            align-items: center;
        }

        .side-menu li:hover {
            font-family: "Space Grotesk", sans-serif;
            background: white;
            color: #45a049;
        }

        .container {
            font-family: "Space Grotesk", sans-serif;
            position: absolute;
            right: 0;
            width: 80vw;
            height: 100vh;
            background: #f1f1f1;
        }

        .container .header {
            font-family: "Space Grotesk", sans-serif;
            position: fixed;
            top: 0;
            right: 0;
            width: 80vw;
            height: 10vh;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .container .header .nav {
            font-family: "Space Grotesk", sans-serif;
            width: 90%;
            display: flex;
            align-items: center;
        }

        .container .header .nav .search {
            font-family: "Space Grotesk", sans-serif;
            flex: 3;
            display: flex;
            justify-content: center;
        }

        .container .header .nav .search input[type=text] {
            font-family: "Space Grotesk", sans-serif;
            border: none;
            background: #f1f1f1;
            padding: 10px;
            width: 50%;
        }

        .container .header .nav .search button {
            font-family: "Space Grotesk", sans-serif;
            width: 40px;
            height: 40px;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container .header .nav .search button img {
            font-family: "Space Grotesk", sans-serif;
            width: 30px;
            height: 30px;
        }

        .container .header .nav .user {
            font-family: "Space Grotesk", sans-serif;
            flex: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .container .header .nav .user img {
            font-family: "Space Grotesk", sans-serif;
            width: 40px;
            height: 40px;
        }

        .container .header .nav .user .img-case {
            font-family: "Space Grotesk", sans-serif;
            position: relative;
            width: 50px;
            height: 50px;
        }

        .container .header .nav .user .img-case img {
            font-family: "Space Grotesk", sans-serif;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .container .content {
            font-family: "Space Grotesk", sans-serif;
            position: relative;
            margin-top: 10vh;
            min-height: 90vh;
            background: #f1f1f1;
        }

        .container .content .cards {
            font-family: "Space Grotesk", sans-serif;
            padding: 20px 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .container .content .cards .card {
            font-family: "Space Grotesk", sans-serif;
            width: 250px;
            height: 150px;
            background: white;
            margin: 20px 10px;
            display: flex;
            align-items: center;
            justify-content: space-around;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .container .content .content-2 {
            font-family: "Space Grotesk", sans-serif;
            min-height: 60vh;
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .container .content .content-2 .recent-payments {
            font-family: "Space Grotesk", sans-serif;
            min-height: 50vh;
            flex: 5;
            background: white;
            margin: 0 25px 25px 25px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            display: flex;
            flex-direction: column;
        }

        .container .content .content-2 .new-students {
            font-family: "Space Grotesk", sans-serif;
            flex: 2;
            background: white;
            min-height: 50vh;
            margin: 0 25px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            display: flex;
            flex-direction: column;
        }

        .container .content .content-2 .new-students table td:nth-child(1) img {
            font-family: "Space Grotesk", sans-serif;
            height: 40px;
            width: 40px;
        }

        @media screen and (max-width: 1050px) {
            .side-menu li {
                font-size: 18px;
            }
        }

        @media screen and (max-width: 940px) {
            .side-menu li span {
                display: none;
            }

            .side-menu {
                align-items: center;
            }

            .side-menu li img {
                width: 40px;
                height: 40px;
            }

            .side-menu li:hover {
                background: #45a049;
                padding: 8px 38px;
                border: 2px solid white;
            }
        }

        @media screen and (max-width:536px) {
            .brand-name h1 {
                font-size: 16px;
            }

            .container .content .cards {
                justify-content: center;
            }

            .side-menu li img {
                width: 30px;
                height: 30px;
            }

            .container .content .content-2 .recent-payments table th:nth-child(2),
            .container .content .content-2 .recent-payments table td:nth-child(2) {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="side-menu">
        <div class="brand-name">
            <h1>Brand</h1>
        </div>
        <ul>
            <li><img src="bg_image/dashboard (2).png" alt="">&nbsp; <span>Dashboard</span> </li>
            <li><a href="student/index.php"><img src="bg_image/reading-book (1).png" alt="">&nbsp;<span>Students</span></a></li>
            <li><a href="teachers/index.php"><img src="bg_image/teacher2.png" alt="">&nbsp;<span>Teachers</span></a></li>
            <li><img src="bg_image/school.png" alt="">&nbsp;<span>Schools</span> </li>
            <li><a href="income/index.php"><img src="bg_image/payment.png" alt="">&nbsp;<span>Income</span></a></li>
            <li><img src="bg_image/help-web-button.png" alt="">&nbsp; <span>Help</span></li>
            <li><img src="bg_image/settings.png" alt="">&nbsp;<span>Settings</span> </li>
        </ul>
    </div>
    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <input type="text" placeholder="Search..">
                    <button type="submit"><img src="bg_image/search.png" alt=""></button>
                </div>
                <div class="user">
                    <a href="logout.php" class="btn">Log out</a>
                    <img src="bg_image/notifications.png" alt="">
                    <div class="img-case">
                        <img src="bg_image/user.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>1</h1>
                        <a href="notice/inserts.php"><h3>Notice</h3></a>
                    </div>
                    <div class="icon-case">
                        <img src="bg_image/students.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>2</h1>
                        <h3>Class Routine</h3>
                    </div>
                    <div class="icon-case">
                        <img src="bg_image/teachers.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>3</h1>
                        <h3>Lecture Sheets</h3>
                    </div>
                    <div class="icon-case">
                        <img src="bg_image/schools.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>4</h1>
                        <h3>Exam Questions</h3>
                    </div>
                    <div class="icon-case">
                        <img src="bg_image/income.png" alt="">
                    </div>
                </div>
            </div>
            <!-- <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Recent Payments</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>School</th>
                            <th>Amount</th>
                            <th>Option</th>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                    </table>
                </div>
                <div class="new-students">
                    <div class="title">
                        <h2>New Students</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>option</th>
                        </tr>
                        <tr>
                            <td><img src="bg_image/user.png" alt=""></td>
                            <td>John Steve Doe</td>
                            <td><img src="bg_image/info.png" alt=""></td>
                        </tr>
                        <tr>
                            <td><img src="bg_image/user.png" alt=""></td>
                            <td>John Steve Doe</td>
                            <td><img src="bg_image/info.png" alt=""></td>
                        </tr>
                        <tr>
                            <td><img src="bg_image/user.png" alt=""></td>
                            <td>John Steve Doe</td>
                            <td><img src="bg_image/info.png" alt=""></td>
                        </tr>
                        <tr>
                            <td><img src="bg_image/user.png" alt=""></td>
                            <td>John Steve Doe</td>
                            <td><img src="bg_image/info.png" alt=""></td>
                        </tr>

                    </table>
                </div>
            </div> -->

            <!-- second part -->
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>5</h1>
                        <h3>Coaching Syllabus</h3>
                    </div>
                    <div class="icon-case">
                        <img src="bg_image/students.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>6</h1>
                        <h3>Youtube Video</h3>
                    </div>
                    <div class="icon-case">
                        <img src="bg_image/teachers.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>7</h1>
                        <h3>Image Gallery</h3>
                    </div>
                    <div class="icon-case">
                        <img src="bg_image/schools.png" alt="">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>8</h1>
                        <h3>Settings</h3>
                    </div>
                    <div class="icon-case">
                        <img src="bg_image/income.png" alt="">
                    </div>
                </div>
            </div>
        </div>


    </div>
</body>

</html>