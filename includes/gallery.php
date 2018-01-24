<?php
include_once 'includes/dbh.php';

$queryA = "SELECT * FROM gallery WHERE gallery_id='1'";

$sthA = $conn->query($queryA);

$galleryresultA=mysqli_fetch_array($sthA);

$queryB = "SELECT * FROM gallery WHERE gallery_id='2'";

$sthB = $conn->query($queryB);

$galleryresultB=mysqli_fetch_array($sthB);

$queryC = "SELECT * FROM gallery WHERE gallery_id='3'";

$sthC = $conn->query($queryC);

$galleryresultC=mysqli_fetch_array($sthC);

$queryD = "SELECT * FROM gallery WHERE gallery_id='4'";

$sthD = $conn->query($queryD);

$galleryresultD=mysqli_fetch_array($sthD);