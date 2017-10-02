<?php
namespace Dayjo;

/**
 * Class to read and write to json files
 * @example
 * $myjson = new JSON('myfile.json');
 * $myjson->data->name = 'dayjo';
 *
 * @author Dayjo
 * @link https://github.dom/Dayjo/php-json-handler
 *
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
            $this->data = json_decode([]);
        }

        $data =& $this->data;
        return $data;
    }

    /**
     * Writes out the modified object back to the file
     */
    public function save()
    {
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
