<?php

namespace App\extension\ftp;

use FTP\Connection;

class FTP
{
    private false|Connection $ftpServer;

    private const DEFAULT_PORT = 21;
    private const DEFAULT_TIMEOUT = 90;

    public function __construct(string $serveStr, string $username, string $password, array $options = [], bool $useSSL = false)
    {
        $port = (int)($options['port'] ?? self::DEFAULT_PORT);
        $timeout = (int)($options['time_out'] ?? self::DEFAULT_TIMEOUT);

        if ($useSSL && ($resource = ftp_ssl_connect($serveStr, $port, $timeout)) === false) {
            throw new \RuntimeException('Cannot connect ftp server');
        }
        if (!isset($resource) && ($resource = ftp_connect($serveStr, $port, $timeout)) === false) {
            throw new \RuntimeException('Cannot connect ftp server');
        }
        if (!ftp_login($resource, $username, $password)) {
            throw new \RuntimeException('Cannot login ftp server');
        }
        $this->ftpServer = $resource;
    }

    public function __destruct()
    {
        ftp_close($this->ftpServer);
    }

    public function ftpServerSystemType(): bool|string
    {
        return ftp_systype($this->ftpServer);
    }

    public function pwd(): bool|string
    {
        return ftp_pwd($this->ftpServer);
    }

    public function cdUp(): bool
    {
        return ftp_cdup($this->ftpServer);
    }

    public function changeDir(string $remoteDir): bool
    {
        return ftp_chdir($this->ftpServer, $remoteDir);
    }

    public function chmod(string $remoteFilePath, int $mode): bool|int
    {
        return ftp_chmod($this->ftpServer, $mode, $remoteFilePath);
    }

    public function size(string $filePath): int
    {
        return ftp_size($this->ftpServer, $filePath);
    }

    public function ls(string $remoteDir, string $pregMatchStr = ''): bool|array
    {
        $list = ftp_mlsd($this->ftpServer, $remoteDir);

        if (empty($pregMatchStr)) {
            return $list;
        }

        return preg_grep($pregMatchStr, $list);
    }

    public function nList(string $remoteDir): array|bool
    {
        return ftp_nlist($this->ftpServer, $remoteDir);
    }

    public function mkDir(string $remoteDir): bool|string
    {
        return ftp_mkdir($this->ftpServer, $remoteDir);
    }

    public function rmDir(string $remoteDir): bool
    {
        return ftp_rmdir($this->ftpServer, $remoteDir);
    }

    public function remove(string $path): bool
    {
        return ftp_delete($this->ftpServer, $path);
    }

    public function execCMD(string $linuxCMDStr): bool
    {
        return ftp_exec($this->ftpServer, $linuxCMDStr);
    }

    public function alloc(int $allocSize): array
    {
        $isSuccess = ftp_alloc($this->ftpServer, $allocSize, $result);

        return [$isSuccess, $result];
    }

    public function rename(string $oldName, string $newName): bool
    {
        return ftp_rename($this->ftpServer, $oldName, $newName);
    }

    public function appendToFile(string $localFilename, string $remoteFilename): bool
    {
        return ftp_append($this->ftpServer, $remoteFilename, $localFilename);
    }

    /**
     * Download remote file to local
     * @param string $localFilePath
     * @param string $remoteFilePath
     * @param int $mode
     * @param int $remoteResumePosition
     * @return bool
     */
    public function get(string $localFilePath, string $remoteFilePath, int $mode = FTP_BINARY, int $remoteResumePosition = 0): bool
    {
        return ftp_get($this->ftpServer, $localFilePath, $remoteFilePath, $mode, $remoteResumePosition);
    }

    /**
     * Upload local file to remote
     * @param string $localFilePath
     * @param string $remoteFilePath
     * @param int $mode
     * @param int $remoteStartPosition
     * @return bool
     */
    public function put(string $localFilePath, string $remoteFilePath, int $mode = FTP_BINARY, int $remoteStartPosition = 0): bool
    {
        return ftp_put($this->ftpServer, $remoteFilePath, $localFilePath, $mode, $remoteStartPosition);
    }

    /**
     * @param resource $localFileResource
     * @param string $remoteFilePath
     * @param int $mode
     * @param int $remoteResumePosition
     * @return bool
     */
    public function fGet($localFileResource, string $remoteFilePath, int $mode = FTP_BINARY, int $remoteResumePosition = 0): bool
    {
        return ftp_fget($this->ftpServer, $localFileResource, $remoteFilePath, $mode, $remoteResumePosition);
    }

    /**
     * @param resource $localFileResource
     * @param string $remoteFilePath
     * @param int $mode
     * @param int $remoteStartPosition
     * @return bool
     */
    public function fPut($localFileResource, string $remoteFilePath, int $mode = FTP_BINARY, int $remoteStartPosition = 0): bool
    {
        return ftp_fput($this->ftpServer, $remoteFilePath, $localFileResource, $mode, $remoteStartPosition);
    }

    /*
     * support key :
     * FTP_TIMEOUT_SEC => timeout sec
     * FTP_AUTOSEEK => seek resume position and start position when use GET PIT function , default is on
     * FTP_USEPASVADDRESS => use the PASV ip address
     */
    public function setOption(int $option, mixed $value): bool
    {
        return ftp_set_option($this->ftpServer, $option, $value);
    }

    public function getOption(string $option = FTP_TIMEOUT_SEC): bool|int
    {
        return ftp_get_option($this->ftpServer, $option);
    }

    /*
     * success : return timestamp
     * fail : return `-1`
     */
    public function getFileLastModifyTime(string $remotePath): int
    {
        return ftp_mdtm($this->ftpServer, $remotePath);
    }

    public function setPassiveMode(bool $isSet = true): bool
    {
        return ftp_pasv($this->ftpServer, $isSet);
    }

    public function execFTPCMD(string $execStr): ?array
    {
        return ftp_raw($this->ftpServer, $execStr);
    }

    public function site(string $cmdStr): bool
    {
        return ftp_site($this->ftpServer, $cmdStr);
    }

    public function rawList(string $remoteDirStr, bool $recursive = false): array|bool
    {
        return ftp_rawlist($this->ftpServer, $remoteDirStr, $recursive);
    }

    /**
     * @param resource $localFileResource
     * @param string $remoteFile
     * @param int $mode
     * @param int $resumePosition
     * @return int
     */
    public function nonBlockFGet($localFileResource, string $remoteFile, int $mode = FTP_BINARY, int $resumePosition = 0): int
    {
        return ftp_nb_fget($this->ftpServer, $localFileResource, $remoteFile, $mode, $resumePosition);
    }

    /**
     * @param resource $localFileResource
     * @param string $remoteFile
     * @param int $mode
     * @param int $startPosition
     * @return int
     */
    public function nonBlockFPut($localFileResource, string $remoteFile, int $mode = FTP_BINARY, int $startPosition = 0): int
    {
        return ftp_nb_fput($this->ftpServer, $remoteFile, $localFileResource, $mode, $startPosition);
    }

    public function nonBlockGet(string $localFile, string $remoteFile, int $mode = FTP_BINARY, int $resumePosition = 0): int
    {
        return ftp_nb_get($this->ftpServer, $localFile, $remoteFile, $mode, $resumePosition);
    }

    public function nonBlockPut(string $localFile, string $remoteFile, int $mode = FTP_BINARY, int $startPosition = 0): bool|int
    {
        return ftp_nb_put($this->ftpServer, $remoteFile, $localFile, $mode, $startPosition);
    }

    public function nonBlockContinue(): int
    {
        return ftp_nb_continue($this->ftpServer);
    }
}
