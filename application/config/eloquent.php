<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection(array(
        'driver' => 'mysql',
        'host' => $db['default']['hostname'],
        'database' => $db['default']['database'],
        'username' => $db['default']['username'],
        'password' => $db['default']['password'],
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => $db['default']['dbprefix'],
));


$capsule->setAsGlobal();
$capsule->bootEloquent();


//example
//use \Illuminate\Database\Eloquent\Model as Eloquent;
//
//class User extends Eloquent { }
//
//$users = User::all();

$events = new Illuminate\Events\Dispatcher;


//Ref http://jamieonsoftware.com/post/90299647695/using-eloquent-orm-inside-codeigniter-with-added

/**
 * Add It to CodeIgniter
 */
$events->listen('illuminate.query', function($query, $bindings, $time, $name) {
    // Format binding data for sql insertion
    foreach ($bindings as $i => $binding)
    {
        if ($binding instanceof \DateTime)
        {
            $bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
        }
        else if (is_string($binding))
        {
            $bindings[$i] = "'$binding'";
        }
    }

    // Insert bindings into query
    $query = str_replace(array('%', '?'), array('%%', '%s'), $query);
    $query = vsprintf($query, $bindings);

    // Add it into CodeIgniter
    $db = & get_instance()->db;

    $db->query_times[] = $time;
    $db->queries[] = $query;
});


$capsule->setEventDispatcher($events);


/**
 * Schema create
 */

//Capsule::schema()->create('users', function($table)
//{
//    $table->increments('id');
//    $table->string('email')->unique();
//    $table->timestamps();
//});

//ref
//https://siipo.la/blog/how-to-use-eloquent-orm-migrations-outside-laravel