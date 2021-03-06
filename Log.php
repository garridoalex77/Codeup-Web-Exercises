<?php 
class Log 
{
    private $fileName;
    private $handle;
    public $prefix;
    
    private function setFileName($fileName) 
    {
        if (!is_string($fileName)) 
        {
            echo "Filename must be a string";
            die(); 
        }
        $this->fileName = $fileName;
        
    }
    
    public function __construct($prefix = "log") 
    {
        date_default_timezone_set("UTC");
        $this->prefix = $prefix;
        $date = date('Y-m-d');
        $this->fileName = $this->prefix."-{$date}.log";
        $this->setFileName($this->fileName);
        $this->handle = fopen($this->fileName, "a");
    }

    public function logMessage($logLevel, $message) 
    {
        $date = date('Y-m-d');
        $time = date('h:i:s');
        fwrite($this->handle, "{$date} {$time} {$logLevel} {$message}\n");
    }

    public function logInfo($message) 
    {
        $this->logMessage("INFO", $message);
    }

    public function logError($message) 
    {
        $this->logMessage("ERROR", $message);
    }

    public function __destruct() 
    {
        fclose($this->handle);
    }
}

// class File 
// {
//     public $handle;

//     public function __construct($fileName) 
//     {
//         $this->handle = fopen($fileName, "a");
//     }
//     public function append($text) {
//         fwrite($this->handle, "{$text}\n");
//     }
//     public function close() {
//         fclose($this->handle);
//     }

// }