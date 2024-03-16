<?php if ($action == 'add'): ?>

    <div class="col-md-6 mx-auto">
        <form method="post">
            <h1 class="h3 mb-3 fw-normal" style="margin-left: 55px">Create Account</h1>

            <?php if (!empty ($errors)): ?>
                <div class="alert alert-danger ">Please fix the errors below</div>
            <?php endif; ?>



            <div class="form-floating">
                <input value="<?= old_value('username') ?>" name="username" type="text" class="form-control mb-2"
                    id="floatingInput" placeholder="User Name...">
                <label for="floatingInput">User Name</label>
            </div>
            <div>
                <?php if (!empty ($errors['username'])): ?>
                    <div class="text-danger ">
                        <?= $errors['username'] ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="form-floating">
                <input value="<?= old_value('email') ?>" name="email" type="email" class="form-control mb-2"
                    id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div>
                <?php if (!empty ($errors['email'])): ?>
                    <div class="text-danger ">
                        <?= $errors['email'] ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="form-floating">
                <input value="<?= old_value('password') ?>" name="password" type="password" class="form-control mb-2"
                    id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div>
                <?php if (!empty ($errors['password'])): ?>
                    <div class="text-danger ">
                        <?= $errors['password'] ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="form-floating">
                <input value="<?= old_value('retype_password') ?>" name="retype_password" type="password"
                    class="form-control mb-2" id="floatingPassword" placeholder="Retype Password">
                <label for="floatingPassword">Re-Password</label>
            </div>
            <div>
                <?php if (!empty ($errors['terms'])): ?>
                    <div class="text-danger ">
                        <?= $errors['terms'] ?>
                    </div>
                <?php endif; ?>
            </div>
            <a href="<?= ROOT ?>/admin/users/">
                <button class="btn btn-primary  py-2 mt-4" type="button">Back</button>
            </a>
            <button class="btn btn-primary  py-2 mt-4 float-end" type="submit">Create</button>
        </form>
    </div>
<?php elseif ($action == 'edit'): ?>
    <div class="col-md-6 mx-auto">
        <form method="post">
            <h1 class="h3 mb-3 fw-normal" style="margin-left: 55px">Edit Account</h1>

            <?php if (!empty ($row)): ?>

                <?php if (!empty ($errors)): ?>
                    <div class="alert alert-danger ">Please fix the errors below</div>
                <?php endif; ?>

                <div class="my-2">
                    <label class="d-block">
                        <img class="mx-auto d-block display_image_edit" src="<?= get_image($row['image']) ?>"
                            style="cursor: pointer; width: 150px; height: 150px; object-fit: cover;" alt="">
                        <input onchange="display_image_edit(this.files[0])" type="file" name="image" class="d-none">
                    </label>
                </div>

                <script>
                    function display_image_edit(file) {
                        document.querySelector(".display_image_edit").src = URL.createObjectURL(file);

                    }
                </script>

                <div class="form-floating">
                    <input value="<?= old_value('username', $row['username']) ?>" name="username" type="text"
                        class="form-control mb-2" id="floatingInput" placeholder="User Name...">
                    <label for="floatingInput">User Name</label>
                </div>
                <div>
                    <?php if (!empty ($errors['username'])): ?>
                        <div class="text-danger ">
                            <?= $errors['username'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-floating">
                    <input value="<?= old_value('email', $row['email']) ?>" name="email" type="email" class="form-control mb-2"
                        id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div>
                <div>
                    <?php if (!empty ($errors['email'])): ?>
                        <div class="text-danger ">
                            <?= $errors['email'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-floating">
                    <input value="<?= old_value('password') ?>" name="password" type="password" class="form-control mb-2"
                        id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password(Leave empty to keep old one)</label>
                </div>
                <div>
                    <?php if (!empty ($errors['password'])): ?>
                        <div class="text-danger ">
                            <?= $errors['password'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-floating">
                    <input value="<?= old_value('retype_password') ?>" name="retype_password" type="password"
                        class="form-control mb-2" id="floatingPassword" placeholder="Retype Password">
                    <label for="floatingPassword">Re-Password</label>
                </div>
                <div>
                    <?php if (!empty ($errors['terms'])): ?>
                        <div class="text-danger ">
                            <?= $errors['terms'] ?>
                        </div>
                    <?php endif; ?>
                </div>
                <a href="<?= ROOT ?>/admin/users/">
                    <button class="btn btn-primary py-2 mt-4" type="button">Back</button>
                </a>
                <button class="btn btn-primary py-2 mt-4 float-end" type="submit">Save</button>
            <?php endif; ?>
        </form>
    </div>
<?php elseif ($action == 'delete'): ?>
    <div class="col-md-6 mx-auto">
        <form method="post">
            <h1 class="h3 mb-3 fw-normal" style="margin-left: 55px">Edit Account</h1>

            <?php if (!empty ($row)): ?>

                <?php if (!empty ($errors)): ?>
                    <div class="alert alert-danger ">Please fix the errors below</div>
                <?php endif; ?>



                <div class="form-floating">
                    <div class="form-control mb-2" id="floatingInput">
                        <?= old_value('username', $row['username']) ?>
                    </div>
                    <div>
                    </div>
                    <div class="form-floating">
                        <div class="form-control mb-2" id="floatingInput">
                            <?= old_value('email', $row['email']) ?>
                        </div>
                    </div>
                    <div>
                    </div>

                    <a href="<?= ROOT ?>/admin/users/">
                        <button class="btn btn-primary py-2 mt-4" type="button">Back</button>
                    </a>
                    <a href="<?= ROOT ?>/admin/users/">
                        <button class="btn btn-danger py-2 mt-4 float-end" type="submit">Delete</button>
                    </a>

                <?php endif; ?>
        </form>
    </div>
<?php else:
    '<h1>Record not Found</h1>' ?>

    <h4>Users
        <a href="<?= ROOT ?>/admin/users/add">
            <button class="btn btn-primary">Add New</button>
        </a>
    </h4>


    <div class="table-reponsive">
        <table class="table">
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Image</th>
                <th>Date</th>
                <th>Action</th>
            </tr>

            <?php

            $query = "select * from users order by id desc";
            $row = query($query);

            ?>

            <?php if (!empty ($row)): ?>
                <?php foreach ($row as $row): ?>
                    <tr>
                        <td>
                            <?= $row['id'] ?>
                        </td>
                        <td>
                            <?= esc($row['username']) ?>
                        </td>
                        <td>
                            <?= $row['email'] ?>
                        </td>
                        <td>
                            <?= $row['role'] ?>
                        </td>
                        <td>
                            <img src="<?= get_image($row['image']) ?>" style="width: 100px; height: 100px; object-fit: cover;"
                                alt="">
                        </td>
                        <td>
                            <?= date("jS M, Y", strtotime($row['date'])) ?>
                        </td>
                        <td>
                            <a href="<?= ROOT ?>/admin/users/edit/<?= $row['id'] ?>">

                                <button class="btn btn-danger btn-sm"><i class="i bi-pencil-square"></i></button>
                            </a>
                            <a href="<?= ROOT ?>/admin/users/delete/<?= $row['id'] ?>">
                                <button class="btn btn-warning text-white btn-sm"><i class="i bi-trash-fill"></i></button>
                            </a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
<?php endif; ?>