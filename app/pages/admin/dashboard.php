<h1>Statistics</h1>

<div class="row justify-content-center">



    <div class="m-1 col-md-6 bg-light rounded shadow border text-center">
        <h1><i class="bi bi-person-video3"></i></h1>
        <div>
            Admins
        </div>
        <?php

        $query = " select count(id) as num from users where role = 'admin'";
        $res = query_row($query);


        ?>
        <h1>
            <?= $res['num'] ?? 0 ?>
        </h1>
    </div>
    <div class="m-1 col-md-6 bg-light rounded shadow border text-center">
        <h1><i class="bi bi-person-circle"></i></h1>
        <div>
            Users
        </div>
        <?php

        $query = " select count(id) as num from users where role = 'user'";
        $res = query_row($query);


        ?>
        <h1>
            <?= $res['num'] ?? 0 ?>
        </h1>
    </div>
    <div class="m-1 col-md-6 bg-light rounded shadow border text-center">
        <h1> <i class="bi bi-tags-fill"></i></h1>
        <div>
            Categories
        </div>
        <?php

        $query = " select count(id) as num from categories";
        $res = query_row($query);


        ?>
        <h1>
            <?= $res['num'] ?? 0 ?>
        </h1>
    </div>
    <div class="m-1 col-md-6 bg-light rounded shadow border text-center">
        <h1> <i class="bi bi-file-post"></i></h1>
        <div>
            Posts
        </div>
        <?php

        $query = " select count(id) as num from posts";
        $res = query_row($query);


        ?>
        <h1>
            <?= $res['num'] ?? 0 ?>
        </h1>
    </div>
</div>