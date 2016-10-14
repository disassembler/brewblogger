<?php

/**
 * @file
 * Brew News Controller Provider.
 *
 * @author Samuel Leathers
 *
 * @copyright Samuel Leathers, 28 August, 2015
 */

namespace BrewBlogger\News;
use Silex\ControllerProviderInterface;
use Silex\Application;
class NewsControllerProvider implements ControllerProviderInterface {
  public function connect(Application $app) {
    /** @var \Silex\ControllerCollection $controllers */
    $controllers = $app['controllers_factory'];
    $controllers->get('/news', 'news.controller:index')
      ->bind('news.index');
    return $controllers;
  }

}
