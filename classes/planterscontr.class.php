<?php
include_once "planters.class.php";
class PlantersContr extends Planters
{
    //-----------------------DEALS WITH THE Plants CATEGORY ---------------------------------------//
    public function addCategory($name)
    {
        return $this->addsCategory($name);
    }

    public function viewCategories()
    {
        return $this->viewsCategories();
    }

    public function countCategory()
    {
        return $this->countsCategory();
    }

    public function deleteCategory($id)
    {
        return $this->deletesCategory($id);
    }

    public function editCategory($id, $name)
    {
        return $this->editsCategory($id, $name);
    }



    //-----------------------DEALS WITH THE ACTUAL PLANT OPERATIONS ---------------------------------------//
    public function addPlants($cat, $image, $name, $description)
    {
        return $this->addsPlants($cat, $image, $name, $description);
    }

    public function editPlants($cat, $image, $name, $description, $Plants_id)
    {
        return $this->editsPlants($cat, $image, $name, $description, $Plants_id);
    }

    public function viewPlants()
    {
        return $this->viewsPlants();
    }

    public function viewPlantsWithLimit($start, $end)
    {
        return $this->viewsPlantsWithLimit($start, $end);
    }

    public function viewPlantsById($id)
    {
        return $this->viewsPlantsById($id);
    }

    public function countPlants()
    {
        return $this->countsPlants();
    }

    public function viewPlantsAndCategory($id, $start, $end)
    {
        return $this->viewsPlantsAndCategory($id, $start, $end);
    }

    public function countPlantsAndCategory($id)
    {
        return $this->countsPlantsAndCategory($id);
    }

    public function deletePlants($id)
    {
        return $this->deletesPlants($id);
    }
}
