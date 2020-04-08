<?php

Define ( 'DB_HOST', 'localhost' );
Define ( 'DB_USERNAME', 'root' );
Define ( 'DB_PASSWORD', '' );
Define ( 'DB_DATABASE', 'blogg' );


    function getUser ($username) {
        $mysqli= new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if(mysqli_connect_error()){
            die('Connect Error ('.mysqli_connect_error().') '.mysqli_connect_error());
        }
        
        $mysqli->set_charset("utf8");
        
        $sql ="SELECT * FROM User WHERE username ='$username' ";
        
        $result = $mysqli->query($sql);

        $row = $result->fetch_assoc();

        $mysqli->close();

        return $row;

    }


    

    function createUser ($username, $password) {

        $mysqli= new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if(mysqli_connect_error()){
            die('Connect Error ('.mysqli_connect_error().') '.mysqli_connect_error());
        }
        
        $mysqli->set_charset("utf8");
        
        $sql ="INSERT INTO user (username, password, display_name) VALUES ('$username', '$password', '$username')";

        
        if($mysqli->query($sql)){
            $mysqli->close();
            return true;
        }else{
            $mysqli->close();
            return false;
        }


    }

    function getBlogPost ($id) {
        $mysqli= new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if(mysqli_connect_error()){
            die('Connect Error ('.mysqli_connect_error().') '.mysqli_connect_error());
        }
        
        $mysqli->set_charset("utf8");
        
        $sql ="SELECT * FROM blogpost WHERE id='$id'";
        
        $result = $mysqli->query($sql);

        $row = $result->fetch_assoc();

        $mysqli->close();

        return $row;

    }

    function getAllBlogPosts (){

        $returnArray = [];

        $mysqli= new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if(mysqli_connect_error()){
            die('Connect Error ('.mysqli_connect_error().') '.mysqli_connect_error());
        }

        $mysqli->set_charset("utf8");
        
        $sql ="SELECT blogpost.id, title, content, creation_time, change_time, image_path, display_name
        FROM Blogpost
        JOIN User on User.id = author_id";
      
        $result = $mysqli->query($sql);

        if($result->num_rows > 0){
            While($row =$result->fetch_assoc()){
                array_push($returnArray, $row);
            }

        }
      
        $mysqli->close();

        return $returnArray;
       
    }

    function insertBlogPost ($title, $content, $author_id){

        $mysqli= new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if(mysqli_connect_error()){
            die('Connect Error ('.mysqli_connect_error().') '.mysqli_connect_error());
        }

        $mysqli->set_charset("utf8");
        
        $sql ="INSERT INTO blogpost
        (title, content, author_id)
        VALUES
        ('$title', '$content', '$author_id')";
        
        $result = $mysqli->query($sql);
        $mysqli->close();
    }

    function updateBlogPost ($id, $title, $content){

        $mysqli= new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if(mysqli_connect_error()){
            die('Connect Error ('.mysqli_connect_error().') '.mysqli_connect_error());
        }

        $mysqli->set_charset("utf8");
        
        $sql ="UPDATE blogpost
        SET content = '$content', change_time = NOW(), title = '$title'
        WHERE id = $id";
      
        $result = $mysqli->query($sql);
        $mysqli->close();
    }

    function deleteBlogPost ($id){

        $mysqli= new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if(mysqli_connect_error()){
            die('Connect Error ('.mysqli_connect_error().') '.mysqli_connect_error());
        }

        $mysqli->set_charset("utf8");
        
        $sql ="DELETE FROM blogpost WHERE id = $id";
        
        $result = $mysqli->query($sql);
        $mysqli->close();
    }

    function insertCategory ($category_name){

        $mysqli= new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if(mysqli_connect_error()){
            die('Connect Error ('.mysqli_connect_error().') '.mysqli_connect_error());
        }

        $mysqli->set_charset("utf8");
        
        $sql ="INSERT INTO category
        (name)
        VALUES
        ('$category_name');";
        
        $result = $mysqli->query($sql);
        $mysqli->close();
    }

    function getAllCategories (){

        $returnArray = [];

        $mysqli= new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if(mysqli_connect_error()){
            die('Connect Error ('.mysqli_connect_error().') '.mysqli_connect_error());
        }

        $mysqli->set_charset("utf8");
        
        $sql ="SELECT * FROM category";
      
        $result = $mysqli->query($sql);

        if($result->num_rows > 0){
            While($row =$result->fetch_assoc()){
                array_push($returnArray, $row);
            }

        }
      
        $mysqli->close();

        return $returnArray;
       
    }

    function getAllPostCategories (){

        $returnArray = [];

        $mysqli= new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if(mysqli_connect_error()){
            die('Connect Error ('.mysqli_connect_error().') '.mysqli_connect_error());
        }

        $mysqli->set_charset("utf8");
        
        $sql ="SELECT * FROM postcategory
        JOIN category on category.id = postcategory.id";
      
        $result = $mysqli->query($sql);

        if($result->num_rows > 0){
            While($row =$result->fetch_assoc()){
                array_push($returnArray, $row);
            }

        }
      
        $mysqli->close();

        return $returnArray;
       
    }


    function deleteCategoriesForBlogPost($blogpostid){

        $mysqli= new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if(mysqli_connect_error()){
            die('Connect Error ('.mysqli_connect_error().') '.mysqli_connect_error());
        }

        $mysqli->set_charset("utf8");
        
        $sql ="DELETE FROM postcategory WHERE blogpostid = $blogpostid";
        
        $result = $mysqli->query($sql);
        $mysqli->close();
    }

    function insertPostCategory($blogpostid, $categoryid){

        $mysqli= new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

        if(mysqli_connect_error()){
            die('Connect Error ('.mysqli_connect_error().') '.mysqli_connect_error());
        }

        $mysqli->set_charset("utf8");
        
        $sql ="INSERT INTO postcategory
        (categoryid, blogpostid)
        VALUES
        ('$categoryid', $blogpostid);";
        
        $result = $mysqli->query($sql);
        $mysqli->close();
    }

?>



