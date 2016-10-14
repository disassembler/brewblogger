<?php

/**
 * @file
 * Brew News Controller.
 *
 * @author Samuel Leathers
 *
 * @copyright Samuel Leathers, 28 August, 2015
 */


namespace BrewBlogger\News;
use BrewBlogger\Application;
use BrewBlogger\News\NewsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class NewsController {
  /**
   * @var Application
   */
  protected $app;
  public function __construct(Application $app) {
    $this->app = $app;
  }
  public function index(Request $request) {
    // TODO: use silex for checking if user logged in
    $logged_in = (isset($_SESSION["loginUsername"]) && !empty($_SESSION["loginUsername"]));
    if ($logged_in) {
      $news_entries = $this->app['news.repository']->findAll();
    }
    else {
      $news_entries = $this->app['news.repository']->findNonPrivate();
    }
    // TODO: fix hardcoded values below
    $pageVars = array(
      'news_count' => count($news_entries),
      'sort' => 'newsDate',
      'dir' => 'DESC',
      'logged_in' => $logged_in,
      'view' => 5,
      'news' => $news_entries,
      'page' => 'news',
    );
    return $this->app['twig']->render('news.html.twig', $pageVars);
  }
}
