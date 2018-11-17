    <?php
    session_start();
    $message="Thank you for visiting";
    if(session_destroy())
    {
    header("Location: login.php?message=$message");
    }
    ?>