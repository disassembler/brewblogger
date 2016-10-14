<?php

/**
 * @file
 * Brew Recipe Controller.
 *
 * @author Samuel Leathers
 *
 * @copyright Samuel Leathers, 28 August, 2015
 */


namespace BrewBlogger\Recipe;
use BrewBlogger\Application;
use BrewBlogger\Recipe\RecipeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
class RecipeController {
  /**
   * @var Application
   */
  protected $app;
  public function __construct(Application $app) {
    $this->app = $app;
  }
  public function listRecipes(Request $request) {
    $featured_recipes = $this->app['recipe.repository']->findFeatured();
    $all_recipes = $this->app['recipe.repository']->findAll();
    $pageVars = array(
      'featured' => $featured_recipes,
      'recipes' => $all_recipes,
      'page_title' => 'Recipes',
      'page_title_extension' => '',
      'checkmobile' => false,
      'page' => 'recipeList',
      'logged_in' => false,
      'breadcrumb' => '',
      'image_src' => '/images/',
      'icon' => 'script',
      'filter' => 'all',
      'style' => 'all',
      'display' => 25,
      'view' => 'all',
      'sort' => 'ASC',
      'dir' => 'ASC',
      'source' => 'default',
      'destination' => 'recipeDetail',
    );
    return $this->app['twig']->render('recipeList.html.twig', $pageVars);
  }
  public function listRecipesByStyle(Request $request, $style) {
    $all_recipes = $this->app['recipe.repository']->findStyle($style);
    $pageVars = array(
      'featured' => NULL,
      'recipes' => $all_recipes,
      'page_title' => 'Recipes',
      'page_title_extension' => '',
      'checkmobile' => false,
      'page' => 'recipeList',
      'logged_in' => false,
      'breadcrumb' => '',
      'image_src' => '/images/',
      'icon' => 'script',
      'filter' => 'all',
      'style' => 'all',
      'display' => 25,
      'view' => 'all',
      'sort' => 'ASC',
      'dir' => 'ASC',
      'source' => 'default',
      'destination' => 'recipeDetail',
    );
    return $this->app['twig']->render('recipeList.html.twig', $pageVars);
  }
  public function listRecipesJson(Request $request) {
    return new JsonResponse($this->app['recipe.repository']->findAll());
  }
}
