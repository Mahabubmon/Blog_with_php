<?php if ($action == 'add'): ?>

    <div class="col-md-6 mx-auto">
        <form method="post">
            <h1 class="h3 mb-3 fw-normal" style="margin-left: 55px">Create Category</h1>

            <?php if (!empty ($errors)): ?>
                <div class="alert alert-danger ">Please fix the errors below</div>
            <?php endif; ?>

            <div class="form-floating">
                <input value="<?= old_value('category') ?>" name="category" type="text" class="form-control mb-2"
                    id="floatingInput" placeholder="Category Name...">
                <label for="floatingInput">Category Name</label>
            </div>
            <div>
                <?php if (!empty ($errors['category'])): ?>
                    <div class="text-danger ">
                        <?= $errors['category'] ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="form-floating">
                <select name="disabled" id="disabled" class="form-select">
                    <option>Select a Value</option>
                    <option value="0">Yes</option>
                    <option value="1">No</option>
                </select>
                <label for="floatingInput">Active </label>
            </div>



            <a href="<?= ROOT ?>/admin/categories/">
                <button class="btn btn-primary  py-2 mt-4" type="button">Back</button>
            </a>
            <button class="btn btn-primary  py-2 mt-4 float-end" type="submit">Create</button>
        </form>
    </div>
<?php elseif ($action == 'edit'): ?>
    <div class="col-md-6 mx-auto">
        <form method="post">
            <h1 class="h3 mb-3 fw-normal" style="margin-left: 55px">Edit Category</h1>

            <?php if (!empty ($row)): ?>

                <?php if (!empty ($errors)): ?>
                    <div class="alert alert-danger ">Please fix the errors below</div>
                <?php endif; ?>


                <div class="form-floating">
                    <input value="<?= old_value('category', $row['category']) ?>" name="category" type="text"
                        class="form-control mb-2" id="floatingInput" placeholder="User Name...">
                    <label for="floatingInput">User Name</label>
                </div>
                <div>
                    <?php if (!empty ($errors['category'])): ?>
                        <div class="text-danger ">
                            <?= $errors['category'] ?>
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
                    <select name="role" id="role" class="form-select">
                        <option <?= old_select('role', 'user', $row['role']) ?> value="user">User</option>
                        <option <?= old_select('role', 'admin', $row['role']) ?> value="admin">Admin</option>
                    </select>
                    <label for="floatingInput">Role </label>
                </div>
                <div>
                    <?php if (!empty ($errors['role'])): ?>
                        <div class="text-danger ">
                            <?= $errors['role'] ?>
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
                <a href="<?= ROOT ?>/admin/categories/">
                    <button class="btn btn-primary py-2 mt-4" type="button">Back</button>
                </a>
                <button class="btn btn-primary py-2 mt-4 float-end" type="submit">Save</button>
            <?php endif; ?>
        </form>
    </div>
<?php elseif ($action == 'delete'): ?>
    <div class="col-md-6 mx-auto">
        <form method="post">
            <h1 class="h3 mb-3 fw-normal" style="margin-left: 55px">Delete Category</h1>

            <?php if (!empty ($row)): ?>

                <?php if (!empty ($errors)): ?>
                    <div class="alert alert-danger ">Please fix the errors below</div>
                <?php endif; ?>



                <div class="form-floating">
                    <div class="form-control mb-2" id="floatingInput">
                        <?= old_value('category', $row['category']) ?>
                    </div>
                    <div>
                    </div>
                    <div class="form-floating">
                        <div class="form-control mb-2" id="floatingInput">
                            <?= old_value('slug', $row['slug']) ?>
                        </div>
                    </div>
                    <div>
                    </div>

                    <a href="<?= ROOT ?>/admin/categories/">
                        <button class="btn btn-primary py-2 mt-4" type="button">Back</button>
                    </a>
                    <a href="<?= ROOT ?>/admin/categories/">
                        <button class="btn btn-danger py-2 mt-4 float-end" type="submit">Delete</button>
                    </a>

                <?php endif; ?>
        </form>
    </div>
<?php else:
    '<h1>Record not Found</h1>' ?>

    <h4>Categories
        <a href="<?= ROOT ?>/admin/categories/add">
            <button class="btn btn-primary">Add New</button>
        </a>
    </h4>


    <div class="table-responsive">
        <table class="table">

            <tr>
                <th>#</th>
                <th>Category</th>
                <th>Slug</th>
                <th>Disabled</th>
                <th>Action</th>
            </tr>
            <?php
            $limit = 10;
            $offset = ($PAGE['page_number'] - 1) * $limit;

            $query = "select * from categories order by id desc limit $limit offset $offset";
            $rows = query($query);
            ?>

            <?php if (!empty ($rows)): ?>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <td>
                            <?= $row['id'] ?>
                        </td>
                        <td>
                            <?= esc($row['category']) ?>
                        </td>
                        <td>
                            <?= $row['slug'] ?>
                        </td>
                        <td>
                            <?= $row['disabled'] ?>
                        </td>
                        <td>
                            <a href="<?= ROOT ?>/admin/categories/edit/<?= $row['id'] ?>">
                                <button class="btn btn-warning text-white btn-sm"><i class="bi bi-pencil-square"></i></button>
                            </a>
                            <a href="<?= ROOT ?>/admin/categories/delete/<?= $row['id'] ?>">
                                <button class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>


    <div class="col-md-12 mb-4">
        <a href="<?= $PAGE['first_link'] ?>">
            <button class="btn btn-primary">First Page</button>
        </a>
        <a href="<?= $PAGE['prev_link'] ?>">
            <button class="btn btn-primary">Prev Page</button>
        </a>
        <a href="<?= $PAGE['next_link'] ?>">
            <button class="btn btn-primary float-end">Next Page</button>
        </a>
    </div>
    </div>
<?php endif; ?>