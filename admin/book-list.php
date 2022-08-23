<?php include("confs/auth.php") ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Book List</h1>

    <ul id="menu">
        <li><a href="book-list.php">Manage Books</a></li>
        <li><a href="cat-list.php">Manage Categories</a></li>
        <li><a href="orders.php">Manage Orders</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <?php
        include("confs/config.php");

        $result = mysqli_query($conn, "SELECT books.*, categories.name FROM books LEFT JOIN categories ON books.category_id = categories.id ORDER BY books.created_at DESC");
    ?>

    <ul class="list">
        <?php while($row = mysqli_fetch_assoc($result)) : ?>
            <li>
                <img src="covers/<?php echo $row['cover'] ?>" alt="" align="right" height="140">
                <b><?php echo $row['title'] ?></b>
                <i>by <?php echo $row['author'] ?></i>
                <small>(in <?php echo $row['name'] ?>)</small>
                <span>$<?php echo $row['price'] ?></span>
                <div><?php echo $row['summary'] ?></div>

                [ <a href="book-del.php?id=<?php echo $row['id'] ?>" class="del">Delete</a> ]
                [ <a href="book-edit.php?id=<?php echo $row['id'] ?>">Edit</a> ]
            </li>
        <?php endwhile ?>
    </ul>

    <a href="book-new.php" class="new">New Book</a>
</body>
</html>