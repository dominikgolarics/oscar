<?php
require_once 'dbvezerlo.php';

class Oscar{
    private $movies =[];
    public function getAllMovies(){
        $query = "SELECT * FROM movie";
        $dbcon = new DBController();
        $this->mobiles=$dbcon->executeSelectQuery($query);
        return $this->movies;
    }

    public function getMovieByID($movieID){
        $query = "SELECT m_ID, title, m_desc, pic FROM movie WHERE m_ID = ".$movieID;
        $dbcon = new DBController();
        $this->movies = $dbcon->executeSelectQuery($query);
        $dbcon->closeDB();
        return $this->movies;
    }

    public function getMovieByType($movieName){
        $query = "SELECT m_ID, title, m_desc, pic, movie_type.Mt_descripton FROM movie INNER JOIN movie_type ON movie_type.mt_ID = movie.m_type WHERE movie_type.Mt_name = ".$movieName;
        $dbcon = new DBController();
        $this->movies = $dbcon->executeSelectQuery($query);
        $dbcon->closeDB();
        return $this->movies;
    }
}