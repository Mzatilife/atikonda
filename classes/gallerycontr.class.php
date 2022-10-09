<?php
include_once "gallery.class.php";
class galleryContr extends gallery
{
    //-----------------------DEALS WITH THE gallery CATEGORY ---------------------------------------//
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

    //-----------------------DEALS WITH THE ACTUAL gallery CATEGORY ---------------------------------------//
    public function addgallery($cat, $title, $image, $content)
    {
        return $this->addsgallery($cat, $title, $image, $content);
    }

    public function editgallery($cat, $title, $image, $content, $gallery_id)
    {
        return $this->editsgallery($cat, $title, $image, $content, $gallery_id);
    }

    public function viewgallery()
    {
        return $this->viewsgallery();
    }

    public function viewgalleryWithLimit($start, $end)
    {
        return $this->viewsgalleryWithLimit($start, $end);
    }

    public function viewgalleryById($id)
    {
        return $this->viewsgalleryById($id);
    }

    public function countgallery()
    {
        return $this->countsgallery();
    }

    public function viewgalleryAndCategory($id, $start, $end)
    {
        return $this->viewsgalleryAndCategory($id, $start, $end);
    }

    public function countgalleryAndCategory($id)
    {
        return $this->countsgalleryAndCategory($id);
    }

    public function deletegallery($id)
    {
        return $this->deletesgallery($id);
    }

    // ------------------------- THIS PART DEALS WITH THE COMMENTING PROCESS -------------------------
    public function commentgallery($gallery_id, $name, $email, $comment)
    {
        return $this->commentsgallery($gallery_id, $name, $email, $comment);
    }

    public function viewComments($gallery_id, $start, $end)
    {
        return $this->viewsComments($gallery_id, $start, $end);
    }
    public function countComments($gallery_id)
    {
        return $this->countsComments($gallery_id);
    }

    public function deleteComment($id)
    {
        return $this->deletesComment($id);
    }
}
