<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */


	// Router::connect('/List/:urlname/yougo/', array('controller' => 'yougo', 'action' => 'index'),array('pass'=>array('urlname')));
	// Router::connect('/List/:urlname/hikaku/', array('controller' => 'hikaku', 'action' => 'index'),array('pass'=>array('urlname')));
	// Router::connect('/List/:urlname/blog/', array('controller' => 'blog', 'action' => 'top'),array('pass'=>array('urlname','id')));
	// Router::connect('/List/:urlname/blog/:id', array('controller' => 'blog', 'action' => 'top'),array('pass'=>array('urlname','id')));
	Router::connect('/Collection/detail/:id', array('controller' => 'collection', 'action' => 'detail'),array('pass'=>array('id')));

	Router::connect('/Glossary/detail/:id', array('controller' => 'glossary', 'action' => 'detail'),array('pass'=>array('id')));
	Router::connect('/Type/:tag', array('controller' => 'type', 'action' => 'index'),array('pass'=>array('category')));

	Router::connect('/Review/index/:id', array('controller' => 'review', 'action' => 'index'),array('pass'=>array('id')));


	Router::connect('/Column/detail/:id', array('controller' => 'column', 'action' => 'detail'),array('pass'=>array('id')));
	Router::connect('/Column/:tag/:offset', array('controller' => 'column', 'action' => 'index'),array('pass'=>array('tag','offset')));

	Router::connect('/Question/detail/:id', array('controller' => 'question', 'action' => 'detail'),array('pass'=>array('id')));

	Router::connect('/Mailmagazine/detail/:id', array('controller' => 'mailmagazine', 'action' => 'detail'),array('pass'=>array('id')));


	Router::connect('/Blog/detail/:id', array('controller' => 'blog', 'action' => 'detail'),array('pass'=>array('id')));
	Router::connect('/Blog/:tag/:offset', array('controller' => 'blog', 'action' => 'index'),array('pass'=>array('tag','offset')));


	Router::connect('/', array('controller' => 'index', 'action' => 'index'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';

	require ROOT.'/app/Config' . DS . 'const.php';