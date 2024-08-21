<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Marvel</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: relative;
        }   
        .menu-btn {
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 32px;
            color: #fff;
            margin-left: 20px;
            border-radius: 50%; 
            border: 2px solid transparent; 
            width: 40px; 
            height: 40px; 
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .menu-btn:hover {
            border-color: #fff; 
            color: #fff;
        }
        .logout-btn {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }
        .logout-btn a {
            padding: 10px 20px;
            color: white;
            font-size: 20px;
        }
        .logout-btn a:hover {
            color: #fb8500;
            transition: color 0.5s ease;
        }
        /* Sidebar styles */
        .sidebar {
            background-color: #555;
            color: #fff;
            width: 200px;
            height: 100%;
            position: fixed; /* Change from 'fixed' to 'absolute' */
            top: 75px;
            left: -200px; /* Sidebar starts hidden */
            transition: left 0.3s ease; /* Smooth transition */
            overflow-x: hidden;
            padding-top: 20px;
            z-index: 1000; /* Ensure sidebar is above other content */
        }
        .header, footer {
            position: relative;
            z-index: 2000; /* Ensure header and footer are above the sidebar */
        }
        .sidebar a {
            margin: 10px;
            padding: 10px;
            display: block;
            color: #fff;
            text-decoration: none;
        }
        .sidebar a:hover {
            color: #fb8500;
            transition: color 0.5s ease;
        }

        /* Show sidebar when body has 'sidebar-visible' class */
        body.sidebar-visible .sidebar {
            left: 0;
        }

        #Btn1, #Btn2, #Btn3, #Btn4 {
            display: none;
        }
        
    </style>
</head>
<body>

<div class="header">
    <img src="images/icons8-football-50.png" class="menu-btn" id="menuBtn" alt="Menu">
    <h3>MATCH MARVEL</h3>
    <div class="logout-btn">
        <a href="../login.php">Logout</a>
    </div>
</div>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <a href="aindex.php">Dashboard</a>
    <a href="booked.php">Game books</a>
    <a href="tmbook.php">Tournaments books</a>
    <a href="#" id="settingsBtn">Settings</a>
    <a href="managetorn.php" id="Btn1">Manage Tournaments</a>
    <a href="Tournaments.php" id="Btn2">Add Tournaments</a>
    <a href="managegame.php" id="Btn3">Manage Games</a>
    <a href="games.php" id="Btn4">Add Games</a>
    <a href="message.php">Message Box</a>
    <a href="../login.php">Logout</a>
</div>
<!-- JavaScript to toggle sidebar visibility -->
<script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuBtn = document.getElementById('menuBtn');
            const body = document.querySelector('body');
            const sidebar = document.getElementById('sidebar');
            const settingsBtn = document.getElementById('settingsBtn');
            const Btn1 = document.getElementById('Btn1');
            const Btn2 = document.getElementById('Btn2');
            const Btn3 = document.getElementById('Btn3');
            const Btn4 = document.getElementById('Btn4');

            menuBtn.addEventListener('click', function() {
                body.classList.toggle('sidebar-visible');
            });

            sidebar.addEventListener('mouseout', function(event) {
                const relatedTarget = event.relatedTarget;
                if (!sidebar.contains(relatedTarget)) {
                    body.classList.remove('sidebar-visible');
                }
            });

            settingsBtn.addEventListener('click', function() {
                Btn1.style.display = Btn1.style.display === 'block' ? 'none' : 'block';
                Btn2.style.display = Btn2.style.display === 'block' ? 'none' : 'block';
                Btn3.style.display = Btn3.style.display === 'block' ? 'none' : 'block';
                Btn4.style.display = Btn4.style.display === 'block' ? 'none' : 'block';
            });
            
        });
    </script>

</body>
</html>
