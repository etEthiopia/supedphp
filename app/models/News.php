<?php
  class News {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getNews(){
      $this->db->query('SELECT *
                        FROM news
                        ORDER BY created_at DESC
                        ');

        

      $results = $this->db->resultSet();
      
      return $results;
    }

    public function geLatesttNews(){
        $this->db->query('SELECT *
                          FROM news
                          ORDER BY created_at DESC LIMIT 2
                          ');
  
          
  
        $results = $this->db->resultSet();
        
        return $results;
      }

    public function addNews($data){
      $this->db->query('INSERT INTO news (title, user_id, body) VALUES(:title, :user_id, :body)');
      // Bind values
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':body', $data['body']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updateNews($data){
      $this->db->query('UPDATE news SET title = :title, body = :body WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':body', $data['body']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getNewsById($id){
      $this->db->query('SELECT * FROM news WHERE id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

    public function deleteNews($id){
      $this->db->query('DELETE FROM news WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $id);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }