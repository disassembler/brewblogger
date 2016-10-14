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
    $theme = $this->db->fetchAssoc('SELECT * FROM brewingcss WHERE theme = ?', array($preferences['theme']));
    $preferences['theme_name'] = $theme['themeName'];
    $preferences['theme_color1'] = $theme['themeColor1'];
    $preferences['theme_color2'] = $theme['themeColor2'];
    return $preferences;

  }
}
