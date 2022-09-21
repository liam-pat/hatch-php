<?php
// http://localhost:8999/?name=lily
$hasName = filter_has_var(INPUT_GET, 'name');
echo sprintf("Get name param : %s , type : %s \n", $hasName ? 'true' : 'false', gettype($hasName));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

print_r(filter_list());
echo sprintf("number_float filter id : %d \n</br>", filter_id('number_float'));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

// http://localhost:8999/?name=lily%
$a = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$b = filter_input(INPUT_GET, 'name', FILTER_SANITIZE_ENCODED);
echo $a, "</br>\n", $b, "</br>\n";
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

# http://localhost:8999/?name=lily&age=1212&email=test@qq.com&min_range=10&max_range=100
# http://localhost:8999/?name=lily&age=a&email=test@qq.com&min_range=10&max_range=100
$filters = [
    "name" => ["filter" => FILTER_CALLBACK, "flags" => FILTER_FORCE_ARRAY, "options" => "ucwords"], // transfer ucwords
    "age" => ["filter" => FILTER_VALIDATE_INT, "options" => []], //validate int
    "min_range" => 1,
    "max_range" => 120,
    "email" => FILTER_VALIDATE_EMAIL //validate email
];
print_r(filter_input_array(INPUT_GET, $filters));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;


# http://localhost:8999/?name=lily&age=1212&email=test@qq.com&min_range=10&max_range=100
if (!filter_var("est@qq.com", FILTER_VALIDATE_EMAIL)) {
    echo("E-mail is not valid");
} else {
    echo("E-mail is valid");
}
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
