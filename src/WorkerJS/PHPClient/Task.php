<?php
/**
 * Created by PhpStorm.
 * User: miljanrakita
 * Date: 12/13/18
 * Time: 4:38 AM
 */

namespace WorkerJS\PHPClient;

abstract class Task
{
    private $client;
    protected $task;

    public function __construct($client, $params)
    {
        if( is_string($params) ) {
            $name = $params;
            $this->task = [
                "name" => null,
                "params" => null
            ];

            $this->task["name"] = $name;
        } else {
            $this->task = $params;
        }
    }

    public function getTask()
    {
        return $this->task;
    }

    public function setParams($body){
        $this->task["params"] = $body;
        $this->preProcessParams();
    }

    abstract public function sendTask();

    abstract public function sendMessage($payload);

    private function preProcessParams(){
        //Optional override
    }

    public function getHandlerName() {
        return $this->task["name"];
    }
}
