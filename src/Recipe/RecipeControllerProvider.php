<?php

/**
 * @file
 * Brew Recipe Controller Provider.
 *
 * @author Samuel Leathers
 *
 * @copyright Samuel Leathers, 28 August, 2015
 */

namespace BrewBlogger\Recipe;
use Silex\ControllerProviderInterface;
use Silex\Application;
class RecipeControllerProvider implements ControllerProviderInterface {
  public function connect(Application $app) {
    /** @var \Silex\ControllerCollection $controllers */
    $controllers = $app['controllers_factory'];
    $controllers->get('/list', 'recipe.controller:listRecipes')
      ->bind('recipes.list');
    $controllers->get('/list/style/{style}', 'recipe.controller:listRecipesByStyle')
      ->bind('recipes.list_style');
    $controllers->get('/list/json', 'recipe.controller:listRecipesJson')
      ->bind('recipes.list.json');
    return $controllers;
  }

}
