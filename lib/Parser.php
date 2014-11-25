<?PHP
include_once 'File.php';

abstract class Parser {

    public function __construct($filename){
        $this->_filename = $filename;
        $file = new File($filename);
        $this->_content = $file->getContent();


    }

    public abstract  function parseContent();

}