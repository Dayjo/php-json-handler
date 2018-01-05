<?php
namespace Dayjo;

/**
 * Class to read and write to json files
 * @example
 * $myjson = new JSON('myfile.json');
 * $myjson->data->name = 'dayjo';
 *
 * @author Dayjo
 * @link https://github.com/Dayjo/php-json-handler
 * @version 1.0.11
 * // Done! it will write out to the file once the script is finished
 */
class JSON
{
    private $fname;
    public $data;
    private $autosave = true;

    /**
     * Load in the file and json object
     * @param string $fname    The file name to load in
     * @param boolean $autosave Whether or not to automatically save any changes made to the object
     */
    public function __construct($fname, $autosave = true)
    {
        $this->autosave = $autosave;
        $this->load($fname);
    }

    /**
     * Loads in the requested file name, grabs the content and sets the json object
     */
    public function load($fname)
    {
        $this->fname = $fname;
        if (file_exists($this->fname)) {
            $contents = file_get_contents($this->fname);
            $this->data = json_decode($contents);
        } else {
            $this->data = [];
        }

        $data =& $this->data;
        return $data;
    }

    /**
     * Writes out the modified object back to the file
     */
    public function save()
    {
        // Grab the directory and create it if needed
        $info = pathinfo($this->fname);
        $dir  = $info['dirname'];

        if (!is_dir($dir)) {
            // dir doesn't exist, make it
          mkdir($dir, '0777', true);
        }


        return file_put_contents($this->fname, json_encode($this->data));
    }

    /**
     * Auto saving
     */
    public function __destruct()
    {
        if ($this->autosave) {
            $this->save();
        }
    }
}
