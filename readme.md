# ViewBits Component
I created this basic component because I needed a way to allow certain blocks of content to be content managed without affecting the layout.

## What it does
It will hook `beforeRender()` to match a route in order to load the View Bits that you need for that route.

## Installation
* Download and unzip into `app/Plugins/ViewBits`
* ````$ git clone git@github.com:davidyell/CakePHP-ViewBits.git app/Plugin/ViewBits````
* ````git submodule add git@github.com:davidyell/CakePHP-ViewBits.git app/Plugin/ViewBits````

## Setup
First you will need to create the database table to store your View Bits.  

Import the `view_bits.sql` file from `app/Plugin/ViewBits/Config/Schema/view_bits.sql`  
**OR**  
You can use [CakeDC/migrations](https://github.com/cakedc/migrations) to run the migration file.  

Then you'll want to enable the plugin in your `app/Config/bootstrap.php` with `CakePlugin::load('ViewBits')`. If you are already using `CakePlugin::loadAll()` then you don't have to worry.  

To enable the component it will need to be included in your controllers `$components` array. I'd suggest adding it to your `AppController.php`  
````php
class AppController extends Controller {
    public $components = array('ViewBits.ViewBits');
}
````  

## What you have to do
You'll need to create you admin interface for putting the view bits into the database, or hooking it into your current admin

## Usage
The component will match based on the routes in the url. So if you add a View Bit with a route of `/` it will be loaded on your root or home page. If you add one with a route of `/pages/display/about` it will show up on your about page.  

In order to display your View Bits, you'll need to include the plugin element which just outputs.  
Example  
````php
<?php echo $this->element('ViewBits.viewbit', array('viewbits'=>$viewbits));?>
````

## Todo
* Create a helper to replace the element
* Come up with a better way to manage multiple View Bits in the new Helper
* Enhance the route matching to take regex, wildcards or similar

