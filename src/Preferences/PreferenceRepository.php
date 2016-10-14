<?php

/**
 * @file
 * Brew Preferences Repository.
 *
 * @author Samuel Leathers
 *
 * @copyright Samuel Leathers, 13 October, 2016
 */
namespace BrewBlogger\Preferences;
use Doctrine\DBAL\Connection;

class PreferenceRepository {
  private $db;
  public function __construct(Connection $db) {
    $this->db = $db;

  }
  public function findPreferences() {
    $preferences = $this->db->fetchAssoc('SELECT * FROM preferences');
    return $preferences;

  }
}
