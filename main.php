<?php
//Your Settings can be read here: settings::read('myArray/settingName') = $settingValue;
//Your Settings can be saved here: settings::set('myArray/settingName',$settingValue,$overwrite = true/false);
class startup{
    public static function command($line):void{
        $lines = explode(" ", $line);
        $sleep = settings::read("incommand-delay");
        if($lines[0] == "run"){
            foreach(settings::read("commands") as $command){
                cli_run($command);
                sleep($sleep);
            }
        }
    }
    public static function init():void{
        settings::set("commands", array(), false);
        settings::set("incommand-delay", 5, false);
    }
}