<?php
include_once "dbh.class.php";
class gallery extends Dbh
{
    //-----------------------DEALS WITH THE gallery CATEGORY ---------------------------------------//
    protected function addsCategory($name)
    {
        $sql = "INSERT INTO gallery_categories ( `category_name`, `upload_date`) VALUES (?, NOW())";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$name]);
        return $result;
    }

    protected function viewscategories()
    {
        $sql = "SELECT * FROM gallery_categories ORDER BY `category_id` DESC";
        $stmt = $this->connect()->query($sql);
        return $stmt->fetchAll();
    }

    protected function editsCategory($id, $name)
    {
        $sql = "UPDATE gallery_categories SET  `category_name` = ? WHERE `category_id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$name, $id]);
        return $result;
    }

    protected function deletesCategory($id)
    {
        $sql = "DELETE FROM gallery_categories WHERE `category_id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$id]);

        $sql2 = "DELETE FROM gallery WHERE `category_id` = ?";
        $stmt2 = $this->connect()->prepare($sql2);
        $result2 = $stmt2->execute([$id]);

        if ($result && $result2) {
            return true;
        } else {
            return false;
        }
    }

    protected function countsCategory()
    {
        $sql = "SELECT * FROM `gallery_categories`";
        $stmt = $this->connect()->query($sql);
        return $stmt->rowCount();
    }


    //-----------------------DEALS WITH THE ACTUAL gallery CATEGORY ---------------------------------------//
    protected function addsgallery($cat, $title, $image, $content)
    {
        $sql = "INSERT INTO gallery ( `category_id`, `event`, `image`, `caption`) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$cat, $title, $image, $content]);
        return $result;
    }

    protected function editsgallery($cat, $title, $image, $content, $gallery_id)
    {
        $sql = "UPDATE `gallery` SET `category_id` = ?, `event` = ?, `image` = ?, `caption` = ? WHERE `gallery_id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$cat, $title, $image, $content, $gallery_id]);
        return $result;
    }

    protected function viewsgallery()
    {
        $sql = "SELECT * FROM `gallery` INNER JOIN `gallery_categories` ON gallery.category_id = gallery_categories.category_id ORDER BY gallery.gallery_id DESC";
        $stmt = $this->connect()->query($sql);
        return $stmt->fetchAll();
    }

    protected function viewsgalleryById($id)
    {
        $sql = "SELECT * FROM `gallery` INNER JOIN `gallery_categories` ON gallery.category_id = gallery_categories.category_id WHERE gallery.gallery_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    protected function viewsgalleryWithLimit($start, $end)
    {
        $sql = "SELECT * FROM `gallery` INNER JOIN `gallery_categories` ON gallery.category_id = gallery_categories.category_id ORDER BY gallery.gallery_id DESC LIMIT $start, $end";
        $stmt = $this->connect()->query($sql);
        return $stmt->fetchAll();
    }
    protected function countsgallery()
    {
        $sql = "SELECT * FROM `gallery` INNER JOIN `gallery_categories` ON gallery.category_id = gallery_categories.category_id";
        $stmt = $this->connect()->query($sql);
        return $stmt->rowCount();
    }

    protected function viewsgalleryAndCategory($id, $start, $end)
    {
        $sql = "SELECT * FROM `gallery` INNER JOIN `gallery_categories` ON gallery.category_id = gallery_categories.category_id WHERE gallery_categories.category_id = ? ORDER BY gallery.gallery_id DESC LIMIT $start, $end";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }
    protected function countsgalleryAndCategory($id)
    {
        $sql = "SELECT * FROM `gallery` INNER JOIN `gallery_categories` ON gallery.category_id = gallery_categories.category_id WHERE gallery_categories.category_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }

    protected function deletesgallery($id)
    {
        $image = $this->viewsgalleryById($id);
        unlink("../img/gallery/" . $image['image']);

        $sql = "DELETE FROM gallery WHERE `gallery_id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$id]);

        // $sql2 = "DELETE FROM comments WHERE `gallery_id` = ?";
        // $stmt2 = $this->connect()->prepare($sql2);
        // $result2 = $stmt2->execute([$id]);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    //-----------------------DEALS WITH THE COMMENTING SECTION ---------------------------------------//
    protected function commentsgallery($gallery_id, $name, $email, $comment)
    {
        $sql = "INSERT INTO comments ( `gallery_id`, `name`, `email`, `comment`, `date`) VALUES (?, ?, ?, ?, NOW())";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$gallery_id, $name, $email, $comment]);
        return $result;
    }

    protected function viewsComments($id, $start, $end)
    {
        $sql = "SELECT * FROM `comments` WHERE `gallery_id` = ? ORDER BY `comment_id` DESC LIMIT $start, $end";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    protected function countsComments($id)
    {
        $sql = "SELECT * FROM `comments` WHERE `gallery_id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }

    protected function deletesComment($id)
    {
        $sql = "DELETE FROM comments WHERE `comment_id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$id]);
        return $result;
    }
}
