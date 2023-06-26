# Getting Started with PHP Project

This documentation will guide you through the process of starting a PHP project with Composer, setting up a `HelloWorld` class with the `App` namespace, and using the `App` namespace.

## Prerequisites

Before you begin, ensure that you have the following prerequisites installed on your system:

- PHP (version 7.2 or higher)
- Composer (https://getcomposer.org)

## Step 1: Initialize the Project

1. Open a terminal or command prompt.
2. Navigate to the directory where you want to create your PHP project.
3. Run the following command to initialize the project:

   ```bash
   composer init
   ```

4. Follow the prompts to provide information about your project. Press Enter to accept the default values.

## Step 2: Set up the Namespace and Directory

1. Create a directory named `app` in the root of your project:

   ```bash
   mkdir app
   ```

2. Create a file named `HelloWorld.php` inside the `app` directory and open it in a text editor.

3. Add the following code to define the `HelloWorld` class with a `welcomeMessage()` method and the `App` namespace:

   ```php
   <?php

   namespace App;

   class HelloWorld
   {
       public function welcomeMessage()
       {
           return "Welcome to PHP Project!";
       }
   }
   ```

4. Save the `HelloWorld.php` file.

## Step 3: Using the HelloWorld Class

1. Create a file in the root of your project (outside the `app` directory) where you want to use the `HelloWorld` class.

2. Add the following code at the top of your file to import the `HelloWorld` class:

   ```php
   <?php

   require 'vendor/autoload.php';

   use App\HelloWorld;
   ```

3. Instantiate the `HelloWorld` class and call the `welcomeMessage()` method:

   ```php
   $helloWorld = new HelloWorld();
   echo $helloWorld->welcomeMessage();
   ```

## Step 4: Autoloading Classes

1. Open the `composer.json` file in your project directory.

2. Update the `"autoload"` section to include the `"App\\"` namespace and the `app` directory. Your `composer.json` file should look like this:

   ```json
   {
       "autoload": {
           "psr-4": {
               "App\\": "app/"
           }
       }
   }
   ```

3. Save the `composer.json` file.

4. Run the following command to update the autoloader:

   ```bash
   composer dump-autoload
   ```

   This command regenerates the autoloader to include the updated namespace.
