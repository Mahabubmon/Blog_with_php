<?php
//add new
if ($action == 'add') {
    if (!empty ($_POST)) {
        //validate
        $errors = [];

        if (empty ($_POST['title'])) {
            $errors['title'] = "A title is required";
        }

        if (empty ($_POST['category_id'])) {
            $errors['category_id'] = "A category is required";
        }

        //validate image
        $allowed = ['image/jpeg', 'image/png', 'image/webp'];
        if (!empty ($_FILES['image']['name'])) {
            $destination = "";
            if (!in_array($_FILES['image']['type'], $allowed)) {
                $errors['image'] = "Image format not supported";
            } else {
                $folder = "uploads/";
                if (!file_exists($folder)) {
                    mkdir($folder, 0777, true);
                }

                $destination = $folder . time() . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                resize_image($destination);
            }

        } else {
            $errors['image'] = "A feature  Image  is required";

        }


        $slug = str_to_url($_POST['title']);

        $query = "select id from posts where slug = :slug limit 1";
        $slug_row = query($query, ['slug' => $slug]);

        if ($slug_row) {
            $slug .= rand(1000, 9999);
        }

        if (empty ($errors)) {
            //save to database
            $data = [];
            $data['title'] = $_POST['title'];
            $data['content'] = $_POST['content'];
            $data['category_id'] = $_POST['category_id'];
            $data['slug'] = $slug;
            $data['user_id'] = user('id');

            $query = "insert into posts (title,content,slug,category_id,user_id) values (:title,:content,:slug,:category_id,:user_id)";

            if (!empty ($destination)) {
                $data['image'] = $destination;
                $query = "insert into posts (title,content,slug,category_id,user_id,image) values (:title,:content,:slug,:category_id,:user_id,:image)";
            }

            query($query, $data);

            redirect('admin/posts');

        }
    }
} else
    if ($action == 'edit') {

        $query = "select * from posts where id = :id limit 1";
        $row = query_row($query, ['id' => $id]);

        if (!empty ($_POST)) {

            if ($row) {

                //validate
                $errors = [];

                if (empty ($_POST['username'])) {
                    $errors['username'] = "A username is required";
                } else
                    if (!preg_match("/^[a-zA-Z]+$/", $_POST['username'])) {
                        $errors['username'] = "Username can only have letters and no spaces";
                    }

                $query = "select id from posts where email = :email && id != :id limit 1";
                $email = query($query, ['email' => $_POST['email'], 'id' => $id]);

                if (empty ($_POST['email'])) {
                    $errors['email'] = "A email is required";
                } else
                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                        $errors['email'] = "Email not valid";
                    } else
                        if ($email) {
                            $errors['email'] = "That email is already in use";
                        }

                if (empty ($_POST['password'])) {

                } else
                    if (strlen($_POST['password']) < 8) {
                        $errors['password'] = "Password must be 8 character or more";
                    } else
                        if ($_POST['password'] !== $_POST['retype_password']) {
                            $errors['password'] = "Passwords do not match";
                        }

                //validate image
                $allowed = ['image/jpeg', 'image/png', 'image/webp'];
                if (!empty ($_FILES['image']['name'])) {
                    $destination = "";
                    if (!in_array($_FILES['image']['type'], $allowed)) {
                        $errors['image'] = "Image format not supported";
                    } else {
                        $folder = "uploads/";
                        if (!file_exists($folder)) {
                            mkdir($folder, 0777, true);
                        }

                        $destination = $folder . time() . $_FILES['image']['name'];
                        move_uploaded_file($_FILES['image']['tmp_name'], $destination);
                        resize_image($destination);
                    }


                }

                if (empty ($errors)) {
                    //save to database
                    $data = [];
                    $data['username'] = $_POST['username'];
                    $data['email'] = $_POST['email'];
                    $data['role'] = $_POST['role'];
                    $data['id'] = $id;

                    $password_str = "";
                    $image_str = "";

                    if (!empty ($_POST['password'])) {
                        $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $password_str = "password = :password, ";
                    }

                    if (!empty ($destination)) {
                        $image_str = "image = :image, ";
                        $data['image'] = $destination;
                    }

                    $query = "update posts set username = :username, email = :email, $password_str $image_str role = :role where id = :id limit 1";

                    query($query, $data);
                    redirect('admin/posts');

                }
            }
        }
    } else {
        if ($action == 'delete') {

            $query = "select * from posts where id = :id limit 1";

            $row = query_row($query, ['id' => $id]);
            if ($_SERVER['REQUEST_METHOD'] == "POST") {



                if ($row) {


                    //validate
                    $errors = [];
                    if (empty ($errors)) {


                        //delete to databasee


                        $data['id'] = $id;



                        $query = "delete from posts where id = :id limit 1";




                        query($query, $data);

                        redirect('admin/posts');
                    }
                }
            }

        }
    }

