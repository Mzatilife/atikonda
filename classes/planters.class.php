<?php
include_once "dbh.class.php";
class Planters extends Dbh
{
    //-----------------------DEALS WITH THE PLANTS CATEGORY ---------------------------------------//
    protected function addsCategory($name)
    {
        $sql = "INSERT INTO `plant_categories` ( `category_name`, `upload_date`) VALUES (?, NOW())";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$name]);
        return $result;
    }

    protected function viewscategories()
    {
        $sql = "SELECT * FROM `plant_categories` ORDER BY `category_id` DESC";
        $stmt = $this->connect()->query($sql);
        return $stmt->fetchAll();
    }

    protected function editsCategory($id, $name)
    {
        $sql = "UPDATE `plant_categories` SET  `category_name` = ? WHERE `category_id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$name, $id]);
        return $result;
    }

    protected function deletesCategory($id)
    {
        $sql = "DELETE FROM `plant_categories` WHERE `category_id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$id]);

        $sql2 = "DELETE FROM `plants` WHERE `category_id` = ?";
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
        $sql = "SELECT * FROM `plant_categories`";
        $stmt = $this->connect()->query($sql);
        return $stmt->rowCount();
    }


    //-----------------------DEALS WITH THE ACTUAL PLANT OPERATIONS ---------------------------------------//
    protected function addsPlants($cat, $image, $name, $description)
    {
        $sql = "INSERT INTO plants ( `category_id`, `image`, `plant_name`, `plant_description`) VALUES (?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$cat, $image, $name, $description]);
        return $result;
    }

    protected function editsPlants($cat, $image, $name, $description, $plant_id)
    {
        $sql = "UPDATE `plants` SET `category_id` = ?, `image` = ?, `plant_name` = ?, `plant_description` = ? WHERE `plant_id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$cat, $image, $name, $description, $plant_id]);
        return $result;
    }

    protected function viewsPlants()
    {
        $sql = "SELECT * FROM `plants` INNER JOIN `plant_categories` ON plants.category_id = plant_categories.category_id ORDER BY plants.plant_id DESC";
        $stmt = $this->connect()->query($sql);
        return $stmt->fetchAll();
    }

    protected function viewsPlantsById($id)
    {
        $sql = "SELECT * FROM `plants` INNER JOIN `plant_categories` ON plants.category_id = plant_categories.category_id WHERE plants.plant_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    protected function viewsPlantsWithLimit($start, $end)
    {
        $sql = "SELECT * FROM `plants` INNER JOIN `plant_categories` ON plants.category_id = plant_categories.category_id ORDER BY plants.plant_id DESC LIMIT $start, $end";
        $stmt = $this->connect()->query($sql);
        return $stmt->fetchAll();
    }
    protected function countsPlants()
    {
        $sql = "SELECT * FROM `plants` INNER JOIN `plant_categories` ON plants.category_id = plant_categories.category_id";
        $stmt = $this->connect()->query($sql);
        return $stmt->rowCount();
    }

    protected function viewsPlantsAndCategory($id, $start, $end)
    {
        $sql = "SELECT * FROM `plants` INNER JOIN `plant_categories` ON plants.category_id = plant_categories.category_id WHERE plant_categories.category_id = ? ORDER BY plants.plant_id DESC LIMIT $start, $end";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }
    protected function countsPlantsAndCategory($id)
    {
        $sql = "SELECT * FROM `plants` INNER JOIN `plant_categories` ON plants.category_id = plant_categories.category_id WHERE plant_categories.category_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }

    protected function deletesPlants($id)
    {
        $image = $this->viewsPlantsById($id);
        unlink("../img/plants/" . $image['image']);

        $sql = "DELETE FROM plants WHERE `plant_id` = ?";
        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$id]);

        // $sql2 = "DELETE FROM comments WHERE `Plants_id` = ?";
        // $stmt2 = $this->connect()->prepare($sql2);
        // $result2 = $stmt2->execute([$id]);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
