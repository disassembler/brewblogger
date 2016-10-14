<?php

/**
 * @file
 * Brew News Repository
 *
 * @author Samuel Leathers
 *
 * @copyright Samuel Leathers, 29 August, 2015
 */

namespace BrewBlogger\News;

use BrewBlogger\News\Entity\News;
use Doctrine\DBAL\Connection;

class NewsRepository {
  private $db;
  public function __construct(Connection $db) {
    $this->db = $db;
  }
  public function findOneByID($id) {
    return $this->db->fetchAssoc('SELECT * FROM news WHERE id = ?', array($id));
  }
  public function findPrivate() {
    $news = [];
    $result = $this->db->fetchAll('SELECT * FROM news WHERE newsPrivate = ? ORDER BY newsDate DESC', array('N'));
    foreach ($result as $row) {
      $news_entry = new News($row);
      $news[] = $news_entry;
    }
    return $news;
  }
  public function findNonPrivate() {
    $news = [];
    $result = $this->db->fetchAll('SELECT * FROM news WHERE newsPrivate = ? ORDER BY newsDate DESC', array('Y'));
    foreach ($result as $row) {
      $news_entry = new News($row);
      $news[] = $news_entry;
    }
    return $news;
  }
  public function findAll() {
    $news = [];
    $result = $this->db->fetchAll('SELECT * FROM news ORDER BY newsDate DESC');
    foreach ($result as $row) {
      $news_entry = new News($row);
      $news[] = $news_entry;
    }
    return $news;
  }

}
