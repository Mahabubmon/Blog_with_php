<!-- header section  -->
<?php include '../app/pages/includes/footer.php';
?>
<h3 class="mx-4">Features</h3>

<div class="row mb-2 justify-content-center">


    <?php

    $query = "select posts.*,categories.category from posts join categories on posts.category_id = categories.id order by id desc limit 6";
    $rows = query($query);
    if ($rows) {
        foreach ($rows as $row) {

            include '../app/pages/includes/post-card.php';
        }
    } else {
        echo "no items found";
    }

    ?>


</div>
</main>

<!-- footer section -->
<?php include '../app/pages/includes/footer.php';
?>
<!-- footer section  end -->
</body>

</html>