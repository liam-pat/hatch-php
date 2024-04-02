<?php
function validateInputVar($name, $method, $type = ''): string
{
    switch ($type) {
        case 'int':
            $filter = FILTER_SANITIZE_NUMBER_INT;
            break;
        case 'str':
            $filter = FILTER_SANITIZE_STRING;
            break;
        case 'url':
            $filter = FILTER_SANITIZE_URL;
            break;
        case 'email':
            $filter = FILTER_SANITIZE_EMAIL;
            break;
        case 'html':
            $filter = 'html';
            break;
        default:
            $filter = FILTER_DEFAULT;
    }
    if (!defined($method) && false !== stripos($method, "input")) {
        $method = 'INPUT_' . strtoupper($method);
    }
    $method = constant($method);
    if (filter_has_var($method, $name)) {
        if ($filter === 'html') {
            return strip_tags(filter_input($method, $name), '<a><p><b><strong><table><th><tr><td><area><article><big><br><center><dd><div><dl><dt><dir><em><embed><figure><font><hr><h1><h2><h3><h4><h5><h6><img><ol><ul><li><small><sup><sub><tt><time><tfoot><thead><tbody><u>');
        } else {
            return filter_input($method, $name, $filter);
        }
    }
}

function filterVar(): array
{
    $filterArgs = [
        'job' => ['filter' => FILTER_SANITIZE_NUMBER_INT],
        'segment' => ['filter' => FILTER_SANITIZE_NUMBER_INT],
        'password' => [
            'filter' => FILTER_SANITIZE_STRING,
            'flags' => FILTER_FLAG_STRIP_HIGH | FILTER_FLAG_STRIP_LOW,
        ],
        'err_typing' => ['filter' => FILTER_CALLBACK, 'options' => ["setRevisionController", "sanitizeFieldValue"]],
        'err_translation' => ['filter' => FILTER_CALLBACK, 'options' => ["setRevisionController", "sanitizeFieldValue"]],
        'err_terminology' => ['filter' => FILTER_CALLBACK, 'options' => ["setRevisionController", "sanitizeFieldValue"]],
        'err_language' => ['filter' => FILTER_CALLBACK, 'options' => ["setRevisionController", "sanitizeFieldValue"]],
        'err_style' => ['filter' => FILTER_CALLBACK, 'options' => ["setRevisionController", "sanitizeFieldValue"]],
        'original' => ['filter' => FILTER_UNSAFE_RAW],
    ];

    return filter_input_array(INPUT_POST, $filterArgs);
}

function filterArrParams(): array
{
    $emails = [
        'a' => 'email1@domain.com',
        'b' => '<email2>@domain.com',
    ];

    return filter_var_array($emails, FILTER_SANITIZE_EMAIL);
}