<?php

if ($_POST['signature'] == 'MWeZff8s[zhkD5e55a62a0e_b.a0.eft5juw7xKJH') {
    $tempfile =  $_FILES['fileToUpload']['tmp_name'];

    $fn = $_POST['fn'];
    $folder = $_POST['folder'];
    $caption = isset($_POST['caption']) ? $_POST['caption'] : '';


    $imageFile = "../$folder/$fn.jpg";
    $captionFile = "../$folder/$fn.txt";

    move_uploaded_file($tempfile, $imageFile);
    if (strlen(trim($_POST['caption'])) > 0) {
        file_put_contents($captionFile, $_POST['caption']);
    }
}