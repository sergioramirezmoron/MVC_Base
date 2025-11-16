<?php
class CommentRepository
{
    public static function getCommentsByPostId($idPost)
    {
        $db = Connection::connect();
        $q = "SELECT * FROM comment WHERE id_post = $idPost";
        $result = $db->query($q);
        $comments = array();
        while ($row = $result->fetch_assoc()) {
            $comments[] = new Comment($row['id'], $row['content'], $row['date'], $row['visible'], $row['id_author'], $row['id_post']);
        }
        return $comments;
    }

    public static function addComment($content)
    {
        $db = Connection::connect();
        $idAuthor = $_SESSION["user"]->getId();
        $idPost = $_GET["id"];
        $q = "INSERT INTO comment (content, date, visible, id_author, id_post) VALUES ('$content', NOW(), 1, $idAuthor, $idPost)";
        if ($result = $db->query($q)) {
            return $db->insert_id;
        } else {
            return false;
        }
    }

    public static function deleteComment($id)
    {
        $db = Connection::connect();
        $q = "UPDATE comment SET visible=0 WHERE id=" . $id;
        if ($result = $db->query($q)) {
            return true;
        } else {
            return false;
        }
    }
}
