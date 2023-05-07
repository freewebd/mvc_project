<?php

namespace application\models;

use application\core\Model;


class News extends Model
{

    public function createNews()
    {
        $published = $_POST['published'] === 'on' ? 1 : 0;

        $id =  $this->db->lastInsertId();
        $params = [
            'id' => null,
            'title' => $_POST['title'],
            'content' => $_POST['content'],
            'image' => $id . '-' . $_FILES["image"]['name'],
            'date' => date("Y-m-d H:i:s"),
            'published' => $published,
            'author' => $_POST['author'],
        ];
        $this->db->query('INSERT INTO news VALUES (:id, :title, :content, :image, :date, :published, :author)', $params);
        return $this->db->lastInsertId();
    }

    public function getNews($start, $offset)
    {
        $params = [
            'start' => $start,
            'offset' => $offset,
        ];
        return $this->db->row('SELECT * FROM news LIMIT :start, :offset', $params);
    }

    public function isNews($id)
    {
        $params = [
            'id' => $id,
        ];
        $result = $this->db->column('SELECT id FROM news WHERE id = :id', $params);
        return $result ? true : false;
    }
    public function deleteNews($id)
    {
        $params = [
            'id' => $id,
        ];
        $this->db->row('DELETE FROM news WHERE id = :id', $params);
        $result = array_merge(glob($_SERVER['DOCUMENT_ROOT'] . '/public/img/trumb-'.$id.'-*.*'), glob($_SERVER['DOCUMENT_ROOT'] . '/public/img/'.$id.'-*.*'));
        foreach($result as $file){
            unlink($file);
        }
    }
    public function showNews($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->db->row('SELECT * FROM news WHERE id = :id', $params);
    }
    public function postsCount() {
		return $this->db->column('SELECT COUNT(id) FROM news');
	}
    public function newsUploadsImage($id)
    {
        $img = new \Imagick($_FILES['image']['tmp_name']);
        $img2 = new \Imagick($_FILES['image']['tmp_name']);
        $img->cropThumbnailImage(320, 240);
        $img->setImageCompressionQuality(80);
        $img->writeImage($_SERVER['DOCUMENT_ROOT'] . '/public/img/trumb-' . $id . '-' . $_FILES['image']['name']);

        $img2->setImageCompressionQuality(80);
        $img2->writeImage($_SERVER['DOCUMENT_ROOT'] . '/public/img/' . $id . '-' . $_FILES['image']['name']);
    }
}
