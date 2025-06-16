<?php
class MySQLBackup
{
    private $username;
    private $password;
    private $database;
    private $backupPath;
    private $host;

    public function __construct($username, $password, $database, $backupPath, $host)
    {
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->backupPath = $backupPath;
        $this->host = $host;
    }

    public function __destruct()
    {
        $backupFile = $this->backupPath . date('Y-m-d_H-i') . '.sql';
        $command = "mysqldump -h {$this->host} -u {$this->username} -p{$this->password} {$this->database} > $backupFile";
        exec($command);

        if ($backupFile) {
            header('Content-Type: application/octet-stream');
            header("Content-Transfer-Encoding: Binary");
            header("Content-disposition: attachment; filename=\"" . basename($backupFile) . "\"");
            readfile($backupFile);
        }
    }
}
