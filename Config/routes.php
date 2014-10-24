<?php
Router::connect('/admin/category', array('plugin' => 'Category', 'admin' => true, 'controller' => 'categories', 'action' => 'index'));
Router::connect('/admin/category/:controller', array('plugin' => 'Category', 'admin' => true, 'action' => 'index'));
Router::connect('/admin/category/:controller/:action/*', array('plugin' => 'Category', 'admin' => true));
