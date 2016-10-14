<?php

/**
 * @file
 * Brew Site Info Repository.
 *
 * @author Samuel Leathers
 *
 * @copyright Samuel Leathers, 13 October, 2016
 */
namespace BrewBlogger\Preferences;
use Doctrine\DBAL\Connection;

class SiteInfoRepository {
  private $db;
  public function __construct(Connection $db) {
    $this->db = $db;

  }
  public function findSiteInformation() {
    $site_info = $this->db->fetchAssoc('SELECT * FROM brewer');
    $site_info['version'] = "2.3.3";
    return $site_info;

  }
}
