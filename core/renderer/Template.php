<?php 
namespace Core\Renderer;
/**
* 
*/
class Template
{
    // private $assignedValues = array();
    private $tpl;

    public function __construct($file = '')
    {
        if(!empty($file)) {
            if(file_exists($file)) {
                $this->tpl = file_get_contents($file);
            } else {
                print "<b>Template Error:</b> template $file doesn't exist";
                // throw new \Exception("Template Error: template $file doesn't exist", 1);
                
            }
        }
    }

    public function assign($searchString, $replaceString)
    {
        if(!empty($searchString)) {
            $this->assignedValues[$searchString] = $replaceString;
        }
    }

    public function render()
    {
        // if(count($this->assignedValues) > 0) {
        //     foreach ($this->assignedValues as $key => $value) {
        //         $this->tpl = str_replace('{' . $key . '}', $value, $this->tpl);
        //     }
        // }
        $this->tpl = str_replace('{' . $key . '}', $value, $this->tpl);
        print $this->tpl;
    }
}