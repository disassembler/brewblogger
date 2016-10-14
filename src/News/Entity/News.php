<?php

namespace BrewBlogger\News\Entity;

/**
 * News
 *
 */
class News
{
  /**
   * @var int
   *
   */
  private $id;

  /**
   * @var string
   *
   */
  private $headline;

  /**
   * @var string
   *
   */
  private $details;

  /**
   * @var timestamp
   *
   */
  private $publishDate;

  /**
   * @var bool
   *
   */
  private $private;

  /**
   * @var string
   *
   */
  private $poster;

  /**
   * @param string $news
   */
  public function __construct($news)
  {
    $this->id = $news['id'];
    $this->headline = $news['newsHeadline'];
    $this->details = $news['newsText'];
    $this->publishDate = strtotime($news['newsDate']);
    $this->private = $news['newsPrivate'] == 'N' ? true: false;
    $this->poster = $news['newsPoster'];
  }

  /**
   * Get id
   *
   * @return integer
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set news headline
   *
   * @param string $headline
   */
  public function setHeadline($headline)
  {
    $this->headline = $headline;

  }

  /**
   * Get headline
   *
   * @return string
   */
  public function getHeadline()
  {
    return $this->headline;
  }

  /**
   * Set details
   *
   * @param string $details
   */
  public function setDetails($details)
  {
    $this->details = $details;

  }

  /**
   * Get details
   *
   * @return string
   */
  public function getDetails()
  {
    return $this->details;

  }

  /**
   * Set publish date
   *
   * @param int $date
   */
  public function setPublishDate($date)
  {
    if (is_int($date)) {
      $this->publishDate = $date;
    }
    else {
      $this->publishDate = strtotime($date);
    }

  }

  /**
   * Get publish date (timestamp)
   *
   * @return timestamp
   */
  public function getPublishDate()
  {
    return $this->publishDate;
  }

  /**
   * Get publish date (string)
   *
   * @return string
   */
  public function getPublishDateString()
  {
    return date('Y-m-d', $this->publishDate);
  }

  /**
   * Set private
   *
   * @param bool $private
   */
  public function setPrivate($private)
  {
    $this->private = $private;

  }

  /**
   * Get private
   *
   * @return bool
   */
  public function getPrivate()
  {
    return $this->private;
  }

  /**
   * Set poster
   *
   * @param string $poster
   */
  public function setPoster($poster)
  {
    $this->poster = $poster;

  }

  /**
   * Get poster
   *
   * @return string
   */
  public function getPoster()
  {
    return $this->poster;
  }

}
