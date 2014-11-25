<?PHP
include_once 'File.php';

abstract class Parser {
    protected  $_filename;
    protected  $_content;

    public function __construct($filename){
        try {

            $this->_filename = $filename;
            $file = new File($filename);
            $this->_content = $file->getContent();

        }catch(Exception $e){ $e->getMessage();}


    }

    public abstract  function parseContent();

}