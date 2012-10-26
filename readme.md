# ViewBits Component

## Why?
I needed a way to allow certain blocks of content in a view to be content managed without affecting the layout.  

## What it does
It will hook `beforeRender()` to match a route in order to load the View Bits that you need for that route. So that you can include them in your views.

## Compatability
Compatible with CakePHP `2.x`. (Developed on `2.2.3`)  

## Installation
* Download and unzip into `app/Plugins/ViewBits`
* ````$ git clone git@github.com:davidyell/CakePHP-ViewBits.git app/Plugin/ViewBits````
* ````$ git submodule add git@github.com:davidyell/CakePHP-ViewBits.git app/Plugin/ViewBits````

## Setup
First you will need to create the database table to store your View Bits.  

Import the `view_bits.sql` file from `app/Plugin/ViewBits/Config/Schema/view_bits.sql`  
**OR**  
You can use [CakeDC/migrations](https://github.com/cakedc/migrations) to run the migration file.  
````cake Migrations.migration run --plugin ViewBits````  

Then you'll want to enable the plugin in your `app/Config/bootstrap.php` with `CakePlugin::load('ViewBits')`. If you are already using `CakePlugin::loadAll()` then you don't have to worry.  

To enable the component it will need to be included in your controllers `$components` array. I'd suggest adding it to your `AppController.php`  
````php
class AppController extends Controller {
    public $components = array('ViewBits.ViewBits');
}
````  

## Usage
The component will match based on the routes in the url. So if you add a View Bit with a route of `/` it will be loaded on your root or home page. If you add one with a route of `/pages/display/about` it will show up on your about page.  

In order to display your View Bits, you'll need to include the plugin element which just outputs.  
Example  
````php
<?php echo $this->element('ViewBits.viewbit', array('viewbits'=>$viewbits));?>
````

## What you have to do
You'll need to create you admin interface for putting the view bits into the database, or hooking it into your current admin

## Todo
### v0.1 Milestone
* Create a helper to replace the element
* Come up with a better way to manage multiple View Bits in the new Helper
* Enhance the route matching to take regex, wildcards or similar
* Validate the routes to make sure they exist
* Custom validation function to lookup routes and make sure they exist
* Setup for Composer and add to Packigist
* Ordering so that bits are loaded in the page order

##License
<a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.en_US"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-sa/3.0/88x31.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.en_US">Creative Commons Attribution-ShareAlike 3.0 Unported License</a>.