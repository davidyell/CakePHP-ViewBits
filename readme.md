# ViewBits Component
I created this basic component because I needed a way to allow certain blocks of content to be content managed without affecting the layout.

## What it does
It will hook `beforeRender()` to match a route in order to load the View Bits that you need for that route.

## Installation
Download and unzip into `app/Plugins/ViewBits` or you can clone or submodule.

## Requirements
* I'd recommend using the [Migrations plugin](https://github.com/cakedc/migrations)

## Setup
First you will need to create the database table to store your View Bits. There are two ways to do this.  
* Import the `view_bits.sql` file from `app/Plugin/ViewBits/Config/Schema/view_bits.sql`
* You can use [CakeDC/migrations](https://github.com/cakedc/migrations) to run the migration file

## What you have to do
You'll need to create you admin interface for putting the view bits into the database, or hooking it into your current admin

## Todo
* Create a helper to replace the element and up with a better way to manage multiple bits

