<?php include "../model/checkauth.php"; ?>

<nav class="navbar navbar-expand-lg navbar-dark  bg-dark shadow-sm">
        <a class="navbar-brand" href="./index.php"> 
            Dashboard
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="./gallery.php">Gallery</a>
                </li> 
                <li class="nav-item ">
                    <a class="nav-link" href="./packagebookings.php">Package Bookings</a>
                </li> 
                <li class="nav-item ">
                    <a class="nav-link" href="./vehiclebookings.php">Vehicle Bookings</a>
                </li> 
                <li class="nav-item ">
                    <a class="nav-link" href="./queries.php">Queries</a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="../model/logout.php">logout</a>
                </li>
            </ul>
        </div>

    </nav>