```php
<?php

// Creating an Array
$fruits = ['apple', 'banana', 'orange'];

// Accessing Array Elements
echo $fruits[0];  // Output: apple
echo $fruits[1];  // Output: banana
echo $fruits[2];  // Output: orange

// Modifying Array Elements
$fruits[1] = 'mango';
echo $fruits[1];  // Output: mango

// Adding Elements to an Array
$fruits[] = 'orange';
array_push($fruits, 'mango');

// Removing Elements from an Array
$firstElement = array_shift($fruits);  // Removes and returns 'apple'
echo $firstElement;  // Output: apple

array_unshift($fruits, 'kiwi');  // Adds 'kiwi' to the beginning of the array

// Array Functions
$numbers = [1, 2, 3, 4, 5];

$count = count($numbers);  // Returns 5

array_push($numbers, 6, 7);  // Adds elements 6 and 7 to the end of the array

$lastElement = array_pop($numbers);  // Removes and returns 7

$mergedArray = array_merge($fruits, $numbers);  // Merges $fruits and $numbers arrays

$slice = array_slice($numbers, 2, 2);  // Returns [3, 4]

$key = array_search('banana', $fruits);  // Returns the key of 'banana' (1)

// Multidimensional Arrays
$students = [
    ['John', 20, 'Male'],
    ['Sarah', 22, 'Female'],
    ['Michael', 21, 'Male']
];

echo $students[0][0];  // Output: John
echo $students[1][2];  // Output: Female

// Iterating Over Arrays
$fruits = ['apple', 'banana', 'orange'];

foreach ($fruits as $fruit) {
    echo $fruit . ' ';
}
// Output: apple banana orange

?>
```
