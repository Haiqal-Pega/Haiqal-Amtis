<?php
echo "<p>String Function in PHP<br><?p>";

//strlen used to count the number of character in the string
echo "1.strlen()<br>";
echo "'Hello World' have: ";
echo strlen("Hello world!"); // outputs 12

echo "<p>2. str_word_count<br></p>"; //counts the number of words in a string
echo "'Hello World' have: ";
echo str_word_count("Hello world!"); // outputs 2

echo "<p>3. strrev()<br></p>"; //reverse a string
echo "'Hello World' reversed is: ";
echo strrev("Hello world!"); // outputs !dlrow olleH

echo "<p>4. strpos()<br><?p>"; //search text within string
echo "The word 'World' starts at index: ";
echo strpos("Hello world!", "world"); // outputs 6

echo "<p>5. str_replace()<br><?p>";
echo "replace word 'world' with 'dolly' in 'Hello World<br>";
echo str_replace("world", "Dolly", "Hello world!"); // outputs Hello Dolly!
?>