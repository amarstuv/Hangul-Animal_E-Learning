<?php
    include 'action/db_connect.php';
    include 'action/auth.php';

    //$userID = $_SESSION['userID'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('header.php') ?>
        <title>Home | Hangul Animal Learning</title>
    </head>
    <body>
        <?php require_once 'nav_bar.php';?>
        <div class="container-fluid admin">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <th>Quiz</th>
                                <th>Items</th>
                            <?php if($_SESSION['role'] == 2):?>
                                <th>Status</th>
                            <?php endif;?>
                            <?php if($_SESSION['role'] == 1):?>
                                <th>Had Taken</th>
                            <?php endif;?>
                            </thead>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>