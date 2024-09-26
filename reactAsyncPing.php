<?php
require 'vendor/autoload.php';

use React\EventLoop\Loop;
use React\ChildProcess\Process;

$loop = loop::get(); 
$baseIp = '10.244.37.';
$start = 2;
$end = 254;
$hostsOks = [];

for ($i = $start; $i <= $end; $i++) {
    $host = $baseIp . $i;

    $process = new Process("ping -c 1 " . escapeshellarg($host));

    $process->start($loop);

    $process->stdout->on('data', function ($data) use ($host) {
        echo "pingando " . $host . "\n";
    });

    $process->stderr->on('data', function ($data) use ($host) {
        echo "deu erro... " . $host . "\n";
        
    });

    $process->on('exit', function ($exitCode) use ($host, &$hostsOks) {
        if ($exitCode === 0) {
        echo "sucesso! " . $host . "\n";

            $hostsOks[] = $host;
        }
    });
}

$loop->run();

// Exibe os resultados após o loop
echo "IPs que responderam com sucesso:\n";
foreach ($hostsOks as $okHost) {
    echo $okHost . "\n";
}
