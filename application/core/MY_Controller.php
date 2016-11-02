<?php

/**
 * Description of MY_Controller
 *
 * @author admin
 */
class MY_Controller extends MX_Controller {

    //put your code here
    protected $layout = null;
    protected $title = 'welcome';

    public function __construct()
    {
        parent::__construct();

//        to enable profiler uncomment
//        $this->output->enable_profiler(true);
    }

    /**
     * Set Default Layout
     * 
     * @param type $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout . '.php';
    }

    /**
     * Set Title
     * 
     * @param type $title
     */
    public function setTitle($title)
    {
        $this->title = $title - 'SiteName';
    }

    /**
     * Render View
     * 
     * @param type $template
     * @param type $data
     */
    public function render($template, $data = [])
    {
        $data['title'] = $this->title;


        $output = $this->load->view($template, $data, true);


        if (is_null($this->layout))
        {
            $this->output->append_output($output);
        }
        else
        {
            $data['content'] = $output;
            $this->load->view($this->layout, $data);
        }
    }

}
