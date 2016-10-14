<?php

/**
 * @file
 * Brew News Service Provider.
 *
 * @author Samuel Leathers
 *
 * @copyright Samuel Leathers, 29 August, 2015
 */

namespace BrewBlogger\News;

use Silex\ServiceProviderInterface;
use Silex\Application;
class NewsServiceProvider implements ServiceProviderInterface {
  public function register(Application $app) {
    $app['news.controller'] = $app->share(function () use ($app) {
        return new NewsController($app);
      });
    $app['news.repository'] = $app->share(function () use ($app) {
      $db = $app['db'];
      return new NewsRepository($db);
    });
  }
  public function boot(Application $app)
  {
  }
}
