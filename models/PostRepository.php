<?php
class PostRepository
{
    public static function getPosts()
    {
        $db = Connection::connect();
        $q = "SELECT * FROM post ORDER BY date DESC";
        $result = $db->query($q);
        $posts = array();
        while ($row = $result->fetch_assoc()) {
            $posts[] = new Post($row['id'], $row['title'], $row['content'], $row['date'], $row['visible'], $row['id_author']);
        }
        return $posts;
    }

    public static function getPostById($id)
    {
        $db = Connection::connect();
        $q = "SELECT * FROM post WHERE id=" . $id;
        $result = $db->query($q);
        if ($row = $result->fetch_assoc()) {
            return new Post($row['id'], $row['title'], $row['content'], $row['date'], $row['visible'], $row['id_author']);
        } else {
            return false;
        }
    }

    public static function addPost($title, $content)
    {
        $db = Connection::connect();
        $idAuthor = $_SESSION["user"]->getId();
        $q = "INSERT INTO post (title, content, date, visible, id_author) VALUES ('$title', '$content', NOW(), 1, $idAuthor)";
        if ($result = $db->query($q)) {
            return $db->insert_id;
        } else {
            return false;
        }
    }

    public static function deletePost($id)
    {
        $db = Connection::connect();
        $q = "UPDATE post SET visible=0 WHERE id=" . $id;
        if ($result = $db->query($q)) {
            return true;
        } else {
            return false;
        }
    }
}
