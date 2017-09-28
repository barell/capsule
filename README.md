# Capsule

Capsule is a simple response mocking framework designed to work with external sources.

**Project is in testing phase and will be released soon**

Current version: **n/a** 

Release date: **n/a**

License: **MIT**

## Installation

At the moment you can only clone this repo. Once project is released it will be registered to use with ```composer```.

## Basic Example

Let's imagine you have two apps running. First one has to call second one 
to get the name of a cat by it's id. Then you write a functional test for your first app
and you prepare a mocked response so it can be tested properly. 

By integrating Capsule into your project, you can automate the process of creating mocked responses.
In the Capsule world, a scenario represents your single request and all external sources and it's final output.
Recorder is just a scenario manager. See examples below.

Record a new scenario:
```php
$recorder = Capsule\Capsule::createRecorder('/path/to/scenarios');

$recorder->open('welcomeKittyCase', [
    'id' => 1
]);

$recorder->addSource(
    'kittyName',
    'Meow', [
        'id' => 1
    ]
);

$recorder->close('Hello Meow');
```

Read from previously recorded scenario, this can be used in your functional tests:
```php
$recorder = Capsule\Capsule::createRecorder('/path/to/scenarios');

$scenario = $recorder->load('welcomeKittyCase');
```

Now you can record different scenarios for the same request assuming that there is no cat with id 123:
```php
$recorder->open('welcomeKittyNotFoundCase', [
    'id' => 123
]);

$recorder->addSource(
    'kittyName',
    'Error: kitty not found', [
        'id' => 123
    ]
);

$recorder->close('Sorry, kitty not found');
```

