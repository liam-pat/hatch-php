<?php
function zipify($Dir, $ExhibitName)
{
    chdir($Dir);
    $filename = '/tmp/' . $ExhibitName . '.zip';
    if (size_dir('.') > disk_free_space('.')) {
        die('Error: not enough free space to zip');
    }
    ignore_user_abort(true);
    $command = 'zip -r ' . escapeshellarg($filename) . ' .';
    exec($command);

    if (connection_aborted()) {
        unlink($filename);
        die();
    }
    header('Content-Description: File Transfer');
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename=' . urlencode($ExhibitName) . '.zip');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filename));
    ob_clean();
    flush();
    readfile($filename);
    unlink($filename);
    exit;
}

function checkConnStatus(): void
{
    $status = connection_status();
    if (($status & CONNECTION_TIMEOUT) === CONNECTION_TIMEOUT) {
        echo 'Got timeout';

    } elseif (($status & CONNECTION_ABORTED) === CONNECTION_ABORTED) {
        echo 'Aborted';

    } else {
        echo 'Still connection';
    }
}

function getConstVar(string $name): void
{
    echo sprintf('CONNECTION_%s', $name);
}

function hex2bin($input, $assume_safe = true): string
{
    if ($assume_safe !== true && !(strlen($input) % 2 === 0 || preg_match('/^[0-9a-f]+$/i', $input))) {
        return '';
    }
    return pack('H*', $input);
}